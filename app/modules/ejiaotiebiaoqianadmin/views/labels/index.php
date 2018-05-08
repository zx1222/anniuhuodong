<?php

use yii\helpers\Html;
use app\modules\ejiaotiebiaoqianadmin\widgets\GridView;
use app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianLabels;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianLabelsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '阿胶贴标签';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejiaotiebiaoqian-labels-index">



    <p>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'labels',
            [
                'class' => '\app\modules\valentinesdayadmin\widgets\StatusColumn',
                'status' => EjiaotiebiaoqianLabels::status(),
                'attribute' => 'status'
            ],
            'created_at:datetime',
            'updated_at:datetime',

            [
                'header'=>'操作',
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
                'headerOptions' => ['width' => '50'],
            ],
        ],
    ]); ?>
</div>
