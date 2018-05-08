<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\valentinesdayadmin\models\Photo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '参赛用户', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lovers-user-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nickname',
            'phone',
            'photo',
            'city',
            'shopname',
            'declaration:ntext',
            [
                'value' => "<span class='label " . $result['htmlClass'] . "'>" . $result['name'] . "</span>",
                'attribute' => 'status',
                'format' => 'html',
            ],
            'created_at:datetime',
            'updated_at:datatime',
        ],
    ]) ?>

</div>
