<?php
use app\modules\anniuchongyang\Asset;
use yii\helpers\Url;
$url = Url::home();
$this->render('/layouts/_jsapi-share');
?>
<input type="hidden" value="<?= $url.$this->context->module->id;?>" id="data-module">
<div class="lottery swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
            <img class="turntable" src="<?= Asset::getAssetUrl('images/turntable.png') ?>">
            <img class="turntable-icon" src="<?= Asset::getAssetUrl('images/turntable-icon.png') ?>">
            <div class="turntable-label">
                <img src="<?= Asset::getAssetUrl('images/turntable-label.png') ?>">
                <img class="btn-draw" src="<?= Asset::getAssetUrl('images/btn-draw.png') ?>">
                <!--<p class="drawCount"><b>3</b></p>-->
            </div>
            <!--中奖-->
            <div class="shade-win shade" style="display: none">
                <img class="btn-continueDraw" src="<?= Asset::getAssetUrl('images/btn-continueDraw.png') ?>">
                <!--<p><b>抽中1元红包！</b></p>-->
            </div>
            <!--没中奖-->
            <div class="shade-noWin shade" style="display: none">
                <img class="btn-continueDraw" src="<?= Asset::getAssetUrl('images/btn-continueDraw.png') ?>">
            </div>
            <!--中奖次数用完-->
            <div class="shade-chanceEnd1 shade" style="display: none">
                <img src="<?= Asset::getAssetUrl('images/shade-chanceEnd1.png') ?>">
                <img class="close" src="<?= Asset::getAssetUrl('images/icon-close.png') ?>">
            </div>
            <!--没中奖次数用完-->
            <div class="shade-chanceEnd0 shade" style="display: none">
                <img src="<?= Asset::getAssetUrl('images/shade-chanceEnd0.png') ?>">
                <img class="close" src="<?= Asset::getAssetUrl('images/icon-close.png') ?>">
            </div>
        </div>
        <div class="swiper-slide">
            <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
            <img class="btn-share" src="<?= Asset::getAssetUrl('images/btn-shareTimeline.png') ?>">
            <img class="btn-anniu" src="<?= Asset::getAssetUrl('images/btn-anniu.jpg') ?>">
            <img class="shade-share shade" src="<?= Asset::getAssetUrl('images/shade-share_bg.png') ?>" style="display: none">
            <img class="shade-anniu shade" src="<?= Asset::getAssetUrl('images/shade-anniu.png') ?>" style="display: none">
            <img class="close" src="<?= Asset::getAssetUrl('images/icon-close.png') ?>" style="display: none">
            <a href="<?= Url::to(['index'])?>"><img src="<?= Asset::getAssetUrl('images/btn-playAgain.jpg') ?>"></a>
        </div>
    </div>
</div>
