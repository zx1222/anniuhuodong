<?php
/**
 * Created by PhpStorm.
 * User: Miinno
 * Date: 16/5/5
 * Time: 下午11:18
 */

namespace app\modules\ejiaotiebiaoqian\BL;

use app\modules\ejiaotiebiaoqian\models\EjiaotiebiaoqianConfig;
use app\modules\ejiaotiebiaoqian\models\EjiaotiebiaoqianPrize;
use app\modules\ejiaotiebiaoqian\models\Config;
use app\modules\ejiaotiebiaoqian\models\PrizePool;
use Yii;
use yii\base\Object;
use yii\web\NotFoundHttpException;

class Lottery extends Object
{
    const BAD_ID = 5;

    static public function run()
    {

        $_prize_arr = Yii::$app->cache->get('config');
        if ($_prize_arr == false) {
            $_prize_arr = EjiaotiebiaoqianConfig::find()->where(['or', ['>', 'praisenumber', 0], ['id' => self::BAD_ID]])->asArray()->all();
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

// 判断每人一次实物奖
        if (EjiaotiebiaoqianPrize::Prize()) {
            $rid = self::BAD_ID;
        }
// 禁止中奖时间段
        $now = time();
        $start = strtotime(date('Y-m-d') . ' 00:00:00');
        $end = strtotime(date('Y-m-d') . '08:30:00');


        if ($now >= $start && $now <= $end) {
            $rid = self::BAD_ID;
        }

        // 抽奖记录保存
        if ($prize_arr[$rid]['praisenumber'] > 0 || $rid == self::BAD_ID) {

            $model = new EjiaotiebiaoqianPrize();
            $model->user = Yii::$app->user->identity->openid;
            $model->prize_id = $rid;
            $model->status = $rid == self::BAD_ID ? 0 : 1;
            //开启事务
            $trans = Yii::$app->db->beginTransaction();
            try {
                //中奖纪录表添加
                $model->save();
                //更新奖品表的库存
                if ($rid != self::BAD_ID) {
                    $config = EjiaotiebiaoqianConfig::findOne($rid);
                    $config->praisenumber = ($config->praisenumber) - 1;
                    $config->save(false);
                    Yii::$app->cache->flush();
                    $res = $prize_arr[$rid];
                    $res['praiseimage'] = $res['praiseimage'] ? Yii::getAlias('@uploadsUrl/ejiaotiebiaoqian/' . $res['praiseimage']) : '';
                } else {
                    $res = self::getBad($rid);
                }
                //事务提交
                $trans->commit();
                //事务回滚
            } catch (Exception $e) {
                $trans->rollBack();
                throw new NotFoundHttpException(print_r($model->errors));
            }

        } else {
            $res = self::getBad($rid);
        }
        return $res;
    }

    /**
     * 抽奖改了计算，返回中奖结果
     * @param $proArr
     * @return int|string
     */
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

    /**
     * 根据奖品id获取奖品详情
     * @param int $id
     * @return array|mixed
     */
    static public function getBad($id = self::BAD_ID)
    {
        $model = Yii::$app->cache->get('bad');
        if ($model == false) {
            $model = EjiaotiebiaoqianConfig::findOne($id)->toArray();
            $model['praiseimage'] = $model['praiseimage'] ? Yii::getAlias('@uploadsUrl/ejiaotiebiaoqian/' . $model['praiseimage']) : '';
            $min = explode(",", $model['min']);
            $max = explode(",", $model['max']);
            if (count($min) > 1) {
                $model['min'] = $min;
            }
            if (count($max) > 1) {
                $model['max'] = $max;
            }

            Yii::$app->cache->set('bad', $model, 3600);
        }

        return $model;
    }
}