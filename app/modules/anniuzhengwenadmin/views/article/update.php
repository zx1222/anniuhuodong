<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\anniuzhengwenadmin\models\AnniuzhengwenArticle */

$this->title = '修改文章: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '安牛征文', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="anniuzhengwen-article-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
