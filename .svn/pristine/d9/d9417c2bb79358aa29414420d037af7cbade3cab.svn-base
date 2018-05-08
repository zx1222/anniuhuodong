<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ejiaoaojiadajie\models\Photo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photo-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group"> <?= $model->openid ?></div>
    <div
        class="form-group"> <?= Html::tag('p', $model->weixinUser->wx_username) . Html::img($model->weixinUser->wx_avatar, ['width' => '46']) ?></div>
    <?= $form->field($model, 'desc')->textarea() ?>


    <?= $form->field($model, 'status')->dropDownList(['pending' => 'Pending', 'approved' => 'Approved', 'refused' => 'Refused',], ['prompt' => '']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
