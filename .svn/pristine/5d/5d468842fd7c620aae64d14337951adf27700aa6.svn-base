<?php
use app\modules\ejiaotiebiaoqian\Asset;
use yii\helpers\Url;

$this->render('/layouts/_jsapi-share-friends',['myself'=>$myself]);
?>
<div class="container harem">
    <?php if (empty($friends)): ?>
        <div class="empty">
            <img src="<?= Asset::getAssetUrl('images/text-harem.png') ?>">
            <img src="<?= Asset::getAssetUrl('images/harem-empty.png') ?>">
            <img class="btn-invite" src="<?= Asset::getAssetUrl('images/btn-inviteFriend.png') ?>">
            <div class="invite-friend" style="display: none">
                <img src="<?= Asset::getAssetUrl('images/shade-share.png') ?>">
                <img class="btn-share" src="<?= Asset::getAssetUrl('images/btn-share.png') ?>">
            </div>
            <img class="share-shade" style="display: none" src="<?= Asset::getAssetUrl('images/shade-share_bg.png') ?>">
            <div class="opportunities" style="display: none">
                <img src="<?= Asset::getAssetUrl('images/shade-haveChance.png') ?>">
                <a href="<?= Url::to(['lottery']) ?>"><img class="btn-flipCard" src="<?= Asset::getAssetUrl('images/btn-flipCard.png') ?>"></a>
            </div>
        </div>
    <?php else: ?>
        <div class="notempty">
            <img src="<?= Asset::getAssetUrl('images/text-harem.png') ?>">
            <div class="content">
                <?php foreach ($friends as $k => $v): ?>
                    <div class="box">
                        <div class="l">
                            <img src="<?= $v['friends']['wx_avatar'] ? $v['friends']['wx_avatar'] : '' ?>">
                        </div>
                        <div class="r">
                            <h4><?= $v['friends']['wx_username'] ? $v['friends']['wx_username'] : '' ?></h4>
                            <p>猜了<?= $v['counts'] ?>次</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <img class="btn-invite" src="<?= Asset::getAssetUrl('images/btn-inviteFriend.png') ?>">
            <div class="invite-friend" style="display: none">
                <img src="<?= Asset::getAssetUrl('images/shade-share.png') ?>">
                <img class="btn-share" src="<?= Asset::getAssetUrl('images/btn-share.png') ?>">
            </div>
            <img class="share-shade" style="display: none" src="<?= Asset::getAssetUrl('images/shade-share_bg.png') ?>">
            <div class="opportunities" style="display: none">
                <img src="<?= Asset::getAssetUrl('images/shade-haveChance.png') ?>">
                <a href="<?= Url::to(['lottery']) ?>"><img class="btn-flipCard"
                                                           src="<?= Asset::getAssetUrl('images/btn-flipCard.png') ?>"></a>
            </div>
        </div>
    <?php endif; ?>
</div>
