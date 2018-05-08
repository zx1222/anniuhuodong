<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 16/5/5
 * Time: 下午10:34
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\web\View;
use app\modules\chongqing\Asset;


$ajaxUrl = Url::to(['lottery-run'], true);
$js = <<<JS

$(".main-center").ready(
    function() {
      $(".main-center").show();
      $(".u-pageLoading").hide();
    });

$("body").css("height",$(window).height());
$("body").css("width",$(window).width());

// 页面加载完后执行

       window.onload = function(){
$("body").css("overflow","hidden");
$("body").css("position","fixed");
$(".wrapper").ready(
    function () {
        var nowpage1 = 0;
        var tpage = $(".wrapper .main-bg-red");
        var pagenum = tpage.length - 1;

        //给class为container的容器加上触滑监听事件
        $(".main-center").swipe(
            {
                swipe: function (event, direction, distance, duration, fingerCount) {//事件，方向，距离（像素为单位），时间，手指数量
                    if (direction == "up")//当向上滑动手指时令当前页面记数器加1
                    {
                        nowpage1 = nowpage1 + 1;
                       
                    }
                    else if (direction == "down")//当向下滑动手指时令当前页面记数器减1
                    {
                        nowpage1 = nowpage1 - 1;
                    }

                    if (nowpage1 > pagenum)//因本实例只有7张图片，所以当记数器大于7时令他返回7（从0开始记），避免溢出出错
                    {
                        nowpage1 = pagenum;
                    }

                    if (nowpage1 < 0)//道理同上
                    {
                        nowpage1 = 0;
                    }
                    if (nowpage1 == 0) {

                    }

                    $(".wrapper").animate({"top": nowpage1 * (-100) + "%"}, 400);//根据当前记数器滚动到相应的高度
                }
            }
        );
    }
);
$('.index-qr img').on('click',function() {
    $('.index-qr').hide()
});

$(".footer-arrow").css({"-webkit-animation":"twinkling 1.5s infinite ease-in-out"});
$(".footer-arrow").css({"-moz-animation":"twinkling 1.5s infinite ease-in-out"});
$(".footer-arrow").css({"-o-animation":"twinkling 1.5s infinite ease-in-out"});
}



$(function() {
    $(".turntable-img-02").click(function() {
        $(this).unbind('click').css("cursor", "default");
        lottery();
    });
});

function lottery() {
    $.ajax({
        type: 'POST',
        url: '{$ajaxUrl}',
        dataType: 'json',
        cache: false,
        error: function() {
            alert('Sorry，出错了！');
            return false;
        },
        success: function(json) {
            var angle = json.angle; //指针角度
            var prize = json.praisename; //中奖奖项标题
            var id = json.id; //中奖奖项标题
            $(".turntable-img-01").rotate({
                duration: 5000,//转动时间 ms
                angle: 0, //从0度开始
                animateTo: 3600 - angle,//转动角度
                easing: $.easing.easeOutQuint, //easing扩展动画效果
                callback: function() {
                    
                    
                    
                    $(".award").hide();
                    if(id == 1){
                        $(".award-01").show();
                    }else if(id == 2){
                        $(".award-02").show();
                    }
                    else if(id == 3){
                        $(".award-03").show();
                    }
                    else if(id == 4){
                        $(".award-04").show();
                    }else if(id == 5){
                        $(".award-05").show();
                    }else if(id == 6){
                        $(".award-06").show();
                    }else{
                         $(".award-07").show();
                    }
                }
            });
        }
    });
 }

JS;
$this->registerJs($js)
?>

<div class="u-pageLoading">
    <img src="<?= Asset::getAssetUrl('images/load.gif') ?>" class="" alt="">
</div>
<div class="main-center" style="display: none;">
    <div class="wrapper">
        <div class="main-01 main-size main-bg-red">
            <!-- 首页内容 -->
            <div class="index main-size"
                 style="background-image: url(<?= Asset::getAssetUrl('/images/home-bg.jpg') ?>);">
            </div>
            <img src="<?= Asset::getAssetUrl('images/arrow.png') ?>" class="img-responsive center-block footer-arrow"
                 alt="">

            <?php if (Yii::$app->user->identity->wx_subscribe == 2): ?>
                <!-- 扫码关注 -->
                <div class="index-qr main-size">
                    <img src="<?= Asset::getAssetUrl('images/x.jpg') ?>" class="img-responsive center-block" alt="">
                </div>
            <?php endif; ?>

        </div>
        <!-- 第二页面 -->

        <div class="main-02 main-size main-bg-red">
            <!-- 轮盘抽奖 -->
            <div class="main-size award"
                 style="background-image: url(<?= Asset::getAssetUrl('/images/turntable-bg.jpg') ?>);">


                <div class="turntable">
                    <div class="turntable-main">
                        <img src="<?= Asset::getAssetUrl('images/turntable-img-01.png') ?>"
                             class="img-responsive center-block turntable-img-01" alt="">
                        <img src="<?= Asset::getAssetUrl('images/turntable-img-02.png') ?>"
                             class="img-responsive center-block turntable-img-02" alt="">
                    </div>
                </div>


                <!-- 已抽过红包弹窗 -->
                <div class="partake main-size"
                     style="<?php if (!$forbidden): ?>display:none;<?php endif; ?>background-image: url(<?= Asset::getAssetUrl('/images/y.png') ?>);">
                </div>


            </div>
            <!-- 中奖页面 -->
            <div class="receive main-size">
                <!--1-->
                <div class="award-main award-01"
                     style="display: none; background-image: url(<?= Asset::getAssetUrl('/images/award-01-bg.jpg') ?>);">

                </div>
                <!--2-->
                <div class="award-main award-02"
                     style="display: none; background-image: url(<?= Asset::getAssetUrl('/images/award-02-bg.jpg') ?>);">

                </div>
                <!--3-->
                <div class="award-main award-03"
                     style="display: none; background-image: url(<?= Asset::getAssetUrl('/images/award-03-bg.jpg') ?>);">

                </div>

                <!-- 4 -->
                <div class="award-main award-04"
                     style="display: none; background-image: url(<?= Asset::getAssetUrl('/images/award-04-bg.jpg') ?>);">

                </div>
                <!-- 5 -->
                <div class="award-main award-05"
                     style="display: none; background-image: url(<?= Asset::getAssetUrl('/images/award-05-bg.jpg') ?>);">
                </div>
                <!-- 6 -->
                <div class="award-main award-06"
                     style="display: none; background-image: url(<?= Asset::getAssetUrl('/images/award-06-bg.jpg') ?>);">
                </div>
                <!-- 7 -->
                <div class="award-main award-07"
                     style="display: none; background-image: url(<?= Asset::getAssetUrl('/images/award-07-bg.jpg') ?>);">

                </div>

            </div>
        </div>

    </div>
</div>