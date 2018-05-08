<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\anniuchongyangadmin\models\AnniuchongyangQuestion */

$this->title = '修改诗词: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '诗词', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anniuchongyang-question-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
