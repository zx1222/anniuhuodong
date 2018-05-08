<?php
/**
 * Created by PhpStorm.
 * User: Miinno-10
 * Date: 2018/4/19
 * Time: 14:36
 */

namespace app\modules\ejiaomothersday\BL;

use app\modules\ejiaomothersday\models\Config;
use app\modules\ejiaomothersday\models\PrizePool;
use Yii;
use yii\base\Object;


class Lottery extends Object
{
    const BAD_ID = 6;

    public static function run()
    {
        $_prize_arr = Yii::$app->cache->get('config');
        if ($_prize_arr == false) {
            $_prize_arr = Config::find()->select(['id', 'chance', 'praisecontent', 'praisename', 'praisenumber', 'praiseimage'])->asArray()->all();
            Yii::$app->cache->set('config', $_prize_arr, 3600);
        }
        foreach ($_prize_arr as $key => $val) {
            $prize_arr[$val['id']] = $val;
            $arr[$val['id']] = $val['chance'];
        }

//根据概率获取奖项id
        $rid = self::getRand($arr);
//判断每人一次实物奖
        if (StatusTransfer::getCool()) {
            $rid = self::BAD_ID;
        }
//奖品插入奖池
        $res = self::getBad();
        $userIP = Yii::$app->request->getUserIP();
        $existUserIpCount = PrizePool::find()->where(['ip' => $userIP])->count('pid');

        if ($existUserIpCount <= 5 && $existUserIpCount >= 0) {
            if ($prize_arr[$rid]['praisenumber'] > 0) {
                $prizeModel = PrizePool::find()
                    ->select(['pid', 'aid', 'openid', 'status', 'ip'])
                    ->where(['status' => 0])
                    ->andWhere(['aid' => $rid])
                    ->limit(1)
                    ->one();
                if (!empty($prizeModel)) {
                    $prizeModel->status = 10;
                    $prizeModel->openid = Yii::$app->user->getId();
                    $prizeModel->ip = $userIP;

                    if ($prizeModel->save() !== false) {
                        $res = $prize_arr[$rid];
                        $res['praiseimage'] = $res['praiseimage'] ? Yii::getAlias('@uploadsUrl/ejiaomothersday/' . $res['praiseimage']) : '';
                    }
                }
            }
        } else {
            $res = self::getBad();
        }
//更新状态
        StatusTransfer::markPause($res);

        return $res;
    }

    /**
     * 抽奖返回中奖id
     * @param $proArr
     * @return int|string
     */
    private static function getRand($proArr)
    {
        $result = '';

        //概率数组的总概率精度
        $proSum = array_sum($proArr);

        //概率数组循环
        foreach ($proArr as $key => $proCur) {
            $randNum = mt_rand(1, $proSum);
            if ($randNum <= $proCur) {
                $result = $key;
                break;
            } else {
                $proSum -= $proCur;
            }
        }
        unset ($proArr);

        return $result;
    }

    /**
     * 不中奖信息
     * @param int $id
     * @return array|mixed
     */
    public static function getBad($id = self::BAD_ID)
    {
        $model = Yii::$app->cache->get('bad');

        if ($model == false) {
            $model = Config::findOne($id);

            Yii::$app->cache->set('bad', $model, 3600);
        }

        return $model;
    }
}