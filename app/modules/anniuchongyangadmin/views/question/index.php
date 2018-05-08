<?php

use yii\helpers\Html;
use app\modules\anniuchongyangadmin\widgets\GridView;
use app\modules\anniuchongyangadmin\models\QuestionModel;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\anniuchongyangadmin\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '诗词';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anniuchongyang-question-index">

    <p>
        <?= Html::a('添加诗词', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'author',
            [
                'class' => '\app\modules\anniuchongyangadmin\widgets\StatusColumn',
                'status' => QuestionModel::status(),
                'attribute' => 'question_category'
            ],
            [
                'label' => '问题',
                'format' => 'Html',
                'headerOptions' => ['width' => '100px', 'height' => '50px'],
                'value' => function ($model) {
                    return $model->question;
                }
            ],
            'choiceA',
            'choiceB',

            'right_choice',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'header' => '操作',
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
                'headerOptions' => ['width' => '150'],
            ],
        ],
    ]); ?>
</div>
