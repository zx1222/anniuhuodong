<?php

use yii\helpers\Html;
use app\modules\anniuchongyangadmin\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\anniuchongyangadmin\widgets\forms\imageinput\ImageInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\anniuchongyangadmin\models\AnniuchongyangQuestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anniuchongyang-question-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'question_category')->dropDownList(ArrayHelper::getColumn($model->status(), 'name'), ['prompt' => '请选择诗词阶段']) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'question')->textarea(['maxlength' => true, 'rows' => "6", 'cols' => "30"]) ?>

    <?= $form->field($model, 'choiceA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'choiceB')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'right_choice')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
