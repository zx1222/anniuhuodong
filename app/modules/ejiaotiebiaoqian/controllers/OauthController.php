<?php
/**
 * Created by PhpStorm.
 * User: Miinno-10
 * Date: 2017/9/12
 * Time: 10:43
 */

namespace app\modules\ejiaotiebiaoqian\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;


use app\modules\ejiaotiebiaoqian\models\User;


class OauthController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($open_id = '', $forword)
    {

        $openId = $open_id;

//        if (YII_ENV_DEV) {
//            $openId = 'o_P7SwLw3vgSa9dhkgHMDiaDskqk444';//todo
//        }
        if (empty($openId)) {

            return $this->redirect(Yii::$app->exchange->getOauthUrl(urlencode(Url::current(['forword' => $forword], true))));

        } else {
            $userInfo = Yii::$app->exchange->getUserInfo($openId);

            if (isset($userInfo['open_id'])) {
                $user = User::findIdentity($openId);
                if (empty($user)) {
                    $user = new User();
                    $user->openid = $openId;
                    $user->ip = Yii::$app->request->userIP;
                    if ($userInfo['user']) {
                        $user->wx_username = $userInfo['user']['nickname'] ? $userInfo['user']['nickname'] : '';
                        $user->wx_avatar = $userInfo['user']['avatar'] ? $userInfo['user']['avatar'] : '';
                    }
                    $user->save();
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
