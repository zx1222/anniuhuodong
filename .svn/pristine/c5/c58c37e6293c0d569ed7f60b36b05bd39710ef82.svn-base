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
use app\modules\ejiaoduilian\Asset;

$this->render('/layouts/_jsapi-share');
$ajaxUrl = Url::to(['lottery-run'], true);
$ajaxCallbackUrl = Url::to(['callback'], true);

$assetsUrl = Asset::getAssetUrl('images');
$imgUrl = $assetsUrl;
$imgUrl = Url::to('@web/img', true);
$this->title = '新春福利 | 同仁堂阿胶邀您对春联';
$js = <<<JS



$(".wrapper").ready(
    function () {
    
        //预加载全部图片
        
                 var images = document.images;
                var total = images.length;
                var loaded = 0;
                for (var i = 0; i < total; i++) {
                    var image = new Image();
                    image.onload = function() {
                        if (++loaded >= total) {
                            // 图片已全部预加载完成
                        }
                    };
                    image.src = images[i].src;
                }
    
            
        $(".u-pageLoading").hide();
        $(".wrapper").show();
        var nowpage = 0;
        //给class为container的容器加上触滑监听事件
        $(".page1").swipe(
            {
                swipe: function (event, direction, distance, duration, fingerCount) {//事件，方向，距离（像素为单位），时间，手指数量
                    if (direction == "up")//当向上滑动手指时令当前页面记数器加1
                    {
                        nowpage = nowpage + 1;
                    }
                    

                   

                    if (nowpage < 0)//道理同上
                    {
                        nowpage = 0;
                    }
                    if (nowpage == 0) {
                        $("#arrow").show();
                    }
                    if (nowpage == 1) {
                       $("#arrow").hide();
                        $(".wrapper").animate({"top":"-100%"}, 400);
                    }

                    if (nowpage == 2) {
                        
                    }
                    if (nowpage == 3) {
                        
                    }
                   //根据当前记数器滚动到相应的高度
                    
                    //了解同仁堂阿胶点击事件
                    $(".page7 .scanLife").click(function () {
                        $(".page8").animate({"opacity": 1}, 100);
                        $(".page7").hide();
                    })
                    // 点击开始答题
                    $(".page2").unbind('click').click(function () {
                    $(".wrapper").animate({"top": "-200%"}, 0);
                        $(".page4").show();
                        $(".page3").hide();
                        pk();
                    });
                    // 答错超过五道题，再来一次。
                    $(".rework").click(function () {
                        window.location.reload(); // 还有机会再来一次
                    });
                    
                    //机会用完点击关闭了解同仁堂阿胶
                    $(".page4 .close").click(function() {
                      $(".page4").hide();
                      $(".page7").show();
                    });
                   

                    //点击分享出现遮罩层
                    $(".share").click(function () {
                        $(".page7 .bg").show();
                        $(".page7 .show").show();
                    });
                    //点击遮罩层隐藏
                    $(".page7 .show").click(function () {
                        $(".page7 .bg").hide();
                        $(".page7 .show").hide();
                    });

        //点击分享出现遮罩层
                    $(".page8 .share").click(function () {
                        $(".page8 .bg").show();
                        $(".page8 .show").show();
                    });
                    $(".page8 .show").click(function () {
                        $(".page8 .bg").hide();
                        $(".page8 .show").hide();
                    });
        
        

                }
            }
        );

    });
JS;
$this->registerJs($js);

unset($js);
$js = <<<JS
function pk() {
//  十道题答题的点击事件  点击选择框隐藏第一题 显示第二道题
        var sum = 0;
        var num = 0;
        $(".answer_bg_an .checkbox label").change(function () {
         if($(this).parent().parent().hasClass('animated') == false){

            // 答题左侧消失样式
            $(this).parent().parent().addClass("animated bounceOutLeft ");
              
                //  判断答对数字显示，答错数字
                if ($(this).find("input").hasClass("true")) {
    
                    sum = sum + 1;
                 
                    $("#yes").text(sum);
                } else {
                          
                    num = num + 1;
                    $("#no").text(num);
                }
        }

        });

         $(".answer_bg_last .checkbox label").change(function () {
                if($(this).parent().parent().hasClass('animated') == false){

            // 答题左侧消失样式
            $(this).parent().parent().addClass("animated bounceOutLeft ");
          
            //  判断答对数字显示，答错数字
            if ($(this).find("input").hasClass("true")) {

                sum = sum + 1;
             
                $("#yes").text(sum);
            } else {
                      
                num = num + 1;
                $("#no").text(num);
            }
            
             if (sum >= 3) {
                $(".page6").show();
                $(".page4").hide();
                run();
            } else {
                $(".page5").show();
                $(".page4").hide();

            }
            }
        });
}
function run() {

    var prize;
    var img ;

    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
        type: 'POST',
        url: '{$ajaxUrl}',
        dataType: 'json',
        data: {_csrf: csrfToken},
        cache: false,
        error: function () {
            return false;
        },
        success: function (data) {
            prize = data.id;
            img = '{$imgUrl}/' + data.praisecontent;
            
            var lottery = new Lottery('lotteryContainer', '{$imgUrl}/scrape.png', 'image', 270, 84, drawPercent);
            lottery.init(img, 'image');
            var callback_lock = 0;
            function drawPercent(percent) {
               if(percent>50 && callback_lock == 0){
                   callback_lock = 1;
                   setTimeout(function () {
                        cool();
                       },1000)
                   
                    
                   // console.log(percent);
               }
            }
            
        }
    });


    var cool = function () {
        $(".page6 .popup").show();
        $(".page6 .lottery").animate({"opacity": 0}, 100);

        if (prize == 1) {
            $(".page6 .popup .join").show();
            $(".page6 .popup .recur").show();
            $(".page6 .popup .recur").on('click', function () {
                window.location.reload(); // 还有机会再来一次
            });

        } else {
            // 红包到账
            $.ajax({
                type: 'POST',
                url: '{$ajaxCallbackUrl}',
                dataType: 'json',
                data: {_csrf: csrfToken},
                cache: false,
                error: function () {
                    // alert('Sorry，出错了！');
                    return false;
                },
                success: function (data) {
                    if(data == 1){
                        $(".page6 .popup .money").show();
                        $(".page6 .popup .qr-code-text-yes").show();
                        $(".page6 .popup .popup-close").show().click(function() {
                          $(".page6").hide();
                          $(".page7").show();
                        });
                        
                    }else{
                        alert('Sorry，领奖出错了！请截屏联系管理员');
                    }
                }
            });
        }
        $(".page6 .lottery").animate({"opacity": 0}, 100);

    }

}

JS;
if ($forbidden != true || $ending != true) {
    $this->registerJs($js);
}
?>


<div class="wrapper">
    <div class="page1 page">

        <img src="<?= $assetsUrl; ?>/home-img.png" alt="首页" class="img-responsive home-img">
        <img src="<?= $assetsUrl; ?>/border-img.png" alt="首页" class="img-responsive border-img">
        <img src="<?= $assetsUrl; ?>/bottom-img.png" alt="首页" class="img-responsive bottom-img">
        <img src="<?= $assetsUrl; ?>/logo.png" alt="logo" class="img-responsive logo">


    </div>
    <div class="page2 page">
        <img src="<?= $assetsUrl; ?>/logo.png" alt="logo" class="img-responsive logo">
        <img src="<?= $assetsUrl; ?>/title.png" alt="title" class="img-responsive title">
        <img src="<?= $assetsUrl; ?>/help.png" alt="help" class="img-responsive help">
        <img src="<?= $assetsUrl; ?>/text-ok.png" alt="text-ok" class="img-responsive text-ok">
    </div>
    <?php if ($ending == true) { ?>
        <!-- 答题已结束 -->
        <div class="page4 page">
            <img src="<?= $assetsUrl; ?>/logo.png" alt="logo" class="img-responsive logo">
            <img src="<?= $assetsUrl; ?>/ending.png" alt="活动结束"
                 class="img-responsive center-block over">
            <img src="<?= $assetsUrl; ?>/close-btn.png" alt="关闭" class="img-responsive center-block close">
        </div>
    <?php }; ?>

    <?php if ($forbidden == true) { ?>
        <!-- 机会用完 -->
        <div class="page4 page">
            <img src="<?= $assetsUrl; ?>/logo.png" alt="logo" class="img-responsive logo">
            <img src="<?= $assetsUrl; ?>/over.png" alt="活动次数用完"
                 class="img-responsive center-block over">
            <img src="<?= $assetsUrl; ?>/close-btn.png" alt="关闭" class="img-responsive center-block close">
        </div>
    <?php } else { ?>

        <div class="page4 page" style="display: none">
            <img src="<?= $assetsUrl; ?>/logo.png" alt="logo" class="img-responsive logo">
            <ul class="answer_number">
                <li><img src="<?= $assetsUrl; ?>/yes.png" alt="答对数字"
                         class="img-responsive center-block">
                </li>
                <li id="yes">0</li>
                <li><img src="<?= $assetsUrl; ?>/no.png" alt="答错数字"
                         class="img-responsive center-block">
                </li>
                <li id="no" style="border-right: 2px solid #978870;">0</li>
            </ul>
            <img src="<?= $assetsUrl; ?>/answer-img.png" alt="" class="img-responsive answer-img">
            <?php
            $i = 11;
            foreach (\app\modules\ejiaoduilian\models\Question::generate() as $item):
                $i--;
                ?>

                <div class="answer_01 answer_bg <?= $i == 10 ? 'answer_bg_last' : 'answer_bg_an' ?>">
                    <h3>题目<?= $i ?></h3>
                    <p>上联：<?= $item['q'] ?></p>
                    <p>下联：_____________</p>
                    <div class="checkbox">
                        <?php
                        $o = $item['o'];
                        shuffle($o);
                        foreach ($o as $option):
                            ?>

                            <label>
                                <input type="checkbox" <?= $option['isTrue'] == 1 ? 'class="true"' : '' ?>>
                                <?= $option['text'] ?>
                            </label>
                        <?php endforeach; ?>

                    </div>
                </div>
            <?php endforeach; ?>

            <img src="<?= $assetsUrl; ?>/answer_logo.png" alt="北京同仁堂底部logo"
                 class="img-responsive answer_logo">
        </div>

        <!-- 答错不能抽奖 -->
        <div class="page5 page" style="display: none">
            <img src="<?= $assetsUrl; ?>/no-lottery.png" alt="无法抽奖"
                 class="img-responsive center-block no-lottery">
            <img src="<?= $assetsUrl; ?>/rework.png" alt="再来一次"
                 class="img-responsive center-block rework">
        </div>

        <!-- 刮奖 -->
        <div class="page6 page" style="display: none">
            <img src="<?= $assetsUrl; ?>/logo.png" alt="logo" class="img-responsive logo">
            <img src="<?= $assetsUrl; ?>/lottery.png" alt="可以抽奖"
                 class="img-responsive center-block lottery">

            <div style="position: absolute; bottom: 10vh;width:270px; left:0; right:0;margin: auto">
                <div id="lotteryContainer" style="position:relative;width: 270px;height:60px;"></div>
            </div>
            <div class="popup">
                <div class="mask"></div>
                <div class="receive-money">
                    <div style="position: relative">
                        <img src="<?= $assetsUrl; ?>/money.png" alt="红包到账" class="img-responsive center-block money"
                             style="display: none">
                        <img src="<?= $assetsUrl; ?>/qr-code-text-yes.png" alt=""
                             class="img-responsive center-block qr-code-text-yes" style="display: none">
                        <div class="popup-close" style="">X</div>
                    </div>

                </div>

                <img src="<?= $assetsUrl; ?>/join.png" alt="谢谢参与"
                     class="img-responsive center-block join" style="display: none">
                <img src="<?= $assetsUrl; ?>/rework.png" alt="再来一次" style="display: none"
                     class="img-responsive center-block recur">

            </div>

        </div>
    <?php }; ?>


    <!-- 结束 -->

    <div class="page7 page" style="opacity: 1">
        <img src="<?= $assetsUrl; ?>/logo.png" alt="logo" class="img-responsive logo">
        <img src="<?= $assetsUrl; ?>/last-page-title.png" alt="了解同仁堂阿胶" class="img-responsive center-block know">
        <img src="<?= $assetsUrl; ?>/last-page-img.png" alt="了解同仁堂阿胶" class="img-responsive center-block last-page-img">


        <img src="<?= $assetsUrl; ?>/scanLife.png" alt="了解同仁堂阿胶按钮"
             class="img-responsive center-block scanLife">
        <img src="<?= $assetsUrl; ?>/share.png" alt="分享到朋友圈" class="img-responsive center-block share">
        <div class="bg">
            <img src="<?= $assetsUrl; ?>/mask.png" alt="指向二维码" class="img-responsive show">
        </div>
    </div>
    <!-- 了解 -->
    <div class="page8 page" style="opacity: 0">
        <img src="<?= $assetsUrl; ?>/logo.png" alt="logo" class="img-responsive logo">
        <img src="<?= $assetsUrl; ?>/money.png" alt="分享二维码" class="img-responsive center-block ThinkChange">
        <img src="<?= $assetsUrl; ?>/money-text.png" alt="" class="img-responsive center-block money-text">
        <img src="<?= $assetsUrl; ?>/share.png" alt="分享到朋友圈" class="img-responsive center-block share">
        <div class="bg">
            <img src="<?= $assetsUrl; ?>/mask.png" alt="指向二维码" class="img-responsive show">
        </div>
    </div>


    <div id="arrow">
        <img src="<?= $assetsUrl; ?>/arrow.png" alt="">
    </div>

</div>

