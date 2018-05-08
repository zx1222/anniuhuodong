<?php
use app\modules\anniuchongyang\Asset;
use yii\helpers\Url;
$url = Url::home();
$this->render('/layouts/_jsapi-share');
?>
<input type="hidden" value="<?= $url.$this->context->module->id;?>" id="data-module">
<input type="hidden" value="<?= Asset::getAssetUrl('images/icon-select.png') ?>" id="data-select">
<input type="hidden" value="<?= Asset::getAssetUrl('images/icon-option.png') ?>" id="data-marquee">
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="cover swiper-slide">
            <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
            <img src="<?= Asset::getAssetUrl('images/p1-01.png') ?>">
            <img src="<?= Asset::getAssetUrl('images/p1-02.png') ?>">
            <img src="<?= Asset::getAssetUrl('images/p1-03.png') ?>">
            <img src="<?= Asset::getAssetUrl('images/p1-04.png') ?>">
            <img src="<?= Asset::getAssetUrl('images/p1-05.png') ?>">
            <img class="btn-start twinkle" src="<?= Asset::getAssetUrl('images/p1-06.png') ?>">
            <img src="<?= Asset::getAssetUrl('images/p1-07.png') ?>">
            <img class="shade-regulation fadeIn" src="<?= Asset::getAssetUrl('images/shade-regulation.png') ?>">
            <img class="btn-know" src="<?= Asset::getAssetUrl('images/btn-start.png') ?>">
        </div>
        <div class="questions swiper-slide">
            <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
            <div class="questionIndex">(<span>壹</span>)</div>
            <div class="question-content">

            </div>
            <!--没有抽奖机会遮罩-->
            <div class="shade-noChance shade" style="display: none">
                <img class="btn-tryAgain" src="<?= Asset::getAssetUrl('images/btn-tryAgain.png') ?>">
            </div>
            <!--过当前关卡遮罩-->
            <div class="shade-passOne shade" style="display: none">
                <p><b>顺利赢得</b></p>
                <p><b><span class="lotteryCount"></span>次抽奖机会</b></p>
                <img class="btn-continuePlay" src="<?= Asset::getAssetUrl('images/btn-continuePlay.png') ?>">
            </div>
            <!--答错但是有抽奖机会-->
            <div class="shade-hasChance shade" style="display: none">
                <a href="<?= Url::to(['lottery'])?>"><img src="<?= Asset::getAssetUrl('images/btn-toDraw.png') ?>"></a>
            </div>
            <!--全部通关-->
            <div class="shade-passAll shade" style="display: none;">
                <a href="<?= Url::to(['lottery'])?>"><img src="<?= Asset::getAssetUrl('images/btn-toDraw.png') ?>"></a>
            </div>
        </div>
    </div>
</div>
