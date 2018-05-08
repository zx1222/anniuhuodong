<?php

namespace app\modules\chongqing\controllers;

use Yii;
use app\modules\chongqing\BL\StatusTransfer;
use yii\web\Controller;
use yii\helpers\Url;
use app\modules\chongqing\BL\Lottery;


/**
 * Default controller for the `zhuanpan` module
 */
class DefaultController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * Renders the index view for the module
     * @return string
     */
    public function init()
    {
        parent::init();
        $this->view->title = Yii::$app->params['site_name'];


    }

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(Url::to(['oauth/index', 'forword' => urlencode(Url::current([], true))], true))->send();
        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub

    }

    public function actionIndex()
    {
//        echo '<h1>活动维护中,请稍后关注.</h1>';
//        exit;

        // 计算今天第几天

        if (StatusTransfer::getOrdinal() > 4) {
            return;
        }


       StatusTransfer::markRenew();

        return $this->render('index', [
            'forbidden' => StatusTransfer::allowLottery(),
            //'forbidden' => '',
        ]);

    }

    /**
     * Renders the index view for the module 抽奖
     * @return string
     */
    public function actionLotteryRun()
    {

        // 计算今天第几天

        if (StatusTransfer::getOrdinal() > 4) {
            return;
        }


        if (StatusTransfer::allowLottery() || StatusTransfer::getToDayStatus() % 10 == 0) {
            // 本日抽奖次数达到上线:不允许再抽
            echo '别闹!';
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
            $result['angle'] = mt_rand(($min[$i]+10), ($max[$i]-10));
        } else {
            $result['angle'] = mt_rand($min+10, $max-10); //随机生成一个角度
        }
        $result['praisename'] = $result['praisename'];


        return json_encode($result);

    }

}
