<?php

use yii\helpers\Html;
use app\modules\valentinesdayadmin\widgets\ActiveForm;
use app\widgets\forms\imageinput\ImageInput;

/* @var $this yii\web\View */
/* @var $model app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianConfig */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ejiaotiebiaoqian-config-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'praisename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'praisecontent')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'praisenumber')->textInput() ?>
    <?php if (!empty($model->praiseimage)): ?>
        <p>当前图片:</p>
        <?= Html::img(Yii::getAlias('@uploadsUrl/ejiaotiebiaoqian/' . $model->praiseimage), ['width' => '200px']) ?>
    <?php endif; ?>

    <?= $form->field($model, 'imageFile')->widget(ImageInput::className(), [
        'hintFileSize' => '1000KB',
        'hintImageSize' => '180px*140px',
        'hintExtensions' => 'png,jpg',
    ])->label('奖品图') ?>

    <?= $form->field($model, 'chance')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
