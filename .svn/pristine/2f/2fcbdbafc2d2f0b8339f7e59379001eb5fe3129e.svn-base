<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 16/5/5
 * Time: 下午11:18
 */

namespace app\modules\fathersday\BL;

use Yii;
use yii\base\Object;
use app\modules\fathersday\models\PrizePoolChallenger;
use app\modules\fathersday\models\ConfigChallenger;


class ChallengerLottery extends Object
{
    const BAD_ID = 6;

    static public function run()
    {

        $_prize_arr = Yii::$app->cache->get('config');
        if ($_prize_arr == false) {
            $_prize_arr = ConfigChallenger::find()->asArray()->all();
            Yii::$app->cache->set('config', $_prize_arr, 3600);
        }

        foreach ($_prize_arr as $key => $val) {
            $min = explode(",", $val['min']);
            $max = explode(",", $val['max']);
            if (count($min) > 1) {
                $val['min'] = $min;
            }
            if (count($max) > 1) {
                $val['max'] = $max;
            }
            $prize_arr[$val['id']] = $val;
            $arr[$val['id']] = $val['chance'];
        }
//根据概率获取奖项id
        $rid = self::getRand($arr);


// 禁止发红包时间段
        $now = time();
        $start = strtotime(date('Y-m-d') . ' 00:00:00');
        $end = strtotime(date('Y-m-d') . '08:30:00');


        if ($now >= $start && $now <= $end) {
            $rid = self::BAD_ID;
        }
// 奖品插入奖池
        $res = self::getBad();

        if ($prize_arr[$rid]['praisenumber'] > 0) {

            $prizeModel = PrizePoolChallenger::find()
                ->where(['status' => 0])
                ->andWhere(['aid' => $rid])
                ->orderBy(['rand()' => SORT_DESC])
                ->limit(10)
                ->all();

            if (!empty($prizeModel)) {
// 随机更新
                $lukeyModel = $prizeModel[array_rand($prizeModel, 1)];
                $lukeyModel->status = 1;
                $lukeyModel->openid = Yii::$app->user->getId();
                $lukeyModel->ip = $_SERVER["REMOTE_ADDR"];


                if (PrizePoolChallenger::updateAll(['status' => 1, 'openid' => Yii::$app->user->getId(), 'ip' => $_SERVER["REMOTE_ADDR"]], ['status' => 0, 'pid' => $lukeyModel->pid]) !== false) {
                    $res = $prize_arr[$rid];
                }
            }
        }
// 更新状态

        ChallengerStatusTransfer::markPause($res);
        return $res;


    }

    static private function getRand($proArr)
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

    static public function getBad($id = self::BAD_ID)
    {


        $model = Yii::$app->cache->get('c_bad');

        if ($model == false) {
            $model = ConfigChallenger::findOne($id)->toArray();

            $min = explode(",", $model['min']);
            $max = explode(",", $model['max']);
            if (count($min) > 1) {
                $model['min'] = $min;
            }
            if (count($max) > 1) {
                $model['max'] = $max;
            }

            Yii::$app->cache->set('c_bad', $model, 3600);
        }

        return $model;
    }
}