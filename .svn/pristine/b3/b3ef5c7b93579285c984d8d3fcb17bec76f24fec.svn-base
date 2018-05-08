<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianConfig */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '奖项', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejiaotiebiaoqian-config-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'praisename',
            'praisecontent',
            'praisenumber',
            [
                'label' => '奖品图片',
                'format' => 'Html',
                'headerOptions' => ['width' => '100px', 'height' => '100px'],
                'value' => function ($img) {
                    return $img->praiseimage ? Html::img(Yii::getAlias('@uploadsUrl/ejiaotiebiaoqian/' . $img->praiseimage)) : '';
                }
            ],
            'chance',
        ],
    ]) ?>

</div>
