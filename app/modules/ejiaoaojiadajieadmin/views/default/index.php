<?php

use yii\helpers\Html;
use app\modules\ejiaoaojiadajieadmin\widgets\GridView;
use app\modules\ejiaoaojiadajieadmin\models\EjiaoaojiadajiePhoto;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '熬胶大姐活动';
?>
<div class="content ">
    <div class="form-horizontal spotlights-slice-index">
        <p>
            <?= Html::a(' 添 加 ', ['create'], ['class' => 'btn btn-primary']) ?>
        </p>
        
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'username',
            'age',
            'address',
            'vote',
            'created_at',
            [
              'label' => '图片',
                'format' => 'Html',
               'headerOptions' => ['width' => '100px','height'=>'100px'],
               'value' => function($model){
                   return Html::img(Yii::getAlias('@uploadsUrl/ejiaodajie/'.$model->old_photo),['width' => '100px','height'=>'100px']);
               }
            ],
            [
                'label' => '海报',
                'format' => 'Html',
                'headerOptions' => ['width' => '150px','height'=>'150px'],
                'value' => function($model){
                    return Html::img(Yii::getAlias('@uploadsUrl/ejiaodajie/'.$model->new_photo),['width' => '150px','height'=>'150px']);
                }
            ],
            [
                'header'=>'操作',
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
                'headerOptions' => ['width' => '50'],
            ],
        ],
    ]); ?>
    </div>
           
</div>
