<?php

use yii\helpers\Html;
use app\modules\anniuzhengwenadmin\widgets\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\anniuzhengwenadmin\models\AnniuzhengwenArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '安牛征文';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anniuzhengwen-article-index">


    <p>
        <?= Html::a('添加文章', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'title',
            'author',
            [
                'label' => '文章详情',
                'format' => 'Html',
                'headerOptions' => ['width' => '100px','height'=>'100px'],
                'value' => function($model){
                    return Html::img(Yii::getAlias('@uploadsUrl/anniuzhengwen/'.$model->content),['width' => '100px','height'=>'100px']);
                }
            ],
            'vote',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'header' => '操作',
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}{view}',
                'headerOptions' => ['width' => '150'],
            ],
        ],
    ]); ?>
</div>
