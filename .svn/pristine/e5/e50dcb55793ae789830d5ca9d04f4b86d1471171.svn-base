<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\ejiaoaojiadajieadmin\models\EjiaoaojiadajiePhoto;
use app\modules\ejiaoaojiadajieadmin\widgets\ActiveForm;
use app\widgets\forms\imageinput\ImageInput;

/* @var $this yii\web\View */
/* @var $model app\modules\library\models\LibraryIntro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-intro-form panel-body">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
   <?php if (!empty($model->old_photo)): ?>
        <p>当前图片:</p>
        <?= Html::img(Yii::getAlias('@uploadsUrl/ejiaodajie/' . $model->old_photo), ['width' => '200px']) ?>
    <?php endif; ?>

 <?= $form->field($model, 'imageFile')->widget(ImageInput::className(), [
        'hintFileSize' => '1000KB',
        'hintImageSize' => '184px*54px',
        'hintExtensions' => 'png,jpg',
    ])->label('头图') ?>


    <?= $form->field($model, 'desc')->widget('app\widgets\ueditor\UEditor',
        ['clientOptions' => ['serverUrl' => Url::to(['upload']),
            //编辑区域大小
            'initialFrameHeight' => '400',]]
    )->label() ?>
    <div class="text-right">
        <?= Html::submitButton($model->isNewRecord ? '保存' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
