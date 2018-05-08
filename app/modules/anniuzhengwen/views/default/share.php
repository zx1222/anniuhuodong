<?php
use app\modules\anniuzhengwen\Asset;
use yii\helpers\Url;
$this->render('/layouts/_jsapi-share');
?>
<div class="container">
    <div class="share">
        <img class="logo" src="<?= Asset::getAssetUrl('img/logo.png') ?>">
        <img src="<?= Asset::getAssetUrl('img/text-them.png') ?>">
        <img src="<?= Asset::getAssetUrl('img/p4_1.png') ?>">
        <img class="btn-shareTimeline" src="<?= Asset::getAssetUrl('img/btn-shareTimeline.png') ?>">
        <img class="shade-share_bg" src="<?= Asset::getAssetUrl('img/shade-share_bg.png') ?>" style="display: none">
        <a class="btn-backList" href="<?= Url::to(['index']) ?>"><img
                    src="<?= Asset::getAssetUrl('img/btn-backList.png') ?>"></a>
    </div>
</div>
