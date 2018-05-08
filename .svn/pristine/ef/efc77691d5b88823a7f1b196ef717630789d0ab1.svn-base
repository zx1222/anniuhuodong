<?php

namespace app\modules\chongyang\controllers;

use app\modules\chongyang\models\PrizePool;
use Yii;
use app\modules\chongyang\BL\StatusTransfer;
use yii\web\Controller;
use yii\helpers\Url;
use app\modules\chongyang\BL\Lottery;


/**
 * Default controller for the `zhuanpan` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
//        echo '<h1>活动维护中,请稍后关注.</h1>';
//        exit;
        if (Yii::$app->userchongyang->isGuest) {
            return $this->redirect(Url::to(['oauth/index'], true));
        }

        // 计算今天第几天
//
//        if (StatusTransfer::getOrdinal() > 6) {
//            return;
//        }
        $ending = StatusTransfer::getOrdinal() > 6;
        return $this->render('index', [
            'ending' => $ending,
            'forbidden' => $ending == false ? StatusTransfer::allowLottery() : true,
        ]);

    }

    /**
     * Renders the index view for the module 抽奖
     * @return string
     */
    public function actionLotteryRun()
    {
        $userIP = Yii::$app->getRequest()->getUserIP();
        if (Yii::$app->userchongyang->isGuest) {
            return $this->redirect(Url::to(['oauth/index'], true));
        }
        // 计算今天第几天

        if (StatusTransfer::getOrdinal() > 7) {
            return;
        }
        StatusTransfer::markRenew();

        if (StatusTransfer::allowLottery()) {
            // 本日抽奖次数达到上线:不允许再抽
            echo 0;
            return false;
        }

        if (!StatusTransfer::allowLottery() && StatusTransfer::getToDayPid() != 0) {
            // 本日已经获奖:可抽但不会中奖
            $result = Lottery::getBad();
            StatusTransfer::markPause();

        }

        if (!StatusTransfer::allowLottery() && StatusTransfer::getToDayPid() == 0) {
            // 可以正常抽奖
            $result = Lottery::run();
        }

        $min = $result['min'];
        $max = $result['max'];
        if (is_array($min)) { //多等奖的时候
            $i = mt_rand(0, count($min) - 1);
            $result['angle'] = mt_rand($min[$i], $max[$i]);
        } else {
            $result['angle'] = [];
        }
        $result['praisename'] = $result['praisename'];

        unset($result['min'], $result['max'], $result['praisefeild'], $result['praisenumber'], $result['chance']);
        return json_encode($result);
    }

    public function actionCallback()
    {

        $userIP = Yii::$app->getRequest()->getUserIP();

        if (Yii::$app->userchongyang->isGuest) {
            return $this->redirect(Url::to(['oauth/index'], true));
        }

        $luckyModel = PrizePool::find()->where(['status' => 1, /*'ip' => $userIP, */
            'openid' => Yii::$app->userchongyang->getId()])->one();

        if (!empty($luckyModel)) {
            $luckyModel->status = 10;
            if ($luckyModel->save() !== false) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }

    }

}
