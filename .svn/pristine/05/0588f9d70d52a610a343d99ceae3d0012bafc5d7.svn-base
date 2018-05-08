<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 2017/6/29
 * Time: 下午3:58
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

class WechatController extends Controller
{
    public function actionJsApiConfig($url = null)
    {
        $ticket = Yii::$app->exchange->getJsApiTicket();
        $data = [
            'jsapi_ticket' => $ticket['ticket'],
            'noncestr' => Yii::$app->getSecurity()->generateRandomString(16),
            'timestamp' => (int)YII_BEGIN_TIME,
            'url' => ($url == null) ? explode('#', Yii::$app->getRequest()->getReferrer())[0] : $url
        ];
        $config = [
            'timestamp' => $data['timestamp'],
            'nonceStr' => $data['noncestr'],
            'signature' => sha1(urldecode(http_build_query($data))),
            'jsApiList' => ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ']
        ];
        $wxJsApiConfig = json_encode(Yii::$app->exchange->jsApiConfig($config));
        return "wx.config({$wxJsApiConfig})";
    }
}