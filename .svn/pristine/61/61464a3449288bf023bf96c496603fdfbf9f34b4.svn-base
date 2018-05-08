<?php

use yii\helpers\Html;
use app\modules\anniuzhengwenadmin\widgets\ActiveForm;
use app\widgets\forms\imageinput\ImageInput;
/* @var $this yii\web\View */
/* @var $model app\modules\anniuzhengwenadmin\models\AnniuzhengwenArticle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anniuzhengwen-article-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>


    <?php if(!empty($model->content)):?>
        <div class="form-group field-photo-photo">
            <label class="col-md-2 control-label" for="photo-shopname">详情</label>
            <div class="col-md-10">
                <a href="<?= \yii\helpers\Url::to(['view','id'=>$model->id])?>"><img src="<?= Yii::getAlias('@uploadsUrl/anniuzhengwen/'.$model->content)?>" alt="" width="300px" height="300px"></a>
                <div class="help-block"></div>
            </div>
        </div>
    <?php endif;?>
    <?= $form->field($model, 'content')->widget(ImageInput::className(), [
        'hintFileSize' => '1000KB',
        'hintImageSize' => '184px*54px',
        'hintExtensions' => 'png,jpg',
    ])->label('文章详情') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
