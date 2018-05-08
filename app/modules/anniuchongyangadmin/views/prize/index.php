<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\chongqingadmin\models\Prize;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '中奖名单';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-index">

    <p>
        <?= Html::a('返回主页', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'wx_username',
                'label' => '昵称',
                'filter' => Html::activeTextInput($searchModel, 'wx_username', ['class' => 'form-control', 'placeholder' => '搜索昵称']),
                'value' => 'user.wx_username',
            ],
            [
                'attribute' => 'config.praisename',
                'label' => '奖项',
            ],
            'created_at:datetime',
            [
                'format' => 'raw',
                'attribute' => 'status',
                'label' => '状态',
                'filter' => Html::activeDropDownList($searchModel, 'status', Prize::getStatus(), ['class' => 'form-control']),
                'value' => function ($model) {
                    return ($model['status'] == 1) ? Html::a(Prize::getStatus()[$model['status']], ['update', 'id' => $model->pid], [
                        'class' => 'btn btn-success',
                        'data' => [
                            'confirm' => '确定已发放?',
                            'method' => 'post',
                        ],
                    ]) : '';
                },
            ]
        ],
    ]);
    ?>
</div>
