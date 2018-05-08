<?php

namespace app\modules\chongyang\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;


use app\modules\chongyang\models\User;


class OauthController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $wechat = Yii::$app->wechat;


        if (YII_ENV_PROD) {
            $code = Yii::$app->getRequest()->get('code');

            if (empty($code)) {
                $this->redirect(Url::to(['oauth/get-code'], true));
                return;
            }

            $oath2Token = $wechat->getOauth2AccessToken($code);
            $openid = $oath2Token['openid'];
            $accesstoken = $oath2Token['access_token'];
            $info = $wechat->getUserInfo($openid, $accesstoken);
        }

        if (YII_ENV_DEV) {
            $openid = 'oWwl7s3ULfcMY0fBeLziZGcp389Q';
            $accesstoken = 'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x';
            $info = [
                'subscribe' => 1,
                'openid' => 'oWwl7s3ULfcMY0fBeLziZGcp389Q',
                'nickname' => '素生',
                'sex' => 1,
                'language' => 'zh_CN',
                'city' => '东城',
                'province' => '北京',
                'country' => '中国',
                'headimgurl' => 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',
                'subscribe_time' => 1462289551,
                'remark' => '',
                'groupid' => '',
                'tagid_list' => [],
            ];
        }
        $user = User::findIdentity($openid);

        if (empty($user) || ($user->wx_subscribe == 0 && $info['subscribe'] == 1)) {
            if (empty($user)) {
                $user = new User();
            }
            $user->openid = $openid;
            $user->wx_subscribe = $info['subscribe'];

            $user->wx_access_token = $accesstoken;
            $user->wx_expires = 7200;

            if ($info['subscribe'] == 1) {

                $user->wx_username = $info['nickname'];
                $user->wx_sex = $info['sex'];
                $user->wx_country = $info['country'];
                $user->wx_province = $info['province'];
                $user->wx_city = $info['city'];
                $user->wx_avatar = $info['headimgurl'];

            }

            $user->ip = $_SERVER["REMOTE_ADDR"];

            $user->save();
        }

        Yii::$app->userchongyang->logout();

        Yii::$app->userchongyang->login($user, 7200);

        return $this->redirect(['default/index']);

    }

    public function actionGetCode()
    {
        $wechat = Yii::$app->wechat;

        if (YII_ENV_DEV) {
            return $this->redirect(Url::to(['oauth/index', 'code' => 123456], true));

        }
        return $this->redirect($wechat->getOauth2AuthorizeUrl(Url::to(['oauth/index'], true), 'authorize', 'snsapi_userinfo'));
    }
}
