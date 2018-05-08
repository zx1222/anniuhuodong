<?php

namespace app\modules\peixiaowangluo\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;


use app\modules\peixiaowangluo\models\User;


class OauthController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($open_id = '', $forword)
    {
        $openId = $open_id;

        if (YII_ENV_DEV) {
            $openId = 'o_P7SwLw3vgSa9dhkgHMDiaDskqk';
        }
        if (empty($openId)) {

            return $this->redirect(Yii::$app->exchange->getOauthUrl(urlencode(Url::current(['forword' => $forword,], true)), 'snsapi_base'));
        } else {
//            $userInfo = Yii::$app->exchange->getUserInfo($openId);
            if ($openId) {
                $user = User::findIdentity($openId);
                if (empty($user)) {
                    $user = new User();
                    $user->openid = $openId;
                    $user->ip = Yii::$app->request->userIP;
//                if ($userInfo['user']) {
//                    $user->wx_username = $userInfo['user']['nickname'] ? $userInfo['user']['nickname'] : '';
//                    $user->wx_avatar = $userInfo['user']['avatar'] ? $userInfo['user']['avatar'] : '';
//                }
                    if ($user->save() !== true) {

                        print_r($user->errors);
                    }
                }

                Yii::$app->user->logout();

                Yii::$app->user->login($user, 7200);

                return $this->redirect(urldecode($forword));
            }
            {
                echo '该用户不存在';
            }

        }

    }


}
