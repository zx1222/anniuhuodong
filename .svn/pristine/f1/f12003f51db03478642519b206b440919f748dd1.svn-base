<?php
use app\modules\anniuzhengwen\Asset;
use yii\helpers\Url;

$this->render('/layouts/_jsapi-share');
?>
<div class="container">
    <div class="article">
        <img class="fadeIn rem" src="<?= Asset::getAssetUrl('img/shade-rem.png') ?>">
        <div class="num">故事<?= $model->id < 10 ? '0' . $model->id : $model->id ?></div>
        <h4 class="text-darkBrown title"><?= $model->title ?></h4>
        <p class="author text-darkBrown"><b>作者_ </b><?= $model->author ?></p>
        <div class="content">
            <img src="<?= Yii::getAlias('@uploadsUrl/anniuzhengwen/' . $model->content) ?>">
        </div>
        <p class="text-darkBrown currentPoll"><b>当前得票:<?= $model->vote ?>票</b></p>
        <a class="btn-back" href="<?= Url::to(['index']) ?>"><img
                    src="<?= Asset::getAssetUrl('img/btn-back.png') ?>"></a>
        <img class="btn-vote" src="<?= Asset::getAssetUrl('img/btn-vote.png') ?>">
        <div class="shade-success shade fadeIn" style="display: none">
            <img src="<?= Asset::getAssetUrl('img/shade-success.png') ?>">
            <a class="close" href="<?= Url::to(['index']) ?>"><img class="close" src="<?= Asset::getAssetUrl('img/icon-close.png') ?>"></a>
        </div>
        <div class="shade-fail shade fadeIn" style="display: none">
            <img src="<?= Asset::getAssetUrl('img/shade-fail.png') ?>">
            <a class="close" href="<?= Url::to(['share'])?>"><img src="<?= Asset::getAssetUrl('img/icon-close.png') ?>"></a>
        </div>
        <input type="hidden" value="<?= !empty($model->id) ? $url = Url::toRoute(['default/vote', 'id' => $model->id], true) : $url = ''?>" id="url">


    </div>
</div>
