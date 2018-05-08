<?php

/**
 * Created by PhpStorm.
 * User: Miinno-10
 * Date: 2017/12/15
 * Time: 16:55
 */
namespace app\modules\ejiaoyuandan2018\controllers;

use app\modules\ejiaoyuandan2018\models\Userinfo;
use Yii;
use yii\web\Controller;
use app\modules\ejiaoyuandan2018\BL\StatusTransfer;
use app\modules\ejiaoyuandan2018\BL\Lottery;
use yii\helpers\Url;
use yii\helpers\Json;

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

//
    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(Url::to(['oauth/index', 'forword' => urlencode(Url::current([], true))], true))->send();
        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub

    }

    /**
     * 活动首页
     * @return string
     */
    public function actionIndex()
    {
        $is_end = StatusTransfer::isEnd();
        return $this->render('index', [
            'is_end' => $is_end
        ]);
    }

    /**
     * 活动抽奖
     */
    public function actionLottery()
    {
        // 计算今天第几天

//        if (StatusTransfer::getOrdinal() > 4) {
//            return;
//        }
        StatusTransfer::markRenew();
        if (StatusTransfer::allowLottery() || StatusTransfer::getToDayStatus() % 10 == 0) {
            // 本日抽奖次数达到上线:不允许再抽
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
            $result['angle'] = mt_rand(($min[$i] + 10), ($max[$i] - 10));
        } else {
            $result['angle'] = mt_rand($min + 10, $max - 10); //随机生成一个角度
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
        $model = new Userinfo();
        if ($model->load(Yii::$app->request->post(), '') && $model->save()) {
            $result = [
                'code' => 0,
                'desc' => '添加成功',
            ];
        } else {
            $result = [
                'code' => 1,
                'desc' => $model->getErrors(),
            ];
        }
        return Json::encode($result);
    }
}