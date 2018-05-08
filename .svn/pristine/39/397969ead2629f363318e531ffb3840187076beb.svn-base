<?php
use app\modules\valentinesday\Asset;
use yii\helpers\Url;

$this->title = '七夕情人节';
$this->render('/layouts/_jsapi-disabled');
?>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
            <img src="<?= Asset::getAssetUrl('images/p1-clould01.png') ?>">
            <img src="<?= Asset::getAssetUrl('images/p1-clould02.png') ?>">
            <img src="<?= Asset::getAssetUrl('images/p1-02.png') ?>">
            
            <img src="<?= Asset::getAssetUrl('images/icon-down.png') ?>">
        </div>
        <div class="swiper-slide  swiper-no-swiping ">
            <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
            <!--按钮-->
            <img class="btn-regulation" src="<?= Asset::getAssetUrl('images/btn-regulation.png') ?>">
            <a class="link-exhibition" href="<?= Url::toRoute(['default/exhibition']) ?>"><img class="btn-all"
                                                                                               src="<?= Asset::getAssetUrl('images/btn-all.png') ?>"></a>
            <img class="btn-join" src="<?= Asset::getAssetUrl('images/btn-join.png') ?>">

            <!--遮罩-->
            <div class="shade-regulation shade" style="display:none">
                <img src="<?= Asset::getAssetUrl('images/shade-regulation.png') ?>">
                <img class="btn-back" src="<?= Asset::getAssetUrl('images/btn-back.png') ?>">
            </div>
        </div>
        <!--上传照片页-->
        <div class="swiper-slide">

            <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
            <?php if ($model == null): ?>
                <!--还未上传-->
                <div class="upload-before">
                    <div id="uploader">
                        <!--用来存放item-->
                        <div id="hideField" style="display: none"></div>
                        <div id="fileList" class="uploader-list"></div>
                        <div id="filePicker"><img src="<?= Asset::getAssetUrl('images/icon-add.png') ?>"
                                                  class="addPhoto">
                        </div>
                    </div>
                    <form action="<?= Url::canonical() ?>" method="post">
                        <input class="nickname" type="text" placeholder="昵       称" name="nickname">
                        <input class="phone" type="text" placeholder="联系方式" name="phone">
                        <input class="city" type="text" placeholder="所在城市" name="city">
                        <input class="substore" type="text" placeholder="分店名称" name="shopname">
                        <textarea class="manifesto" placeholder="我的宣言" name="declaration"></textarea>
                        <img class="btn-submit" src="<?= Asset::getAssetUrl('images/btn-upload.png') ?>">
                    </form>

                    <input type="hidden" data-url="<?= \yii\helpers\Url::to(['/valentinesday/default/exhibition']) ?>"
                           id="exhibition">
                    <input type="hidden" data-url="<?= \yii\helpers\Url::to(['/valentinesday/default/base']) ?>"
                           id="upload">
                    <input type="hidden" data-url="<?= \yii\helpers\Url::to(['/valentinesday/default/create']) ?>"
                           id="form">
                    <!--上传成功待审核提示-->
                    <div class="shade-audit shade" style="display:none">
                        <img src="<?= Asset::getAssetUrl('images/shade-audit.png') ?>">
                        <a class="link-confirm" href="">
                            <img class="btn-confirm" src="<?= Asset::getAssetUrl('images/btn-confirm.png') ?>">
                        </a>
                    </div>
                </div>

            <?php endif; ?>

        </div>

    </div>
</div>

<?php
if ($model == null){


$js = <<<EOF
 $('.btn-join').on('click', function () {
        $('.swiper-wrapper .swiper-slide:nth-of-type(2)').removeClass('swiper-no-swiping');
        mySwiper.slideTo(2, 500, false);
    })
EOF;
}else {
    $url=Url::toRoute(['default/photo', 'id' => $model->id]) ;
    $js = <<<EOF
 $('.btn-join').on('click', function () {
        window.location.href = '{$url}';
    })
EOF;
}
$this->registerJs($js);


?>
