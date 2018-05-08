<?php
/**
 * Created by PhpStorm.
 * User: Miinno-10
 * Date: 2018/4/19
 * Time: 14:37
 */

namespace app\modules\ejiaomothersday\BL;

use Yii;

class StatusTransfer
{
    /**
     * 判断活动是否结束
     * @return bool true 结束 false未结束
     */
    public static function isEnd()
    {
        $zhuanpan_end_at = Yii::$app->params['zhuanpan_end_at'];
        $isEnd = false;

        if (time() > strtotime($zhuanpan_end_at)) {
            $isEnd = true;
        }

        return $isEnd;
    }

    /**
     * 计算今天第几天
     * @return init
     */
    public static function getOrdinal()
    {
        $start_at = Yii::$app->params['start_at'];
        $ordinal = (strtotime(date('Y-m-d')) - strtotime($start_at)) / 86400 + 1;

        return $ordinal;
    }

    /**
     * 获取对应天数的抽奖次数的值
     * @return mixed
     */
    public static function getToDayStatus()
    {
        $userInfo = Yii::$app->user->getIdentity()->toArray();
        $toDayStatus = $userInfo['d' . self::getOrdinal() . '_status'];

        return $toDayStatus;
    }

    /**
     * 获取对应天数的奖品的值
     * @return mixed
     */
    public static function getToDayPid()
    {
        $userInfo = Yii::$app->user->getIdentity()->toArray();
        $toDayPid = $userInfo['d' . self::getOrdinal() . '_pid'];

        return $toDayPid;
    }

    /**
     * 修改对应的奖品以及每次抽奖记录抽奖次数的值
     * @param bool $prize
     */
    public static function markPause($prize = false)
    {
        $toDayStatus = self::getToDayStatus();
        $toDayStatusField = 'd' . self::getOrdinal() . '_status';
        $toDayPidField = 'd' . self::getOrdinal() . '_pid';
        Yii::$app->user->identity->$toDayStatusField = $toDayStatus + 1;
        if ($prize != false && $prize['praisenumber'] > 0) {
            Yii::$app->user->identity->$toDayPidField = $prize['id'];
        }

        Yii::$app->user->identity->save();
    }

    /**
     * 判断只能中一次实物奖品
     * @return bool
     */
    public static function getCool()
    {
        $userInfo = Yii::$app->user->getIdentity()->toArray();
        $cool = false;
        for ($i = 1; $i <= 7; $i++) {
            $cool = $userInfo['d' . $i . '_pid'] >= 1 ? true : false;
            if ($cool) {
                break;
            }
        }

        return $cool;
    }
}