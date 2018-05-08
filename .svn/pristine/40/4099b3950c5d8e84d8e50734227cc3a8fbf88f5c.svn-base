<?php
use app\modules\fathersday\Asset;
use yii\helpers\Html;
use app\modules\fathersday\BL\ChallengerStatusTransfer;

$this->render('/layouts/_jsapi-share',['model'=>$photoModel]);
$uploadPathHash = substr(strtolower(md5($photoModel->openid)), 0, 2);
$uploadPathT = '@uploadsUrl/' . 't/' . $uploadPathHash . '/';
?>
<div class="wrapper-share wrapper-main">
    <div class="page21 page">

        <div class="title-cloud bg-post">
            <!-- 右上角三块小云 -->
        </div>
        <div class="fish bg-post">
            <!-- 右上角鱼 -->
        </div>
        <div class="upload-aircraft bg-post">
            <!-- 飞机 -->
        </div>
        <div class="page21-title bg-post">
            <!-- 标题 -->
        </div>
        <div class="page21-photo-1  bg-post photo-main-1 photo-main">
            <?= Html::img(Yii::getAlias($uploadPathT . $photoModel->old_photo), ['class' => 'page21-photo', 'alt' => '']) ?>
            <div class="bg-post photo-border"></div>
        </div>
        <div class="page21-photo-2  bg-post photo-main-1 photo-main">
            <?= Html::img(Yii::getAlias($uploadPathT . $photoModel->new_photo), ['class' => 'page21-photo', 'alt' => '']) ?>
            <div class="bg-post photo-border"></div>
        </div>
        <div class="page21-text bg-post">
            <p class="page21-p1"><?= $photoModel->desc; ?></p>

            <p class="page21-p2">选手编号：<span><?= $photoModel->id; ?></span></p>

            <p class="page21-p3">目前票数：<span><?= $photoModel->vote; ?></span></p>
        </div>
        <div class="page21-adopt-text bg-post">
            <?php if ($photoModel->status == 'approved'): ?>
                <?= Html::img(Asset::getAssetUrl('images/page21-adopt-text.png'), ['class' => 'page21-adopt-main', 'alt' => '']) ?>
            <?php elseif ($photoModel->status == 'pending'): ?>
                <?= Html::img(Asset::getAssetUrl('images/page21-adopt-no-text.png'), ['class' => 'page21-adopt-no-main', 'alt' => '']) ?>
            <?php else: ?>
                <?= Html::img(Asset::getAssetUrl('images/page21-adopt-no-text.png'), ['class' => 'page21-adopt-no-main', 'alt' => '']) ?>
            <?php endif; ?>

        </div>
        <?php if ($photoModel->status == 'approved'): ?>
            <?php if (ChallengerStatusTransfer::allowLottery() == false) : ?>
                <div class="page21-adopt bg-post page21-adopt-main">
                    <?= Html::a('', ['/fathersday/default/lottery-challenger'], ['class' => 'a-btn']) ?>
                    <!--                    去抽奖-->
                </div>
            <?php endif; ?>


            <div class="page21-btn bg-post">
                <!-- 召唤亲友团 -->
            </div>
        <?php endif; ?>

        <?php if ($photoModel->status == 'refused'): ?>

            <div class="page21-no-adopt bg-post page21-adopt-no-main">
                <!--                  重新上传-->
                <?= Html::a('', ['/fathersday/default/campaign', 'op' => 'renew'], ['class' => 'a-btn']) ?>
            </div>
        <?php endif; ?>


        <div class="page11-understand bg-post">
            <?= Html::a('', ['/fathersday/default/exhibition'], ['class' => 'a-btn']) ?>
            <!-- 看看他人照片按钮 -->
        </div>
        <div class="share-mask bg-post" style="background-color: rgba(0, 0, 0, .68);width: 100%;height: 100%;z-index: 9999;display: none">
            <!--  分享遮罩层 -->
            <?= Html::img(Asset::getAssetUrl('images/share-mask.png'), ['id' => '', 'alt' => '', 'style' => 'width:100%']) ?>
        </div>
    </div>


</div>