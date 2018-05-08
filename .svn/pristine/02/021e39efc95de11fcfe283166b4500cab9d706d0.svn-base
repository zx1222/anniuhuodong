<?php
use app\modules\fathersday\Asset;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;

$this->render('/layouts/_jsapi-disabled');

$ajaxUrl = Url::to(['lottery-run'], true);
$js = <<<JS


$(function() {
    $("#duang").click(function() {
        $(this).unbind('click').css("cursor", "default");
        lottery();
    });
});
 function lottery() {
 var csrfToken = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        type: 'POST',
        url: '{$ajaxUrl}',
        dataType: 'json',
         data: { _csrf : csrfToken},
        cache: false,
        error: function() {
            alert('Sorry，出错了！');
            return false;
        },
        success: function(json) {
            var angle = json.angle; //指针角度
            var prize = json.praisename; //中奖奖项标题
            var id = json.id; //中奖奖项标题
            $("#zhuanpan").rotate({
                duration: 3000,//转动时间 ms
                angle: -30, //从0度开始
                animateTo: 3600 - angle,//转动角度
                easing: $.easing.easeOutSine, //easing扩展动画效果
                callback: function() {
                    if(id == 6){
                        $(".page32-prize-no").delay('slow').fadeIn( 'fast' );
                    }else {
                        $(".page32-prize-ok").delay('slow').fadeIn( 'fast' );
                    }
                }
            });
        }
    });
 }

JS;
$this->registerJs($js)
?>
<div class="wrapper-turntable1 wrapper-main">
    <div class="page32 page">
        <div class="title-cloud bg-post">
            <!-- 右上角三块小云 -->
        </div>
        <div class="fish bg-post">
            <!-- 右上角鱼 -->
        </div>
        <div class="leaf-first bg-post">
            <!-- 左边树叶 -->
        </div>
        <div class="upload-aircraft bg-post">
            <!-- 飞机 -->
        </div>
        <div class="turntable-main bg-post">

            <?= Html::img(Asset::getAssetUrl('images/turntable-btn1.png'), ['class' => 'turntable-btn bg-post', 'id' => 'zhuanpan']) ?>
            <?= Html::img(Asset::getAssetUrl('images/turntable-ico.png'), ['class' => 'turntable-ico bg-post', 'id' => 'duang']) ?>
        </div>

        <div class="page32-prize page-inner page32-prize-ok" style="display: none;">

            <?= Html::img(Asset::getAssetUrl('images/prize-ok.png'), ['class' => 'page32-prize-img', 'alt' => '']) ?>
            <?= Html::img(Asset::getAssetUrl('images/page15-help-close.jpg'), ['class' => 'page32-prize-close', 'alt' => '']) ?>

        </div>


        <div class="page32-prize page-inner page32-prize-no" style="display: none;">

            <?= Html::img(Asset::getAssetUrl('images/prize-no.png'), ['class' => 'page32-prize-img', 'alt' => '']) ?>
            <?= Html::img(Asset::getAssetUrl('images/page15-help-close.jpg'), ['class' => 'page32-prize-close', 'alt' => '']) ?>
        </div>

        <?php if ($forbidden): ?>
            <!-- 抽奖次数用完 -->
            <div class="page31-no page-inner" style="">

                <?= Html::img(Asset::getAssetUrl('images/page31-no-img.png'), ['class' => 'page31-no-img', 'alt' => '']) ?>
                <?= Html::img(Asset::getAssetUrl('images/page15-help-close.png'), ['class' => 'page31-no-ico', 'alt' => '']) ?>

            </div>
        <?php endif; ?>

    </div>
    <div class="page41 page">
        <div class="page41-center bg-post">
            <!-- 中心内容 -->
        </div>
        <div class="page41-title bg-post">
            <!-- 标题 -->
        </div>
        <div class="leaf-first bg-post">
            <!-- 左侧树叶 -->
        </div>
        <div class="leaf-last bg-post">
            <!-- 右侧树叶 -->
        </div>
        <div class="aircraft bg-post">
            <!--  左 边飞机 -->
        </div>
        <div class="page41-btn-1 bg-post">
            <!-- 底部按钮 -->
            <?= Html::a('', 'http://app7.sindcorp.net/', ['class' => 'a-btn']) ?>
        </div>
        <div class="page41-btn-2 bg-post">
            <?= Html::a('', ['/fathersday/default/exhibition'], ['class' => 'a-btn']) ?>
            <!-- 底部按钮 -->
        </div>
        <div class="page41-btn-3 bg-post">
            <!-- 底部按钮 -->
        </div>
        <div class="page41-code page-inner" style="">
            <?= Html::img(Asset::getAssetUrl('images/page41-code.png'), ['class' => 'page41-code-img', 'alt' => '']) ?>
            <?= Html::img(Asset::getAssetUrl('images/page15-help-close.jpg'), ['class' => 'page41-code-close', 'alt' => '']) ?>

        </div>
    </div>
</div>
