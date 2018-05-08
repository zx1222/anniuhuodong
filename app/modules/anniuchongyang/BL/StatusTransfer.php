<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 16/5/7
 * Time: 上午3:27
 */

namespace app\modules\anniuchongyang\BL;

use Yii;

class StatusTransfer

{
    const FORBIDDEN_STATUS = 40;
    static public $status = [10, 11, 20, 21, 30, 31, self::FORBIDDEN_STATUS];

    /**
     *  计算今天第几天
     * @return init
     */
    static public function getOrdinal()
    {
        $start_at = Yii::$app->params['start_at'];
        $ordinal = (strtotime(date('Y-m-d')) - strtotime($start_at)) / 86400 + 1;
        return $ordinal;
    }

    static public function getToDayStatus()
    {
        $userInfo = Yii::$app->user->getIdentity()->toArray();
        $toDayStatus = $userInfo['d' . self::getOrdinal() . '_status'];

        return $toDayStatus;
    }

    static public function getToDayPid()
    {
        $userInfo = Yii::$app->user->getIdentity()->toArray();
        $toDayPid = $userInfo['d' . self::getOrdinal() . '_pid'];

        return $toDayPid;
    }

    static public function allowLottery()
    {
        $forbidden = false;

        if (self::getToDayStatus() >= self::FORBIDDEN_STATUS) {
            // 本日抽奖次数达到上线:不允许再抽
            $forbidden = true;
        }

        return $forbidden;
    }

    static public function markRenew()
    {
        $toDayStatus = self::getToDayStatus();
        $toDayStatusField = 'd' . self::getOrdinal() . '_status';

        if ($toDayStatus < self::FORBIDDEN_STATUS && $toDayStatus % 10 == 0) {
            $toStatusKey = array_search($toDayStatus, self::$status);
            $currentStatus = self::$status[$toStatusKey + 1];
            Yii::$app->user->identity->$toDayStatusField = $currentStatus;
            Yii::$app->user->identity->save();
        }

    }

    static public function markPause($prize = false)
    {
        $toDayPidField = 'd' . self::getOrdinal() . '_pid';
        if ($prize != false && $prize['praisenumber'] > 0) {
            Yii::$app->user->identity->$toDayPidField = $prize['id'];
        }
        Yii::$app->user->identity->save();
    }

    /**
     * 判断每人一次实物奖
     * @return bool
     */
    static public function getCool()
    {
        $userInfo = Yii::$app->user->getIdentity()->toArray();
        $cool = false;
        for ($i = 1; $i <= 7; $i++) {
            $cool = $userInfo['d' . $i . '_pid'] >= 1 ? true : false;
            if($cool){
                break;
            }
        }

        return $cool;
    }
}