<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianConfig */

$this->title = '奖项: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '奖项', 'url' => ['index']];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="ejiaotiebiaoqian-config-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
