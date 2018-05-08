<?php
use app\modules\anniuzhengwen\Asset;
use yii\helpers\Url;

$this->render('/layouts/_jsapi-share');
?>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img class="logo" src="<?= Asset::getAssetUrl('img/logo.png') ?>">
            <img class="text-them" src="<?= Asset::getAssetUrl('img/text-them.png') ?>">
            <img src="<?= Asset::getAssetUrl('img/p1_1.png') ?>">
            <img src="<?= Asset::getAssetUrl('img/p1_2.png') ?>">
            <img src="<?= Asset::getAssetUrl('img/p1_3.png') ?>">
            <img class="slideLoop" src="<?= Asset::getAssetUrl('img/p1_4.png') ?>">
            <img class="regulation fadeIn" src="<?= Asset::getAssetUrl('img/shade-regulation.png') ?>">
            <img class="btn-know fadeIn" src="<?= Asset::getAssetUrl('img/btn-know.png') ?>">

        </div>
        <div class="swiper-slide">
            <img class="logo" src="<?= Asset::getAssetUrl('img/logo.png') ?>">
            <img class="twinkle" src="<?= Asset::getAssetUrl('img/p2_4.png') ?>">
            <div class="content">
                <?php foreach ($data as $k => $v): ?>
                    <div class="box">
                        <span class="r text-darkBrown">目前票数:<?= $v->vote ?>票</span>
                        <a href="<?= Url::to(['article', 'id' => $v->id]) ?>">
                            <span class="l text-brown"><?= $v->id < 10 ? '0' . $v->id : $v->id ?>号</span>
                            <span
                                    class="title"><?= $v->title ?></span></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

