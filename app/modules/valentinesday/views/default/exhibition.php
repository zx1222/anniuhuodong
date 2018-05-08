<?php
use app\modules\valentinesday\Asset;
use yii\widgets\ListView;
use yii\helpers\Url;

$this->render('/layouts/_jsapi-disabled');
?>
<div class="exhibition-container">
    <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
    <div class="contentWrapper">
        <form action="<?= Url::canonical() ?>" method="get">
            <input type="text" class="form-control" placeholder="搜索选手编号" name="no">
            <button class="btn btn-default btn-search" type="submit">
               <img class="search" src="<?= Asset::getAssetUrl('images/icon-search.png') ?>">
            </button>
        </form>
        <div class="content">
            <?php
            echo ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_item',
                'summary' => '',
                'itemOptions' => ['class' => 'photo-box'],
            ]);
            ?>
        </div>
    </div>
    <div class="shade-vote-success shade" style="display:none">
        <img class="logo" src="<?= Asset::getAssetUrl('images/shade-vote-success.png') ?>">

        <a href="http://mp.weixin.qq.com/s?__biz=MzIzNTA1MzMwOA==&mid=534926917&idx=1&sn=8ae8e49ac8ed01fecea5c6361cf985ca&chksm=72fbffd6458c76c0d309c822f419294c71e9ab605a4f28f9fd67de787feb23516a1bb2ac0010&mpshare=1&scene=1&srcid=0824B1S4huVFIZ5nK4IUF3yn#rd">
            <img class="btn-ejiao" src="<?= Asset::getAssetUrl('images/btn-ejiao.png') ?>">

        </a>
        <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">


    </div>
    <div class="shade-voteonly1 shade" style="display:none">
        <img src="<?= Asset::getAssetUrl('images/shade-voteonly1.png') ?>">
        <a href="http://mp.weixin.qq.com/s?__biz=MzIzNTA1MzMwOA==&mid=534926917&idx=1&sn=8ae8e49ac8ed01fecea5c6361cf985ca&chksm=72fbffd6458c76c0d309c822f419294c71e9ab605a4f28f9fd67de787feb23516a1bb2ac0010&mpshare=1&scene=1&srcid=0824B1S4huVFIZ5nK4IUF3yn#rd">
            <img class="btn-ejiao" src="<?= Asset::getAssetUrl('images/btn-ejiao.png') ?>">
        </a>
        <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">

    </div>
</div>

