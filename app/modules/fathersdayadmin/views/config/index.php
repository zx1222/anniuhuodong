<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Configs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
//            'praisefeild',
            'praisename',
            'min',
            'max',
            // 'praisecontent:ntext',
             'praisenumber',
             'chance',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
