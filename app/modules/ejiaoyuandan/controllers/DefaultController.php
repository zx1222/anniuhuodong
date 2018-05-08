<?php

namespace app\modules\ejiaoyuandan\controllers;

use app\modules\ejiaoyuandan\models\PrizePool;
use Yii;
use app\modules\ejiaoyuandan\BL\StatusTransfer;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\helpers\Url;
use app\modules\ejiaoyuandan\BL\Lottery;
use app\modules\ejiaoyuandan\models\WinForm;

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
        if (Yii::$app->userejiaoyuandan->isGuest) {
            return $this->redirect(Url::to(['oauth/index'], true));
        }

        // 计算今天第几天
//
//        if (StatusTransfer::getOrdinal() > 6) {
//            return;
//        }
        $ending = StatusTransfer::isEnd();
        return $this->render('index', [
            'ending' => $ending,
            'forbidden' => StatusTransfer::allowLottery(),
            'formModel' => new WinForm()
        ]);

    }

    /**
     * Renders the index view for the module 抽奖
     * @return string
     */
    public function actionLotteryRun()
    {
        $userIP = Yii::$app->getRequest()->getUserIP();
        if (Yii::$app->userejiaoyuandan->isGuest) {
            return $this->redirect(Url::to(['oauth/index'], true));
        }
        // 计算今天第几天

        if (StatusTransfer::isEnd()) {
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
            $result['angle'] = mt_rand($min, $max); //随机生成一个角度
        }
        $result['praisename'] = $result['praisename'];

        unset($result['min'], $result['max'], $result['praisefeild'], $result['praisenumber'], $result['chance']);
        return json_encode($result);
    }

    public function actionPost()
    {

        if (Yii::$app->userejiaoyuandan->isGuest) {
            return $this->redirect(Url::to(['oauth/index'], true));
        }

        $model = new WinForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            $userExtra = Yii::$app->userejiaoyuandan->identity->extra;
            Yii::$app->userejiaoyuandan->identity->extra = !empty($userExtra) ?
                json_encode(ArrayHelper::merge(is_array(json_decode($userExtra, true)) ? json_decode($userExtra, true) : [Yii::$app->userejiaoyuandan->identity->d1_status == 20 ? 1 : 2 => $userExtra],
                    [StatusTransfer::getOrdinal() => $model->extra])) :
                json_encode([StatusTransfer::getOrdinal() => $model->extra]);

            if (Yii::$app->userejiaoyuandan->identity->save() !== false) {
                return 1;
            }
        }
        return 0;
    }

}
