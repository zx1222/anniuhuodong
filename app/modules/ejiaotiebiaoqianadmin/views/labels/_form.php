<?php

use yii\helpers\Html;
use app\modules\ejiaotiebiaoqianadmin\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianLabels */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ejiaotiebiaoqian-labels-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'labels')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->dropDownList(ArrayHelper::getColumn($model->status(), 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
