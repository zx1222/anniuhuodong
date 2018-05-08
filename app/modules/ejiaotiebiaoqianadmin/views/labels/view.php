<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianLabels */

$this->title = $model->labels;
$this->params['breadcrumbs'][] = ['label' => '阿胶贴标签', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejiaotiebiaoqian-labels-view">

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'labels',
            [
                'value' => "<span class='label " . $result['htmlClass'] . "'>" . $result['name'] . "</span>",
                'attribute' => 'status',
                'format' => 'html',
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
