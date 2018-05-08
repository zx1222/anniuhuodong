<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\fathersday\models\PhotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Photos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            ['label' => '用户',
                'format' => 'html',
                'value' => function ($model) {

                    return Html::tag('p',$model->weixinUser->wx_username).Html::img($model->weixinUser->wx_avatar, ['width' => '46']);
                }
            ],

            [
                'attribute' => 'new_photo',
                'format' => 'html',
                'value' => function ($model) {
                    $uploadPathHash = substr(strtolower(md5($model->openid)), 0, 2);
                    Yii::setAlias('@uploadsUrl', 'http://anniu0616img.sindcorp.net');
                    $uploadPathT = '@uploadsUrl/' . 't/' . $uploadPathHash . '/';
                    return Html::img(Yii::getAlias($uploadPathT . $model->old_photo), ['width' => '150']) . Html::img(Yii::getAlias($uploadPathT . $model->new_photo), ['width' => '150']);
                }
            ],
            'desc',
            'prize_status',
            'prize_pid',
            'lukey_at',
            'created_at',
            'status',
            'vote',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} '
            ],
        ],
    ]); ?>
</div>
