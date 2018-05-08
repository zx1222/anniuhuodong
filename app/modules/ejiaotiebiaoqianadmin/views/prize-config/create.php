<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianConfig */

$this->title = '添加奖项';
$this->params['breadcrumbs'][] = ['label' => '奖项', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejiaotiebiaoqian-config-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
