<?php
use app\modules\ejiaoaojiaodajie\Asset;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->render('/layouts/_jsapi-disabled');
$assetsUrl = Asset::getAssetUrl('images');
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
            // if(json.code){
            //     alert('今日您已经抽过奖了');
            //   return;  
            // }
            var angle = json.angle; //指针角度
            var prize = json.praisename; //中奖奖项标题
            var id = json.id; //中奖奖项标题
            $("#zhuanpan").rotate({
                duration: 3000,//转动时间 ms
                angle: -30, //从0度开始
                animateTo: 3600 - angle,//转动角度
                easing: $.easing.easeOutSine, //easing扩展动画效果
                callback: function() {
                    if(id == 1){
                        setTimeout(function(){
                                $(".page4").hide();
                                $(".page5").show();
                        },1000);
                    }else if(id == 3){
                        setTimeout(function(){
                                $(".page4").hide();
                                $(".page6 img.zao").show();
                                $(".page7 img.zao").show();
                                $(".page6").show();
                        },1000);
                    }else if(id == 2){
                        setTimeout(function(){
                                $(".page4").hide();
                                $(".page6 img.binggan").show();
                                $(".page7 img.binggan").show();
                                $(".page6").show();
                        },1000);

                    }else {
                       setTimeout(function(){
                                $(".page4").hide();
                                $(".page10").show();
                        },1000);
                        
                    }
                }
            });
        }
    });
 }

JS;
$this->registerJs($js)
?>
<div class="page4 page">
    <!--抽奖大转盘-->
    <div class="topstrap bg-post"></div>
    <div class="vite-text bg-post page-post-center"></div>
    <div id="zhuanpan" class="turntable bg-post page-post-center"></div>
    <div id="duang" class="turntable-icon bg-post page-post-center"></div>
    <div class="house-two bg-post page-post-center"></div>
</div>
<div class="page5 page" style="display: none">
    <!--红包-->
    <div class="topstrap bg-post"></div>
    <div class="win bg-post page-post-center"></div>
    <div class="once bg-post page-post-center"></div>
    <div class="twocode bg-post page-post-center">
        <img src="<?= Asset::getAssetUrl('images/ejiao-twocode.png') ?>" alt="二维码" class="img-responsive page-img center-block">
    </div>
    <div class="house-one bg-post"></div>
    <div class="ejiaodajie-icon bg-post"></div>
    <div class="close-two bg-post page-post-center"></div>
</div>
<div class="page10 page" style="display: none">
    <!--很遗憾,您未中奖-->
    <div class="topstrap bg-post"></div>
    <div class="no-win bg-post page-post-center"></div>
    <div class="once bg-post page-post-center"></div>
    <div class="twocode bg-post page-post-center">
        <img src="<?= Asset::getAssetUrl('images/ejiao-twocode.png') ?>" alt="二维码" class="img-responsive page-img center-block">
    </div>
    <div class="house-one bg-post"></div>
    <div class="ejiaodajie-icon bg-post"></div>
    <div class="close-two bg-post page-post-center"></div>
</div>
<div class="page9 page" style="display: none">
    <!--了解阿胶-->
    <div class="logo" id="logo">
        <!-- logo -->
    </div>
    <div class="topstrap bg-post"></div>
    <div class="title bg-post page-post-center"></div>
    <div class="themewords  bg-post page-post-center"></div>
    <div class="anniu bg-post page-post-center"></div>
    <div class="knowanniu bg-post page-post-center">
        <a href="https://mp.weixin.qq.com/s?__biz=MzIzNTA1MzMwOA==&mid=534926917&idx=1&sn=8ae8e49ac8ed01fecea5c6361cf985ca&chksm=72fbffd6458c76c0d309c822f419294c71e9ab605a4f28f9fd67de787feb23516a1bb2ac0010&mpshare=1&scene=1&srcid=0322e4g8QBE91fS0xGTvbuBg&key=8899aecb9c973c6c8c6493165fe94135e8a90543a7341803a5d62a4f46d617455d3685ac3a1ded170c33ea3769504ea8f8b83eba12bae8e6b1bae5a4ce5b277571a547fada2e351e9beb85fb29c26415&ascene=0&uin=MTIwMDc1&devicetype=iMac+MacBookPro8%2C2+OSX+OSX+10.12.3+build(16D32)&version=12020010&nettype=WIFI&fontScale=100&pass_ticket=ncNvrd%2BVbmDo8mwT6UceHChkAGJFaDx8jVCS9BxBtAc%3D" class="knowanniu-link"></a>
    </div>
    <div class="share bg-post page-post-center"></div>
    <!--遮罩层-->
    <div class="mask bg-post" style="display: none"></div>
<!--     分享箭头图片-->
    <div class="share-bg bg-post" style="display: none"></div>
</div>
<!--恭喜你抽中红包和很遗憾未中奖页面一样  替换提示语图片即可!-->
<div class="page6 page" style="display: none">
    <!--恭喜你抽中实物-->
    <div class="topstrap bg-post"></div>
    <div class="article bg-post page-post-center">
        <img src="<?= Asset::getAssetUrl('images/candieddate-text.png') ?>" alt="阿胶蜜枣"
             class="zao center-block img-responsive" style="display: none">
        <img src="<?= Asset::getAssetUrl('images/soda-biscuit-text.png') ?>" alt="阿胶饼干"
             class="binggan center-block img-responsive" style="display: none">
    </div>
    <div class="article-info bg-post page-post-center">
        <img src="<?= Asset::getAssetUrl('images/candieddate.png') ?>" alt="阿胶蜜枣"
             class="zao center-block img-responsive" style="display: none">
        <img src="<?= Asset::getAssetUrl('images/soda-biscuit.png') ?>" alt="阿胶饼干"
             class="binggan center-block img-responsive" style="display: none">
    </div>
    <div class="writeaddress bg-post page-post-center"></div>
    <div class="house-one bg-post"></div>
    <div class="ejiaodajie-icon bg-post"></div>

</div>
<div class="page7 page" style="display: none">
    <!--填写寄货地址-->
    <div class="topstrap bg-post"></div>
    <div class="article bg-post page-post-center">
        <img src="<?= Asset::getAssetUrl('images/candieddate-text.png') ?>" alt="阿胶蜜枣"
             class="zao center-block img-responsive" style="display: none">
        <img src="<?= Asset::getAssetUrl('images/soda-biscuit-text.png') ?>" alt="阿胶饼干"
             class="binggan center-block img-responsive" style="display: none">
    </div>
    <div class="writeaddress-text bg-post page-post-center"></div>
    <div class="address-content bg-post page-post-center">
        <?php $form = ActiveForm::begin([
            'id' => 'winform',
            'action' => ['receive'],
        ]); ?>

        <div class="form-group award-address-01">
            <?= $form->field($formModel, 'name')->textInput(['class' => 'form-control', 'placeholder' => '姓名'])->label(false) ?>
        </div>

        <div class="form-group award-address-02">
            <?= $form->field($formModel, 'phone')->textInput(['class' => 'form-control', 'placeholder' => '电话'])->label(false) ?>
        </div>

        <div class="form-group award-address-03">
            <?= $form->field($formModel, 'address')->textarea(['class' => 'form-control', 'placeholder' => '地址'])->label(false) ?>
        </div>

        <div class="text-center">

            <?= Html::button('', ['type' => 'submit', 'class' => 'Submit']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

    <div class="house-one bg-post"></div>
    <div class="ejiaodajie-icon bg-post"></div>
</div>
<div class="page8 page" style="display: none">
    <!--得奖之后扫描二维码-->
    <div class="topstrap bg-post"></div>
    <div class="submit-success bg-post page-post-center"></div>
    <div class="once bg-post page-post-center"></div>
    <div class="twocode bg-post page-post-center">
        <img src="<?= Asset::getAssetUrl('images/ejiao-twocode.png') ?>" alt="二维码" class="img-responsive page-img center-block">
    </div>
    <div class="house-one bg-post"></div>
    <div class="ejiaodajie-icon bg-post"></div>
    <div class="close-two bg-post page-post-center"></div>
</div>
<div class="page9 page" style="display: none">
    <!--了解阿胶-->
    <div class="logo" id="logo">
        <!-- logo -->
    </div>
    <div class="topstrap bg-post"></div>
    <div class="title bg-post page-post-center"></div>
    <div class="themewords  bg-post page-post-center"></div>
    <div class="anniu bg-post page-post-center"></div>
    <div class="knowanniu bg-post page-post-center">
        <a href="https://mp.weixin.qq.com/s?__biz=MzIzNTA1MzMwOA==&mid=534926917&idx=1&sn=8ae8e49ac8ed01fecea5c6361cf985ca&chksm=72fbffd6458c76c0d309c822f419294c71e9ab605a4f28f9fd67de787feb23516a1bb2ac0010&mpshare=1&scene=1&srcid=0322e4g8QBE91fS0xGTvbuBg&key=8899aecb9c973c6c8c6493165fe94135e8a90543a7341803a5d62a4f46d617455d3685ac3a1ded170c33ea3769504ea8f8b83eba12bae8e6b1bae5a4ce5b277571a547fada2e351e9beb85fb29c26415&ascene=0&uin=MTIwMDc1&devicetype=iMac+MacBookPro8%2C2+OSX+OSX+10.12.3+build(16D32)&version=12020010&nettype=WIFI&fontScale=100&pass_ticket=ncNvrd%2BVbmDo8mwT6UceHChkAGJFaDx8jVCS9BxBtAc%3D" class="knowanniu-link"></a>
    </div>
    <div class="share bg-post page-post-center"></div>
    <!--遮罩层-->
    <div class="mask bg-post" style="display: none"></div>
    <!--     分享箭头图片-->
    <div class="share-bg bg-post" style="display: none"></div>
</div>
