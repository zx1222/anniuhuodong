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


$this->registerJsFile('@jsUrl/jquery.touchSwipe.min.js');
$this->registerJsFile('@jsUrl/main.js');
$this->registerJsFile('@jsUrl/jquery.easing.min.js');
$this->registerJsFile('@jsUrl/jquery.rotate.min.js');
$this->registerJsFile("http://res.wx.qq.com/open/js/jweixin-1.0.0.js",['position'=>View::POS_HEAD]);

$ajaxUrl = Url::to(['lottery-run'], true);
$js = <<<JS

$('body').on('beforeSubmit', 'form#winform', function () {
     var form = $(this);
     // return false if form still have some validation errors
     if (form.find('.has-error').length) {
          return false;
     }
     // submit form
     $.ajax({
          url: form.attr('action'),
          type: 'post',
          data: form.serialize(),
          success: function (response) {
               // do something with response
               $(".award-main").show();
               $(".qr-code").show();
               $(".award-address").hide();

          }
     });
     return false;
});

  // 未中奖，点击继续抽奖，隐藏未中奖弹窗
$(".award-06-btn").click(function(){
    $(".award-06").hide();
});

$(".page28-img-btn").click(function(){
    $(".qr-code").hide();
});

$(".award-07").click(function(){
    $(".award-07").hide();
    $(".award").hide();
    $(".award-main").show();

});

$(".award-center-btn").click(function(){
    $(".award").hide();
    $(".award .award-center").hide();
    $(".award-address").show();

});

$(".award-redpack-btn").click(function(){
    $(".award").hide();
    $(".award .award-center").hide();

});

$(function() {
    $(".page21-btn").click(function() {
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
            $("#zhuanpan").rotate({
                duration: 3000,//转动时间 ms
                angle: -30, //从0度开始
                animateTo: 3600 - angle,//转动角度
                easing: $.easing.easeOutSine, //easing扩展动画效果
                callback: function() {
                    if(id == 1){
                        $(".award-01").show();
                        $(".turntable").hide();
                        $(".award-main").show();
                    }else if(id == 2){
                        $(".award-02").show();
                        $(".turntable").hide();
                    }
                    else if(id == 3){
                        $(".award-03").show();
                        $(".turntable").hide();
                    }
                    else if(id == 4){
                        $(".award-04").show();
                        $(".turntable").hide();
                    }else if(id == 5){
                        $(".award-05").show();
                        $(".turntable").hide();
                    }else {
                        $(".award-06").show();
                    }
                }
            });
        }
    });
 }

JS;
$this->registerJs($js)
?>
<script type="text/javascript">
    wx.config(<?= json_encode(Yii::$app->wechat->jsApiConfig(['jsApiList' => ['onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ']])); ?>);
    wx.ready(function () {
        // 在这里调用 API
        wx.onMenuShareTimeline({
            title: '我和妈妈之间相隔一句“我爱你”——北京同仁堂“母亲节”专题', // 分享标题
            link: 'http://anniu0507.sindcorp.net', // 分享链接
            imgUrl: 'http://anniu0507image.sindcorp.net/share-icon.jpg', // 分享图标
        });
        wx.onMenuShareAppMessage({
            title: '我和妈妈之间相隔一句“我爱你”——北京同仁堂“母亲节”专题', // 分享标题
            desc: '这是给妈妈的一份不想作弊的问卷', // 分享描述
            link: 'http://anniu0507.sindcorp.net', // 分享链接
            imgUrl: 'http://anniu0507image.sindcorp.net/share-icon.jpg', // 分享图标
        });
        wx.onMenuShareQQ({
            title: '我和妈妈之间相隔一句“我爱你”——北京同仁堂“母亲节”专题', // 分享标题
            desc: '这是给妈妈的一份不想作弊的问卷', // 分享描述
            link: 'http://anniu0507.sindcorp.net', // 分享链接
            imgUrl: 'http://anniu0507image.sindcorp.net/share-icon.jpg', // 分享图标
        });
    });
</script>

<div class="u-pageLoading">
    <?= Html::img('@imgUrl/load.gif', ['alt' => 'loading']) ?>
</div>
<div class="main-center" style="display: none;">
    <?= Html::img('@imgUrl/logo.png', ['class' => 'logo']) ?>
    <?php if (!$forbidden): ?>
        <!--// 转盘-->
        <div class="turntable">
            <div class="turntable-main">
                <?= Html::img('@imgUrl/page21-turntable.png', ['class' => 'page21-turntable', 'id' => 'zhuanpan']) ?>
                <?= Html::img('@imgUrl/page21-arrow.png', ['class' => 'page21-arrow', 'alt' => '']) ?>
            </div>
            <?= Html::img('@imgUrl/page21-btn.png', ['class' => 'page21-btn', 'alt' => '']) ?>
            <?= Html::img('@imgUrl/page21-text.png', ['class' => 'page21-text', 'alt' => '']) ?>
        </div>
    <?php endif; ?>


    <div class="award">
        <?php if (!$forbidden): ?>
            <!-- 红包 -->
            <div class="award-01 award-center" style="display: none;">
                <?= Html::img('@imgUrl/page22-img.png', ['class' => 'award-center-img', 'alt' => '']) ?>
                <?= Html::img('@imgUrl/page22-btn.png', ['class' => 'award-center-btn award-redpack-btn', 'alt' => '']) ?>
            </div>
            <!-- 拔罐器 -->
            <div class="award-02 award-center" style="display: none;">
                <?= Html::img('@imgUrl/page23-img.png', ['class' => 'award-center-img', 'alt' => '']) ?>
                <?= Html::img('@imgUrl/page22-btn.png', ['class' => 'award-center-btn', 'alt' => '']) ?>
            </div>
            <!-- 电子血压仪 -->
            <div class="award-03 award-center" style="display: none;">
                <?= Html::img('@imgUrl/page24-img.png', ['class' => 'award-center-img', 'alt' => '']) ?>
                <?= Html::img('@imgUrl/page22-btn.png', ['class' => 'award-center-btn', 'alt' => '']) ?>
            </div>
            <!-- 按摩坐垫 -->
            <div class="award-04 award-center" style="display: none;">
                <?= Html::img('@imgUrl/page25-img.png', ['class' => 'award-center-img', 'alt' => '']) ?>
                <?= Html::img('@imgUrl/page22-btn.png', ['class' => 'award-center-btn', 'alt' => '']) ?>
            </div>
            <!-- 安宫牛黄丸 -->
            <div class="award-05 award-center" style="display: none;">
                <?= Html::img('@imgUrl/page26-img.png', ['class' => 'award-center-img', 'alt' => '']) ?>
                <?= Html::img('@imgUrl/page22-btn.png', ['class' => 'award-center-btn', 'alt' => '']) ?>
            </div>
            <!-- 未中奖 -->
            <div class="award-06 award-center" style="display: none;">
                <?= Html::img('@imgUrl/page27-img.png', ['class' => 'award-center-img', 'alt' => '']) ?>
                <?= Html::a(Html::img('@imgUrl/page-31-btn-03.png', ['class' => 'award-center-img award-06-btn', 'alt' => '']), ['lottery']) ?>

            </div>
        <?php endif; ?>
        <!-- 抽奖次数用完 -->
        <?php if ($forbidden): ?>
            <div class="award-07 award-center">
                <?= Html::img('@imgUrl/page27-over.png', ['class' => 'award-center-img', 'alt' => '']) ?>
            </div>
        <?php endif; ?>
    </div>

    <!--    //填写地址-->
    <?php if (!$forbidden): ?>
        <div class="award-address" style="display: none">
            <?= Html::img('@imgUrl/page30-text.png', ['class' => 'award-address-img', 'alt' => '']) ?>

            <?php $form = ActiveForm::begin([
                'id' => 'winform',
                'action' => ['receive'],
            ]); ?>

            <div class="form-group award-address-01">
                <?= $form->field($formModel, 'name')->textInput(['class' => 'form-control'])->label(false) ?>
            </div>

            <div class="form-group award-address-02">
                <?= $form->field($formModel, 'phone')->textInput(['class' => 'form-control'])->label(false) ?>
            </div>

            <div class="form-group award-address-03">
                <?= $form->field($formModel, 'address')->textInput(['class' => 'form-control'])->label(false) ?>
            </div>

            <!-- <button type="submit" class="btn btn-default">Submit</button> -->

            <?= Html::input('image', '', '', ['src' => Yii::getAlias('@imgUrl/page30-btn.png'), 'class' => 'award-address-btn']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    <?php endif; ?>

    <!--    // 最后一页-->
    <div class="award-main" style="display: none">
        <?= Html::img('@imgUrl/page-31-img.png', ['class' => 'page-31-img', 'alt' => '']) ?>
        <?= Html::a(Html::img('@imgUrl/page-31-btn-01.png', ['class' => 'page-31-btn-01', 'alt' => '']), 'http://app7.sindcorp.net/#st8') ?>
        <?php if (!$forbidden): ?>
            <?= Html::a(Html::img('@imgUrl/page-31-btn-03.png', ['class' => 'page-31-btn-03', 'alt' => '']), ['lottery']) ?>
        <?php endif; ?>
    </div>
    <!--    // 求关注-->
    <?php if (Yii::$app->user->identity->wx_subscribe == 0): ?>
        <div class="qr-code" style="display:none;">
            <?= Html::img('@imgUrl/page28-img.png', ['class' => '', 'alt' => '']) ?>
            <?= Html::img('@imgUrl/page28-img-btn.png', ['class' => 'page28-img-btn', 'alt' => '']) ?>
        </div>
    <?php endif; ?>

</div>
