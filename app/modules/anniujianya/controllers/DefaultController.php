<?php

namespace app\modules\anniujianya\controllers;

use app\modules\anniujianya\models\PrizePool;
use app\modules\anniujianya\models\User;
use Yii;
use app\modules\anniujianya\BL\StatusTransfer;
use yii\base\Object;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\helpers\Url;
use app\modules\anniujianya\BL\Lottery;
use app\modules\anniujianya\models\WinForm;

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
        if (Yii::$app->user->isGuest) {
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
    public function actionScore()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(Url::to(['oauth/index'], true));
        }

        if (Yii::$app->request->isAjax) {
            Yii::$app->user->identity->extra = intval(Yii::$app->request->post('score'));
            if (Yii::$app->user->identity->save() !== false) {
                return 1;
            }
        }
        return 0;

    }

    /**
     * Renders the index view for the module 抽奖
     * @return string
     */
    public function actionRank()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(Url::to(['oauth/index'], true));
        }

        $score = Yii::$app->user->identity->extra;
        $name = Yii::$app->user->identity->wx_username;
        $rank = User::find()->select('wx_username,extra')->where(['rank'=>1])->orderBy('extra Desc')->asArray()->limit(6)->all();
        $score = empty($score) ? 0 : $score;
        return json_encode(['my'=>['name' => $name,'score' => $score],'rank'=>$rank]);

    }

    /**
     * Renders the index view for the module 抽奖
     * @return string
     */
    public function actionLotteryRun()
    {
        $userIP = Yii::$app->getRequest()->getUserIP();
        if (Yii::$app->user->isGuest) {
            return $this->redirect(Url::to(['oauth/index'], true));
        }
        // 计算今天第几天

        if (empty(Yii::$app->user->identity->mobile)) {

            Yii::$app->user->identity->mobile = Yii::$app->request->post('phone');
            if (Yii::$app->user->identity->save() === false) {
                return;
            }
        }
        if (StatusTransfer::isEnd()) {
            return json_encode(['id' => 1]);
        }
        StatusTransfer::markRenew();

        if (StatusTransfer::allowLottery()) {
            // 本日抽奖次数达到上线:不允许再抽
            return json_encode(['id' => 1]);
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


}
