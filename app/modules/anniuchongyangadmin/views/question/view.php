<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\anniuchongyangadmin\models\AnniuchongyangQuestion */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '诗词', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anniuchongyang-question-view">

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
            [
                'value' => "<span class='label " . $result['htmlClass'] . "'>" . $result['name'] . "</span>",
                'attribute' => 'question_category',
                'format' => 'html',
            ],

            [
                'attribute' => 'question',
                'label' => '问题',
                'format' => 'raw',
                'value' => $model->question,
            ],
            'choiceA',
            'choiceB',

            'right_choice',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
