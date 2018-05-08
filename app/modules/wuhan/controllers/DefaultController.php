<?php

namespace app\modules\wuhan\controllers;

use Yii;
use app\modules\wuhan\BL\StatusTransfer;
use app\modules\wuhan\models\WinForm;
use yii\web\Controller;
use yii\helpers\Url;
use app\modules\wuhan\BL\Lottery;


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

        if (Yii::$app->userxipuhui->identity === Null) {
            return $this->redirect(Url::to(['oauth/index'], true));
        }

        // 计算今天第几天

        if (StatusTransfer::getOrdinal() > 7) {
            return;
        }


        StatusTransfer::markRenew();

        return $this->render('index', [
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
        if (Yii::$app->userxipuhui->isGuest) {
            return $this->redirect(Url::to(['oauth/index'], true));
        }
        // 计算今天第几天

        if (StatusTransfer::getOrdinal() > 7) {
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
            $result['angle'] = mt_rand($min[$i], $max[$i]);
        } else {
            $result['angle'] = mt_rand($min, $max); //随机生成一个角度
        }
        $result['praisename'] = $result['praisename'];


        return json_encode($result);

    }

    /**
     * Renders the index view for the module 领奖
     * @return string
     */
    public function actionReceive()
    {
        if (Yii::$app->userxipuhui->isGuest) {
            return false;
        }
        $model = new WinForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->userxipuhui->identity->realname = $model->name;
            Yii::$app->userxipuhui->identity->mobile = $model->phone;
            Yii::$app->userxipuhui->identity->address = $model->address;
            if (Yii::$app->userxipuhui->identity->save() !== false) {
                return 1;
            } else {
                return 0;
            }
        }
    }
}
