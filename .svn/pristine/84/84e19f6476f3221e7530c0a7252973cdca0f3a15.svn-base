<?php
use app\modules\ejiaotiebiaoqian\Asset;

use yii\helpers\Url;

$this->render('/layouts/_jsapi-share');
?>
<div class="container share">
    <input class="myLabels" type="hidden" value="<?= $labels ?>" name="myLabels">
    <input type="hidden" name="myself" value="<?= base64_encode($myself) ?>">
    <!--封皮-->
    <div class="cover">
        <img src="<?= Asset::getAssetUrl('images/home-header.png') ?>">
        <img class="door-l" src="<?= Asset::getAssetUrl('images/home-door-l.jpg') ?>">
        <img class="door-r" src="<?= Asset::getAssetUrl('images/home-door-r.jpg') ?>">
        <img class="board" src="<?= Asset::getAssetUrl('images/home-board.png') ?>">
        <img class="slogan" src="<?= Asset::getAssetUrl('images/home-slogan.png') ?>">
        <a class="start"><img src="<?= Asset::getAssetUrl('images/btn-start.png') ?>"></a>
    </div>
    <!--规则-->
    <div class="regulation">
        <img src="<?= Asset::getAssetUrl('images/shade-regulation2.png') ?>">
        <img class="btn-know" src="<?= Asset::getAssetUrl('images/btn-startGame.png') ?>">
    </div>

    <!--标签-->
    <div class="tags">
        <img class="text-select" src="<?= Asset::getAssetUrl('images/text-guessSelect.png') ?>">
        <div class="content">
            <?php foreach ($dataProvider as $k => $v): ?>
                <span class="tag" data-key="<?= $v->id ?>"><?= $v->labels ?></span>
            <?php endforeach; ?>
        </div>

        <form action="javascript:void(0)">
            <input class="hiddenField" type="hidden" value="">
            <input class="submit-tags" type="submit">
        </form>
        <img class="btn-chosen" src="<?= Asset::getAssetUrl('images/btn-chosen.png') ?>">

        <div class="right" style="display: none">
            <img src="<?= Asset::getAssetUrl('images/shade-selectedRight.png') ?>">
            <a class="btn-flipCard" href="<?= Url::to(['default/lottery']) ?>"><img
                        src="<?= Asset::getAssetUrl('images/btn-flipCard.png') ?>"></a>
        </div>
        <div class="wrong" style="display: none">
            <img src="<?= Asset::getAssetUrl('images/shade-reSelect.png') ?>">
            <img class="btn-rePlay" src="<?= Asset::getAssetUrl('images/btn-rePlay.png') ?>">
            <a class="btn-buildHarem" href="<?= Url::to(['default/index']) ?>"><img
                        src="<?= Asset::getAssetUrl('images/btn-buildHarem.png') ?>"></a>
        </div>
        <a class="btn-buildHarem" style="display: none;" href="<?= Url::to(['default/index']) ?>"><img
                    src="<?= Asset::getAssetUrl('images/btn-buildHarem.png') ?>"></a>
    </div>
</div>
