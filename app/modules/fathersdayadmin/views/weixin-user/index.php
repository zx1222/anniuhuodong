<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Weixin Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weixin-user-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'openid',
            'wx_username',
            'wx_sex',
            'wx_country',
            'wx_province',
             'wx_city',
            // 'wx_avatar:ntext',
             'wx_subscribe',
            // 'wx_access_token:ntext',
            // 'wx_expires',
            // 'ip',
             'created_at',
             'realname',
             'mobile',
             'address',
             'd1_status',
             'd1_pid',
             'd2_status',
             'd2_pid',
             'd3_status',
             'd3_pid',
             'd4_status',
             'd4_pid',
             'd5_status',
             'd5_pid',
             'd6_status',
             'd6_pid',
             'd7_status',
             'd7_pid',

        ],
    ]); ?>
</div>
