<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\anniuzhengwenadmin\models\AnniuzhengwenArticle */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '安牛征文', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anniuzhengwen-article-view">

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'author',
            [

                'attribute' => 'content',
                'label' => '文章详情',
                'format' => 'raw',
                'value' =>Html::img(Yii::getAlias('@uploadsUrl/anniuzhengwen/'.$model->content)),
            ],
            'vote',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
