<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prize Pools';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prize-pool-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Prize Pool', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'pid',
            'aid',
            'status',
            'openid',
            'ip',
             'order',
             'created_at',
             'type',

        ],
    ]); ?>
</div>
