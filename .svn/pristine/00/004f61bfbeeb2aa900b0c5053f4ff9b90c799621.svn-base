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

    <p>
        <?= Html::a('Create Weixin User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'label' => '头像',
                'content' => function ($model) {
                    return $model->wx_avatar ? Html::img(str_replace('/0', '/64', $model->wx_avatar), ['width' => 64]) : "";
                },
                'options' => ['width' => '70']
            ],
            [
                'label' => '用户',
                'content' => function ($model) {
                    return Html::tag('div', ($model->wx_subscribe == 1 ? '【粉】' : '') . ($model->wx_sex == 0 ? '【其他】' : ($model->wx_sex == 1 ? '【男】' : '【女】')) . $model->wx_username) . Html::tag('div', $model->openid);
                },
                'options' => ['width' => '250']

            ],

            [
                'label' => '地区',
                'content' => function ($model) {
                    return Html::tag('div', $model->wx_country . '-' . $model->wx_province . '-' . $model->wx_city) . Html::tag('div', $model->ip);
                },
                'options' => ['width' => '200']

            ],

            [
                'label' => '内容',
                'content' => function ($model) {
                    $content = json_decode($model->extra, true);
                    $res = Html::beginTag('ol');
                    if (is_array($content)) {

                        foreach ($content as $text) {

                            $res .= Html::tag('li',$text);
                        }
                    }
                    $res .= Html::endTag('ol');

                    return $res;
                }
            ],


        ],
    ]); ?>
</div>
