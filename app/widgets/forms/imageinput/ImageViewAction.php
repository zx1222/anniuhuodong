<?php

namespace app\widgets\forms\imageinput;


use app\models\SysImage;
use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;


/**
 * Action for sortable Yii2 GridView widget.
 *
 * For example:
 *
 * ```php
 * public function actions()
 * {
 *    return [
 *       'image' => [
 *          'class' => ImageInputAction::className(),
 *       ],
 *   ];
 * }
 * ```
 *
 */
class ImageInputAction extends Action
{

    public function run($hash)
    {
        $model = SysImage::findOne($hash);
        $imageUrl = Yii::getAlias('@web/' . Yii::getAlias('@uploadsUrl/' . $model->local_path));
        if (YII_ENV_PROD) {
            $imageUrl = !empty($model->url) ? $model->url : $imageUrl;
        }
        return Yii::$app->controller->redirect($imageUrl);

    }
}
