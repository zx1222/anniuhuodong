<?php

namespace app\modules\zhuanpan\controllers;

use app\modules\zhuanpan\BL\StatusTransfer;
use app\modules\zhuanpan\models\User;
use app\modules\zhuanpan\models\WinForm;
use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use app\modules\zhuanpan\BL\Lottery;


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
        if (Yii::$app->user->isGuest) {
            return $this->redirect(Url::to(['oauth/index'], true));
        }

        return $this->render('index');
    }

    /**
     * Renders the index view for the module 答题
     * @return string
     */
    public function actionSurvey()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(Url::to(['oauth/index'], true));
            exit;
        }
        if (!empty(Yii::$app->user->identity->extra)) {
            return $this->redirect(Url::to(['default/index'], true));
            exit;
        }

        if (StatusTransfer::isEnd()) {
            return $this->redirect(Url::to(['default/index'], true));
            exit;
        }

        if (Yii::$app->request->isAjax && Yii::$app->request->post()) {

            $data = serialize(Yii::$app->request->post('optionsRadios'));
            Yii::$app->user->identity->extra = $data;

            if (Yii::$app->user->identity->save()) {
                return 1;
            } else {
                return 0;

            }
        }

        return $this->render('survey');
    }

    /**
     * Renders the index view for the module 答题
     * @return string
     */
    public function actionShare($openid)
    {

        $son = User::findOne($openid);
        if (empty($son)) {
            return $this->render('index');

        }
        return $this->render('share', ['answer' => unserialize($son->extra)]);
    }


    /**
     * Renders the index view for the module 抽奖
     * @return string
     */
    public function actionLottery()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(Url::to(['oauth/index'], true));
        }
        if (StatusTransfer::isEnd()) {
            return $this->redirect(Url::to(['default/index'], true));
            exit;
        }
        // 计算今天第几天

        if (StatusTransfer::getOrdinal() > 7) {
            return;
        }

        StatusTransfer::markRenew();

        return $this->render('lottery', [
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
        if (Yii::$app->user->isGuest) {
            return $this->redirect(Url::to(['oauth/index'], true));
        }
        // 计算今天第几天

        if (StatusTransfer::isEnd() || StatusTransfer::getOrdinal() > 7) {
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
        if (Yii::$app->user->isGuest) {
            return false;
        }
        $model = new WinForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->user->identity->realname = $model->name;
            Yii::$app->user->identity->mobile = $model->phone;
            Yii::$app->user->identity->address = $model->address;
            if (Yii::$app->user->identity->save() !== false) {
                return 1;
            } else {
                return 0;
            }
        }
    }
}
