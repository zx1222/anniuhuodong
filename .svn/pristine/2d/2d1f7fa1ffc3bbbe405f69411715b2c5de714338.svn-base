<?php

namespace app\modules\anniujianya\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;


use app\modules\anniujianya\models\User;


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
            $info = $wechat->getSnsUserInfo($openid, $accesstoken);
        }

        if (YII_ENV_DEV) {
            $openid = 'oWwl7s3ULfcMY0fBeLziZGcp389Q';
            $info = [
                'openid' => 'oWwl7s3ULfcMY0fBeLziZGcp389Q',
                'nickname' => '素生',
                'sex' => 1,
                'language' => 'zh_CN',
                'city' => '东城',
                'province' => '北京',
                'country' => '中国',
                'headimgurl' => 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',
            ];
        }
        $user = User::findIdentity($openid);

        if (empty($user)) {
            $user = new User();
            $user->openid = $openid;
            $user->wx_username = $info['nickname'];
            $user->wx_sex = $info['sex'];
            $user->wx_country = $info['country'];
            $user->wx_province = $info['province'];
            $user->wx_city = $info['city'];
            $user->wx_avatar = $info['headimgurl'];
            $user->ip = $_SERVER["REMOTE_ADDR"];

            $user->save();
        }

        Yii::$app->user->logout();

        Yii::$app->user->login($user, 7200);

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
