<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 16/5/7
 * Time: 上午3:27
 */

namespace app\modules\fathersday\BL;

use Yii;

class ChallengerStatusTransfer

{
    const FORBIDDEN_STATUS = 20;
    static public $status = [
        10, 11,
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
        return Yii::$app->user->getIdentity()->photo->prize_status;
    }

    static public function getToDayPid()
    {


        return Yii::$app->user->getIdentity()->photo->prize_pid;
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

        if ($toDayStatus < self::FORBIDDEN_STATUS && $toDayStatus % 10 == 0) {
            $toStatusKey = array_search($toDayStatus, self::$status);
            $currentStatus = self::$status[$toStatusKey + 1];
            Yii::$app->user->getIdentity()->photo->prize_status = $currentStatus;
            Yii::$app->user->identity->photo->save();
        }

    }

    static public function markPause($prize = false)
    {
        $toDayStatus = self::getToDayStatus();

        $toStatusKey = array_search($toDayStatus, self::$status);
        $currentStatus = self::$status[$toStatusKey + 1];
        Yii::$app->user->getIdentity()->photo->prize_status = $currentStatus;
        if ($prize != false && $prize['praisenumber'] > 0) {
            Yii::$app->user->getIdentity()->photo->prize_pid = $prize['id'];
        }
        Yii::$app->user->identity->photo->save();


    }

    static public function getCool()
    {
        $cool = false;
        for ($i = 1; $i <= 7; $i++) {
            $cool = Yii::$app->user->getIdentity()->photo->prize_pid > 1 ? true : false;
        }

        return $cool;
    }
}