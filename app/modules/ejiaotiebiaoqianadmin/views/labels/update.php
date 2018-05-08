<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianLabels */

$this->title = '编辑标签: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '阿胶贴标签', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->labels, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ejiaotiebiaoqian-labels-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
