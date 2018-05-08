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
use app\modules\zhengwen\Asset;
use yii\widgets\ActiveForm;

$this->render('/layouts/_jsapi-share');
$ajaxUrl = Url::to(['lottery-run'], true);
$ajaxCallbackUrl = Url::to(['callback'], true);

$assetsUrl = Asset::getAssetUrl('images');
$imgUrl = Url::to('@web/img', true);
$this->title = '有奖征集令 | 一句话介绍安宫牛黄丸';
$js = <<<JS

JS;
$this->registerJs($js);

unset($js);
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
          error: function() {
            $(".page3_modal_no").show();
            return false;
        },
          success: function (response) {
               $(".page3_modal_yes").show();
    setTimeout(function () {
        $(".page3").hide();
        $(".page4").show();

    }, 3000);

          }
     });
     return false;
});


$("#duang").click(function() {
    $(this).unbind('click').css("cursor", "default");
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
            var angle = json.angle; //指针角度
            var prize = json.praisename; //中奖奖项标题
            var id = json.id; //中奖奖项标题
            $("#zhuanpan").rotate({
                duration: 3000,//转动时间 ms
                angle: 0, //从0度开始
                animateTo: 3600+angle,//转动角度
                easing: $.easing.easeOutSine, //easing扩展动画效果
                callback: setTimeout(function () {
        $(".page5").show();

                    if(id == 2){
                        $('.page5_modal_1').show();

                    } else if (id == 3){
                        $('.page5_modal_2').show();

                    }else if (id == 4){
                        $('.page5_modal_5').show();

                    }else if (id == 5){
                        $('.page5_modal_10').show();
                    }else {
                        $('.page5_modal_no').show();
                    }
    }, 4000)
            });
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

<div class="wrapper" style="display: none;">

    <div class="page2 page">
        <div class="logo">
            <img src="<?= $assetsUrl; ?>/logo.png" alt="">
        </div>
        <img src="<?= $assetsUrl; ?>/page2_tree.png" alt="" class="page2_tree">
        <img src="<?= $assetsUrl; ?>/page2_house.png" alt="" class="page2_house">
        <img src="<?= $assetsUrl; ?>/page2_yun.png" alt="" class="page2_yun">

        <img src="<?= $assetsUrl; ?>/page2_green.png" alt="" class="page2_green">
        <img src="<?= $assetsUrl; ?>/page2_nan1.png" alt="" class="page2_nan1 page2_nan">
        <img src="<?= $assetsUrl; ?>/page2_nan2.png" alt="" class="page2_nan2 page2_nan">
        <img src="<?= $assetsUrl; ?>/page2_nan3.png" alt="" class="page2_nan3 page2_nan">
        <img src="<?= $assetsUrl; ?>/page2_nan4.png" alt="" class="page2_nan4">
        <img src="<?= $assetsUrl; ?>/page2_nv1.png" alt="" class="page2_nv1 page2_nv">
        <img src="<?= $assetsUrl; ?>/page2_nv2.png" alt="" class="page2_nv2 page2_nv">
        <img src="<?= $assetsUrl; ?>/page2_nv3.png" alt="" class="page2_nv3 page2_nv">

        <img src="<?= $assetsUrl; ?>/page2_text1.png" alt="" class="page2_text1">
        <img src="<?= $assetsUrl; ?>/page2_text2.png" alt="" class="page2_text2">
        <img src="<?= $assetsUrl; ?>/page2_text0.png" alt="" class="page2_text0">

        <img src="<?= $assetsUrl; ?>/page2_text3.png" alt="" class="page2_text3">
        <img src="<?= $assetsUrl; ?>/page2_text4.png" alt="" class="page2_text4">
        <img src="<?= $assetsUrl; ?>/page2_text5.png" alt="" class="page2_text5">
        <img src="<?= $assetsUrl; ?>/page2_text6.png" alt="" class="page2_text6">
        <img src="<?= $assetsUrl; ?>/page2_text7.png" alt="" class="page2_text7">
        <img src="<?= $assetsUrl; ?>/page2_text8.png" alt="" class="page2_text8">

        <img src="<?= $assetsUrl; ?>/page2_text9.png" alt="" class="page2_text9">
        <img src="<?= $assetsUrl; ?>/page2_text10.png" alt="" class="page2_text10">

        <img src="<?= $assetsUrl; ?>/page2_text11.png" alt="" class="page2_text11">


        <div class="page2_bottom">

        </div>
    </div>
    <div class="page1 page">
        <div class="logo">
            <img src="<?= $assetsUrl; ?>/logo.png" alt="">
        </div>
        <div class="page1_bg"></div>
        <div class="page1_main">
            <div class="page1_detail_btn"><img src="<?= $assetsUrl; ?>/detail.png" alt=""></div>
            <div class="page1_title"><img src="<?= $assetsUrl; ?>/page1_title.png" alt=""></div>
            <div class="page1_ico"><img src="<?= $assetsUrl; ?>/page1_ico.png" alt=""></div>
            <div class="page1_ling"><img src="<?= $assetsUrl; ?>/ling.png" alt=""></div>
            <div class="page1_niu1"><img src="<?= $assetsUrl; ?>/page1_niu1.png" alt=""></div>
            <div class="page1_niu2"><img src="<?= $assetsUrl; ?>/page1_niu2.png" alt=""></div>
            <div class="page1_bottom"><img src="<?= $assetsUrl; ?>/page1_bottom.png" alt=""></div>
        </div>
        <div class="page1_detail_main" style="display:none">
            <div class="page1_detail_text">
                <img src="<?= $assetsUrl; ?>/page1_detail_text.png?v=20161116182601" alt="">
            </div>
            <div class="page1_detail_return">
                <img src="<?= $assetsUrl; ?>/page1_detail_btn.png" alt="">
            </div>
        </div>
    </div>
    <?php if (!$ending): ?>
        <?php if (!$forbidden): ?>
            <div class="page page_lottery">


                <div class="page3">
                    <div class="logo">
                        <img src="<?= $assetsUrl; ?>/logo.png" alt="">
                    </div>
                    <div class="page1_bg"></div>

                    <img src="<?= $assetsUrl; ?>/page3_title.png" alt="" class="page3_title">
                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'winform',
                        'action' => ['post'],
                    ]);
                    echo $form->field($formModel, 'extra', ['options' => ['class' => 'page3_border']])->textarea(['class' => 'form-control', 'row' => '3', 'placeholder' => '（建议总字数不超30个）'])->label(false);
                    ?>

                    <input type="image" src="<?= $assetsUrl; ?>/page3_btn.png" class="page3_btn">

                    <?php ActiveForm::end(); ?>
                    <img src="<?= $assetsUrl; ?>/page3_text.png" alt="" class="page3_text">
                    <img src="<?= $assetsUrl; ?>/page3_bottom.png" alt="" class="page3_bottom">

                    <!-- 提交成功 -->
                    <div class="page3_modal_yes" style="display: none">
                        <img src="<?= $assetsUrl; ?>/page3_modal_yes.png" alt="" class="page3_modal_yes_img">
                    </div>
                    <!-- 提交失敗 -->
                    <div class="page3_modal_no" style="display: none">
                        <img src="<?= $assetsUrl; ?>/page3_modal_no.png" alt="" class="page3_modal_no_img">
                        <img src="<?= $assetsUrl; ?>/page3_modal_no_btn.png" alt="" class="page3_modal_no_btn">
                    </div>


                </div>
                <div class="page4" style="display: none">
                    <div class="logo">
                        <img src="<?= $assetsUrl; ?>/logo.png" alt="">
                    </div>
                    <div class="page1_bg"></div>

                    <div class="page4_main">
                        <img src="<?= $assetsUrl; ?>/page4_zhuanpan.png" alt="" class="page4_zhuanpan" id="zhuanpan">
                        <img src="<?= $assetsUrl; ?>/page4_jiantou.png" alt="" class="page4_jiantou" id="">
                    </div>
                    <img src="<?= $assetsUrl; ?>/page4_btn.png" alt="" class="page4_btn" id="duang">
                    <img src="<?= $assetsUrl; ?>/page4_text.png" alt="" class="page4_text">


                </div>
                <div class="page5" style="display: none">
                    <div class="logo">
                        <img src="<?= $assetsUrl; ?>/logo.png" alt="">
                    </div>
                    <div class="page1_bg"></div>
                    <!-- 未中奖 -->
                    <div class="page5_modal page5_modal_no" style="display: none">
                        <img src="<?= $assetsUrl; ?>/page4_modal_no.png" alt="" class="page4_modal_img">
                        <img src="<?= $assetsUrl; ?>/page4_modal_off.png" alt="" class="page4_modal_off">
                    </div>
                    <!-- 一元红包 -->
                    <div class="page5_modal page5_modal_1" style="display: none">
                        <img src="<?= $assetsUrl; ?>/page4_modal_1.png" alt="" class="page4_modal_img">
                        <img src="<?= $assetsUrl; ?>/page4_modal_off.png" alt="" class="page4_modal_off">
                    </div>
                    <!-- 二元红包 -->
                    <div class="page5_modal page5_modal_2" style="display: none">
                        <img src="<?= $assetsUrl; ?>/page4_modal_2.png" alt="" class="page4_modal_img">
                        <img src="<?= $assetsUrl; ?>/page4_modal_off.png" alt="" class="page4_modal_off">
                    </div>
                    <!-- 五元红包 -->
                    <div class="page5_modal page5_modal_5" style="display: none">
                        <img src="<?= $assetsUrl; ?>/page4_modal_5.png" alt="" class="page4_modal_img">
                        <img src="<?= $assetsUrl; ?>/page4_modal_off.png" alt="" class="page4_modal_off">
                    </div>
                    <!-- 十元红包 -->
                    <div class="page5_modal page5_modal_10" style="display: none">
                        <img src="<?= $assetsUrl; ?>/page4_modal_10.png" alt="" class="page4_modal_img">
                        <img src="<?= $assetsUrl; ?>/page4_modal_off.png" alt="" class="page4_modal_off">
                    </div>

                </div>

            </div>

        <?php endif; ?>
    <?php endif; ?>


    <div class="page page6">
        <div class="logo">
            <img src="<?= $assetsUrl; ?>/logo.png" alt="">
        </div>
        <div class="page1_bg"></div>
        <div class="page6_main">
            <img src="<?= $assetsUrl; ?>/page6_title.png" alt="" class="page6_title">
            <img src="<?= $assetsUrl; ?>/page6_text.png" alt="" class="page6_text">
            <img src="<?= $assetsUrl; ?>/page6_btn_anniu.png" alt="" class="page6_btn_anniu">
            <img src="<?= $assetsUrl; ?>/page6_btn_share.png" alt="" class="page6_btn_share">
        </div>
        <img src="<?= $assetsUrl; ?>/page6_modal.png" alt="" class="page6_modal" style="display: none">
        <div class="page6_modal_share" style="display: none">
            <img src="<?= $assetsUrl; ?>/share_arrow.png" alt="" class="">
        </div>
        <?php if ($forbidden) : ?>
            <div class="page6_modal_no">
                <img src="<?= $assetsUrl; ?>/page6_modal_no.png" alt="" class="page4_modal_img">
                <img src="<?= $assetsUrl; ?>/page4_modal_off.png" alt="" class="page4_modal_off">
            </div>
        <?php endif; ?>

    </div>
    <div id="arrow">
        <img src="<?= $assetsUrl; ?>/arrow.png" alt="">
    </div>
</div>

