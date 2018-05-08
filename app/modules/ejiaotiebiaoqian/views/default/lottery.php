<?php
use app\modules\ejiaotiebiaoqian\Asset;
use yii\helpers\Url;

$this->render('/layouts/_jsapi-share');
?>
<div class="container lottery">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="<?= Asset::getAssetUrl('images/text-chooseCard.png') ?>">
                <div class="cards">
                    <img class="card" src="<?= Asset::getAssetUrl('images/card1.png') ?>">
                    <img class="card" src="<?= Asset::getAssetUrl('images/card2.png') ?>">
                    <img class="card" src="<?= Asset::getAssetUrl('images/card3.png') ?>">
                    <img class="card" src="<?= Asset::getAssetUrl('images/card4.png') ?>">
                    <img class="card" src="<?= Asset::getAssetUrl('images/card5.png') ?>">
                    <img class="card" src="<?= Asset::getAssetUrl('images/card6.png') ?>">
                </div>
                <div class="win" style="display: none">
                    <img src="<?= Asset::getAssetUrl('images/shade-winPrize.png') ?>">
                    <img class="btn-getPrize" src="<?= Asset::getAssetUrl('images/btn-getPrize.png') ?>">
                    <p class="prizeContent"></p>
                    <p class="prizeName"></p>
                    <img class="prizeImg">
                </div>
                <div class="noWin" style="display: none">
                    <img src="<?= Asset::getAssetUrl('images/shade-noPrize.png') ?>">
                    <img class="btn-know" src="<?= Asset::getAssetUrl('images/btn-know.png') ?>">
                </div>
            </div>
            <div class="swiper-slide">
                <img src="<?= Asset::getAssetUrl('images/text-receiveInfo.png') ?>">
                <form action="javascript:void(0)">
                    <label><b>姓名:</b></label>
                    <input type="text" name="username">
                    <label><b>联系电话:</b></label>
                    <input type="text" name="phone">
                    <label><b>收货地址:</b></label>
                    <textarea name="address"></textarea>
                    <input type="hidden" name="prize_id">
                    <input class="submit" type="submit">
                </form>
                <img class="btn-submit" src="<?= Asset::getAssetUrl('images/btn-submit.png') ?>">
            </div>
            <div class="swiper-slide">
                <img src="<?= Asset::getAssetUrl('images/text-product.png') ?>">
                <img src="<?= Asset::getAssetUrl('images/product.jpg') ?>">
                <img class="btn-shareAppMessage" src="<?= Asset::getAssetUrl('images/btn-shareAppMessage.png') ?>">
                <img class="btn-shareTimeLine" src="<?= Asset::getAssetUrl('images/btn-shareTimeLine.png') ?>">
                <img class="share-shade" style="display: none"
                     src="<?= Asset::getAssetUrl('images/shade-share_bg.png') ?>">
            </div>
        </div>
    </div>

</div>
