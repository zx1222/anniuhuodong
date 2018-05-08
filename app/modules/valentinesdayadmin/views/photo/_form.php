<?php

use yii\helpers\Html;
use app\modules\valentinesdayadmin\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\valentinesdayadmin\models\LoversUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lovers-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?php if(!empty($model->photo)):?>
    <div class="form-group field-photo-photo">
        <label class="col-md-2 control-label" for="photo-shopname">图片</label>
        <div class="col-md-10">
            <img src="<?= Yii::getAlias('@uploadsUrl/'.$model->photo)?>" alt="" width="300px">
            <div class="help-block"></div>
        </div>
    </div>
    <?php endif;?>
    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shopname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'declaration')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList(ArrayHelper::getColumn($model->status(), 'name')) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '' : '修改', ['class' =>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
