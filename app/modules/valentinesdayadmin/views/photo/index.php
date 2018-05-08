<?php


use app\modules\valentinesdayadmin\widgets\GridView;
use app\modules\valentinesdayadmin\models\Photo;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\valentinesdayadmin\models\PhotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '参赛用户';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lovers-user-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'nickname',
            'phone',
            'city',
            'vote',
            'shopname',
            [
                'class' => '\app\modules\valentinesdayadmin\widgets\StatusColumn',
                'status' => Photo::status(),
                'attribute' => 'status'
            ],
            [
                'label' => '图片',
                'format' => 'Html',
                //'headerOptions' => ['width' => '100px', 'height' => '100px'],
                'value' => function ($model) {
                    return !empty($model['photo']) ? Html::img(Yii::getAlias('@uploadsUrl/' . $model['photo']), ['width' => '100px', 'height' => '100px']) : '';
                }
            ],
            'created_at:datetime',
            'updated_at:datetime',

            [
                'header' => '操作',
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'headerOptions' => ['width' => '50'],
            ],
        ],
    ]); ?>
</div>
