<?php
use app\modules\peixiaowangluo\Asset;
use yii\helpers\Url;

$url = Url::home();
$this->render('/layouts/_jsapi-share');
?>
<input type="hidden" value="<?= $url . $this->context->module->id; ?>" id="data-module">
<div class="loading">
    <img src="<?= Asset::getAssetUrl('img/loading.gif') ?>">
</div>
<div class="container" style="display: none">
    <img class="shade-swipe" src="<?= Asset::getAssetUrl('img/shade-swipe.png') ?>" style="display: none">
    <div class="home">
        <img class="logo" src="<?= Asset::getAssetUrl('img/logo.png') ?>">
        <img class="earch" src="<?= Asset::getAssetUrl('img/earth6.png') ?>">
        <img class="buildingA building" style="display: none" src="<?= Asset::getAssetUrl('img/buildingA.png') ?>">
        <img class="buildingB building scale " src="<?= Asset::getAssetUrl('img/buildingB.png') ?>">
        <img class="buildingC building" style="display: none" src="<?= Asset::getAssetUrl('img/buildingC.png') ?>">
        <img class="car" src="<?= Asset::getAssetUrl('img/car.png') ?>">
        <img class="text-pxwl" src="<?= Asset::getAssetUrl('img/text-pxwl.png') ?>">
        <img class="icon-left twinkleLeft" src="<?= Asset::getAssetUrl('img/icon-left.png') ?>">
        <img class="icon-right twinkleRight" src="<?= Asset::getAssetUrl('img/icon-right.png') ?>">
        <img class="flag-model flag" style="display: none" src="<?= Asset::getAssetUrl('img/flag-model.png') ?>">
        <img class="flag-sales flag" src="<?= Asset::getAssetUrl('img/flag-sales.png') ?>">
        <img class="flag-location flag" style="display: none" src="<?= Asset::getAssetUrl('img/flag-location.png') ?>">
    </div>

    <!--全部配销网络-->
    <div class="sales-netWork floating-window" style="display: none">
        <div class="container">
            <div class="header">
                <h2>15家配销公司</h2>
            </div>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                </div>
<!--                <div class="swiper-button-prev"></div>-->
<!--                <div class="swiper-button-next"></div>-->
            </div>
        </div>
        <img class="icon-close" src="<?= Asset::getAssetUrl('img/icon-close.png') ?>">
    </div>

    <!--查询配销区域-->
    <div class="search floating-window" style="display: none">
        <form action="javascript:void(0)">
            <div class="drop-menu">
                <div class="select"><b>选择您要查询的省份</b></div>
                <ul class="provinces" style="display: none">
                </ul>
            </div>
<!--            <input name="submit" class="submit" type="button" value="确定">-->
        </form>
        <div class="content">
        </div>
        <img class="icon-close" src="<?= Asset::getAssetUrl('img/icon-close.png') ?>">
    </div>

    <!--营销模式-->
    <div class="sales-model floating-window" style="display: none">
        <div class="container">
            <img src="<?= Asset::getAssetUrl('img/sales-model.jpg') ?>">
        </div>
        <img class="icon-close" src="<?= Asset::getAssetUrl('img/icon-close.png') ?>">
    </div>
</div>

