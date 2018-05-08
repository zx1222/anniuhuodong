<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 16/5/5
 * Time: 下午10:34
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use app\modules\anniuyuandan\Asset;
use yii\widgets\ActiveForm;

$this->render('/layouts/_jsapi-share');
$ajaxUrl = Url::to(['lottery-run'], true);

$assetsUrl = Asset::getAssetUrl('images');
$imgUrl = Url::to('@web/img', true);
$this->title = '跨年大礼 | 北京同仁堂安宫牛黄丸';
$js = <<<JS

JS;
$this->registerJs($js);

unset($js);
$js = <<<JS


$(".egg").click(function() {
    $(this).unbind('click').css("cursor", "default");
    $('.page1').hide();
    $(".page2").addClass("award-animation");
    lottery();
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
            var id = json.id; //中奖奖项标题
                    if(id == 2){
                        $('.award-1').show();
                        $('.receive-award-ok').show();
                    } else if (id == 3){
                        $('.award-2').show();
                        $('.receive-award-ok').show();
                    }else if (id == 4){
                        $('.award-5').show();
                        $('.receive-award-ok').show();
                    }else {
                        $('.award-no').show();
                        $('.receive-award-again').show();
                    }
        }
    });
 }
 
JS;
if ($forbidden != true || $ending != true) {
    $this->registerJs($js);
}
?>
<div class="u-pageLoading">
    <img src="<?= $assetsUrl; ?>/load.gif" alt="loading">
</div>
<div class="logo" style="display: none">
    <img src="<?= $assetsUrl; ?>/logo.png" alt="">
</div>
<div class="wrapper" style="display: none;">
    <!--第一页-->
    <?php if (!$ending): ?>
        <?php if (!$forbidden): ?>

            <div class="page1 page">
                <!--活动规则按钮-->
                <div class="activity-rule-btn">
                    <img src="<?= $assetsUrl; ?>/activity-rule-btn.png" alt="">
                </div>
                <!--标题 奖品-->
                <div class="home-img">
                    <img src="<?= $assetsUrl; ?>/home-img.png" alt="">
                </div>
                <!--砸蛋舞台-->
                <div class="eggs-bg">
                    <img src="<?= $assetsUrl; ?>/eggs-bg.png" alt="">
                </div>
                <!--左右蛋-->
                <div class="egg egg-left shake">
                    <img src="<?= $assetsUrl; ?>/egg.png" alt="">
                </div>
                <div class="egg egg-right shake">
                    <img src="<?= $assetsUrl; ?>/egg.png" alt="">
                </div>
                <!--活动规则-->
                <div class="activity-rule-detail post-a-bg" style="display: none">
                    <!--规则-->
                    <img src="<?= $assetsUrl; ?>/activity-rule-detail.png" alt="" class="activity-rule-detail-img">
                    <!--关闭-->
                    <img src="<?= $assetsUrl; ?>/participation-activities-close.png" alt=""
                         class="activity-rule-detail-btn">
                </div>
            </div>
            <!--第2页-->
            <div class="page2 page">
                <!--每人每天每天三次机会 文字-->
                <div class="receive-award-text">
                    <img src="<?= $assetsUrl; ?>/receive-award-text.png" alt="">
                </div>
                <!--再来一次 按钮-->
                <div class="receive-award receive-award-again" style="display: none">
                    <img src="<?= $assetsUrl; ?>/receive-award-again.png" alt="">
                </div>
                <!--领红包 按钮-->
                <div class="receive-award receive-award-ok " style="display: none">
                    <img src="<?= $assetsUrl; ?>/receive-award.png" alt="">
                </div>
                <!--碎鸡蛋壳-->
                <div class="crack-egg-ico">
                    <img src="<?= $assetsUrl; ?>/crack-egg-ico.png" alt="">
                </div>
                <!--鸡蛋-->
                <div class="crack-egg">
                    <img src="<?= $assetsUrl; ?>/crack-egg.png" alt="">
                </div>
                <!--未中奖-->
                <div class="award-no award-size " style="display: none">
                    <img src="<?= $assetsUrl; ?>/award-no.png" alt="">
                </div>
                <!--一元红包-->
                <div class="award-1 award-size " style="display: none">
                    <img src="<?= $assetsUrl; ?>/award-1.png" alt="">
                </div>
                <!--二元红包-->
                <div class="award-2 award-size " style="display: none">
                    <img src="<?= $assetsUrl; ?>/award-2.png" alt="">
                </div>
                <!--五元红包-->
                <div class="award-5 award-size " style="display: none">
                    <img src="<?= $assetsUrl; ?>/award-5.png" alt="">
                </div>

                <!--中奖光效-->
                <div class="crack-egg-lighting">
                    <img src="<?= $assetsUrl; ?>/crack-egg-lighting.png" alt="">
                </div>

                <!--锤子-->
                <div class="hammer">
                    <img src="<?= $assetsUrl; ?>/hammer.png" alt="">
                </div>

            </div>

        <?php endif; ?>
    <?php endif; ?>
    <!--第3页-->
    <div class="page3 page"<?php if (!$forbidden): ?> style="display: none" <?php endif; ?>>
        <!--二维码-->
        <div class="qr-code">
            <img src="<?= $assetsUrl; ?>/qr-code.png" alt="">
        </div>
        <?php if ($forbidden): ?>

        <!--持续关注 文字-->
        <div class="qr-code-text-size">
            <img src="<?= $assetsUrl; ?>/qr-code-text.png" alt="">
        </div>
        <?php endif; ?>

        <?php if (!$forbidden): ?>

            <!--打开领奖通道 文字-->
        <div class="qr-code-text-size">
            <img src="<?= $assetsUrl; ?>/qr-code-text-1.png" alt="">
        </div>
        <?php endif; ?>

        <!--关闭 按钮-->
        <div class="qr-code-close">
            <img src="<?= $assetsUrl; ?>/qr-code-close.png" alt="">
        </div>
    </div>
    <!--第4页-->
    <div class="page4 page">
        <!--标题-->
        <div class="last-page-title">
            <img src="<?= $assetsUrl; ?>/last-page-title.png" alt="">
        </div>
        <!--图片-->
        <div class="last-page-img">
            <img src="<?= $assetsUrl; ?>/last-page-img.png" alt="">
        </div>
        <!--了解安牛 按钮-->
        <div class="anniu-btn">
            <img src="<?= $assetsUrl; ?>/anniu-btn.png" alt="">
        </div>
        <!--分享 按钮-->
        <div class="share-btn">
            <img src="<?= $assetsUrl; ?>/share-btn.png" alt="">
        </div>

        <!--再来一次 按钮-->
        <div class="receive-award receive-award-again-last">
            <img src="<?= $assetsUrl; ?>/receive-award-again-last.png" alt="">
        </div>
        <!--二维码弹窗-->
        <div class="anniu-detail post-a-bg" style="display: none">
            <!--二维码-->
            <div class="qr-code">
                <img src="<?= $assetsUrl; ?>/qr-code.png" alt="">
            </div>
            <!--持续关注 文字-->
            <div class="qr-code-text-size">
                <img src="<?= $assetsUrl; ?>/qr-code-text-2.png" alt="">
            </div>
            <!--关闭 按钮-->
            <div class="qr-code-close">
                <img src="<?= $assetsUrl; ?>/qr-code-close.png" alt="">
            </div>
        </div>
        <!--分享 弹窗-->
        <div class="share-detail post-a-bg" style="display: none">
            <!--分享图-->
            <div class="share-detail-img">
                <img src="<?= $assetsUrl; ?>/share-img.png" alt="">
            </div>
            <!--关闭 按钮-->
            <div class="qr-code-close">
                <img src="<?= $assetsUrl; ?>/qr-code-close.png" alt="">
            </div>
        </div>
    </div>
</div>


