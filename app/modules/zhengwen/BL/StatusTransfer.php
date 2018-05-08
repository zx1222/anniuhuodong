<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 16/5/7
 * Time: 上午3:27
 */

namespace app\modules\zhengwen\BL;

use Yii;

class StatusTransfer

{
    const FORBIDDEN_STATUS = 20;
    static public $status = [
        10, 11,
        20, 21,
        30, 31,
        40, 41,
        50, 51,
        60, 61,
        70, 71,


        self::FORBIDDEN_STATUS];

    /**
     *  计算今天第几天
     * @return init
     */
    static public function isEnd()
    {
        $zhuanpan_end_at = Yii::$app->params['zhuanpan_end_at'];
        $isEnd = false;

        if (time() > strtotime($zhuanpan_end_at)) {
            $isEnd = true;
        }

        return $isEnd;
    }

    static public function getOrdinal()
    {
        $start_at = Yii::$app->params['start_at'];
        $ordinal = (strtotime(date('Y-m-d')) - strtotime($start_at)) / 86400 + 1;
        return $ordinal;
    }

    static public function getToDayStatus()
    {
        $userInfo = Yii::$app->userzhengwen->getIdentity()->toArray();
        $toDayStatus = $userInfo['d' . self::getOrdinal() . '_status'];

        return $toDayStatus;
    }


    static public function getToDayPid()
    {
        $userInfo = Yii::$app->userzhengwen->getIdentity()->toArray();
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
            Yii::$app->userzhengwen->identity->$toDayStatusField = $currentStatus;
            Yii::$app->userzhengwen->identity->save();
        }

    }

    static public function markPause($prize = false)
    {
        $toDayStatus = self::getToDayStatus();
        $toDayStatusField = 'd' . self::getOrdinal() . '_status';
        $toDayPidField = 'd' . self::getOrdinal() . '_pid';

        $toStatusKey = array_search($toDayStatus, self::$status);
        $currentStatus = self::$status[$toStatusKey + 1];
        Yii::$app->userzhengwen->identity->$toDayStatusField = $currentStatus;
        if ($prize != false && $prize['praisenumber'] > 0) {
            Yii::$app->userzhengwen->identity->$toDayPidField = $prize['id'];
        }
        Yii::$app->userzhengwen->identity->save();


    }

    static public function getCool()
    {
        $userInfo = Yii::$app->userzhengwen->getIdentity()->toArray();
        $cool = false;
        for ($i = 1; $i <= 10; $i++) {
            $cool = $userInfo['d' . $i . '_pid'] > 1 ? true : false;
        }

        return $cool;
    }
}