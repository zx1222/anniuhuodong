<?php
use app\modules\ejiaotiebiaoqian\Asset;
use yii\helpers\Url;

$this->render('/layouts/_jsapi-share');
?>
<div class="container home">
    <input class="myLabels" type="hidden" value="<?= $labels ?>" name="myLabels">
    <!--封皮-->
    <div class="cover">
        <img src="<?= Asset::getAssetUrl('images/home-header.png') ?>">
        <img class="door-l" src="<?= Asset::getAssetUrl('images/home-door-l.jpg') ?>">
        <img class="door-r" src="<?= Asset::getAssetUrl('images/home-door-r.jpg') ?>">
        <img class="board" src="<?= Asset::getAssetUrl('images/home-board.png') ?>">
        <img class="slogan" src="<?= Asset::getAssetUrl('images/home-slogan.png') ?>">
        <img class="door-dialogue1 fadeInLeft" src="<?= Asset::getAssetUrl('images/door-dialogue1.png') ?>">
        <img class="door-dialogue2 fadeInRight" src="<?= Asset::getAssetUrl('images/door-dialogue2.png') ?>">
        <a class="start"><img src="<?= Asset::getAssetUrl('images/btn-start.png') ?>"></a>
    </div>
    <!--规则-->
    <div class="regulation" style="display: none">
        <img src="<?= Asset::getAssetUrl('images/shade-regulation1.png') ?>">
        <img class="btn-know" src="<?= Asset::getAssetUrl('images/btn-know.png') ?>">
    </div>
    <!--对话-->
    <div class="dialogues">
        <a href="#" class="icon-harem"><img src="<?= Asset::getAssetUrl('images/icon-harem.png') ?>"></a>
        <img class="dialogues1" src="<?= Asset::getAssetUrl('images/dialogue1.png') ?>">
        <img class="dialogues2" src="<?= Asset::getAssetUrl('images/dialogue2.png') ?>">
        <img class="dialogues3" src="<?= Asset::getAssetUrl('images/dialogue3.png') ?>">
    </div>
    <!--标签-->
    <div class="tags">
        <a href="<?= Url::to(['harem']) ?>" class="icon-harem"><img
                    src="<?= Asset::getAssetUrl('images/icon-harem.png') ?>"></a>
        <img class="text-select" src="<?= Asset::getAssetUrl('images/text-select.png') ?>">
        <div class="content">
            <?php foreach ($dataProvider as $k => $v): ?>
                <span class="tag" data-key="<?= $v->id ?>"><?= $v->labels ?></span>
            <?php endforeach; ?>
        </div>

        <form action="<?= Url::toRoute(['default/create']); ?>" method="post" onsubmit="return checkTags();">
            <input class="hiddenField" type="hidden" value="" name="labels">
            <input class="submit-tags" type="submit">
        </form>
        <img class="btn-chosen" src="<?= Asset::getAssetUrl('images/btn-chosen.png') ?>"
             data-door1="<?= Asset::getAssetUrl('images/home-door-l2.jpg') ?>"
             data-door2="<?= Asset::getAssetUrl('images/home-door-r2.jpg') ?>">
        <div class="shade" style="display: none">
            <img src="<?= Asset::getAssetUrl('images/shade-beforeSelect.png') ?>">
            <img class="btn-go" src="<?= Asset::getAssetUrl('images/btn-go.png') ?>">
        </div>
    </div>
</div>
