<?php
use app\modules\fathersday\Asset;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;


$this->render('/layouts/_jsapi-disabled');
$ajaxUrl = Url::to(['lottery-challenger-run'], true);
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
                    }else if(id == 5){
                        $(".page31-prize-5").delay('slow').fadeIn( 'fast' );
                    }else if(id == 2){
                        $(".page31-prize-10").delay('slow').fadeIn( 'fast' );
                    }else if(id == 1){
                        $(".page31-prize-15").delay('slow').fadeIn( 'fast' );
                    }else if(id == 4){
                        $(".page31-prize-20").delay('slow').fadeIn( 'fast' );
                    }else{

                    }
                }
            });
        }
    });
 }

JS;
$this->registerJs($js)
?>
<div class="wrapper-turntable wrapper-main">
    <div class="page31 page">
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
            <?= Html::img(Asset::getAssetUrl('images/turntable-btn.png'), ['class' => 'turntable-btn bg-post', 'id' => 'zhuanpan']) ?>
            <?= Html::img(Asset::getAssetUrl('images/turntable-ico.png'), ['class' => 'turntable-ico bg-post', 'id' => 'duang']) ?>
        </div>
       
        <div class="page31-prize page-inner page31-prize-5" style="display: none;">
            <?= Html::img(Asset::getAssetUrl('images/prize-5.png'), ['class' => 'page31-prize-img', 'alt' => '']) ?>
            <?= Html::a(Html::img(Asset::getAssetUrl('images/page15-help-close.jpg'), ['class' => 'page31-prize-close', 'alt' => '']),\yii\helpers\Url::to(['/fathersday/default/mine']) )?>
        </div>
        <div class="page31-prize page-inner page31-prize-10" style="display: none;">
            <?= Html::img(Asset::getAssetUrl('images/prize-10.png'), ['class' => 'page31-prize-img', 'alt' => '']) ?>
            <?= Html::a(Html::img(Asset::getAssetUrl('images/page15-help-close.jpg'), ['class' => 'page31-prize-close', 'alt' => '']),\yii\helpers\Url::to(['/fathersday/default/mine']) )?>

        </div>
        <div class="page31-prize page-inner page31-prize-15" style="display: none;">
            <?= Html::img(Asset::getAssetUrl('images/prize-15.png'), ['class' => 'page31-prize-img', 'alt' => '']) ?>
            <?= Html::a(Html::img(Asset::getAssetUrl('images/page15-help-close.jpg'), ['class' => 'page31-prize-close', 'alt' => '']),\yii\helpers\Url::to(['/fathersday/default/mine']) )?>

        </div>
        <div class="page31-prize page-inner page31-prize-20" style="display: none;">
            <?= Html::img(Asset::getAssetUrl('images/prize-20.png'), ['class' => 'page31-prize-img', 'alt' => '']) ?>
            <?= Html::a(Html::img(Asset::getAssetUrl('images/page15-help-close.jpg'), ['class' => 'page31-prize-close', 'alt' => '']),\yii\helpers\Url::to(['/fathersday/default/mine']) )?>

        </div>
        <div class="page32-prize page-inner page32-prize-no" style="display: none;">

            <?= Html::img(Asset::getAssetUrl('images/prize-no.png'), ['class' => 'page32-prize-img', 'alt' => '']) ?>
            <?= Html::a(Html::img(Asset::getAssetUrl('images/page15-help-close.jpg'), ['class' => 'page32-prize-close', 'alt' => '']),\yii\helpers\Url::to(['/fathersday/default/mine']) )?>
        </div>
    </div>

</div>
