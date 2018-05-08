<?php

use yii\helpers\Html;
use app\modules\ejiaoaojiadajieadmin\widgets\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianConfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '奖品';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejiaotiebiaoqian-config-index">

    <p>
        <?= Html::a('添加奖项', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'praisename',
            'praisecontent',

            [
                'label' => '奖品图',
                'format' => 'Html',
                'headerOptions' => ['width' => '100px', 'height' => '100px'],
                'value' => function ($model) {
                    return Html::img(Yii::getAlias('@uploadsUrl/ejiaotiebiaoqian/' . $model->praiseimage),['width' => '100px', 'height' => '100px']);
                }
            ],
            'praisenumber',
            'chance',

            [
                'header' => '操作',
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
                'headerOptions' => ['width' => '50'],
            ],
        ],
    ]); ?>
</div>
