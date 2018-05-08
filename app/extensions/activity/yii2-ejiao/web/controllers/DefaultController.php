<?php
/**
 * Created by PhpStorm.
 * User: Miinno-10
 * Date: 2017/7/3
 * Time: 14:16
 */
namespace activity\ejiao\web\controllers;

use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use activity\ejiao\models\UserModel;

class DefaultController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionCreate()
    {

        //接收值
        $request = Yii::$app->request;
        $callback = $request->get('callback');

        $model = new UserModel();
        if ($request->isGet) {
            if ($model->load($request->get(), '') && $model->save()) {
                $result = [
                    'code' => 0,
                    'desc' => '添加成功',
                ];
            } else {
                $result = [
                    'code' => 1,
                    'desc' => '添加失败',
                ];
            }
        } else {
            $result = [
                'code' => 1,
                'desc' => '请求方式错误',
            ];
        }
        $result = Json::encode($result);

        return $callback . '(' . $result . ')';
    }
}