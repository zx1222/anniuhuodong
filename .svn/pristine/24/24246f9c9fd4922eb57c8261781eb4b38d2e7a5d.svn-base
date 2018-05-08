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
use app\modules\chongyang\Asset;

$this->render('/layouts/_jsapi-share');
$ajaxUrl = Url::to(['lottery-run'], true);
$ajaxCallbackUrl = Url::to(['callback'], true);

$assetsUrl = Asset::getAssetUrl('images');
$imgUrl = Url::to('@web/img', true);
$this->title = '重阳节诗词大会';
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
        $(".wrapper").swipe(
            {
                swipe: function (event, direction, distance, duration, fingerCount) {//事件，方向，距离（像素为单位），时间，手指数量
                    if (direction == "up")//当向上滑动手指时令当前页面记数器加1
                    {
                        nowpage = nowpage + 1;
                    }
                    else if (direction == "down")//当向下滑动手指时令当前页面记数器减1
                    {
                        nowpage = nowpage - 1;
                         if (nowpage == 1) {
                           nowpage = 2
                        }
                    }

                    if (nowpage > 3)//因本实例只有8张图片，所以当记数器大于8时令他返回7（从0开始记），避免溢出出错
                    {
                        nowpage = 3;
                    }

                    if (nowpage < 0)//道理同上
                    {
                        nowpage = 0;
                    }
                    if (nowpage == 0) {
                        $("#arrow").show();
                    }
                    if (nowpage == 1) {
                        $("#arrow").show();
                       setTimeout(function () {
                            $(".page2 .barrow_1").animate({"opacity": 1}, 100);

                        }, 500)
                       setTimeout(function () {
                            $(".page2 .barrow_2").animate({"opacity": 1}, 100);

                        }, 1000)
                       setTimeout(function () {
                            $(".page2 .barrow_3").animate({"opacity": 1}, 100);

                        }, 1500)
                       setTimeout(function () {
                            $(".page2 .peach").animate({"opacity": 1}, 200);

                        }, 2000)
                       setTimeout(function () {
                            $(".page2 .beautiful").animate({"opacity": 1}, 100);

                        }, 2500)
                       setTimeout(function () {
                            $(".page2 .niu").animate({"opacity": 1}, 100);

                        }, 3000)

                       setTimeout(function () {
                            $(".page2 .wasai").animate({"opacity": 1}, 100);

                        }, 3500)

                       setTimeout(function () {
                            $(".page2 .pretty").animate({"opacity": 1}, 100);

                        }, 4000)

                       setTimeout(function () {
                            $(".page2 .drunk").animate({"opacity": 1}, 100);

                        }, 4500)
                       setTimeout(function () {
                            $(".page2 .peach").animate({"opacity": 0}, 0);
                            $(".page2 .beautiful").animate({"opacity": 0}, 100);
                            $(".page2 .niu").animate({"opacity": 0}, 100);
                            $(".page2 .wasai").animate({"opacity": 0}, 100);
                            $(".page2 .pretty").animate({"opacity": 0}, 100);
                            $(".page2 .drunk").animate({"opacity": 0}, 100);
                            $(".page2 .notext").animate({"opacity": 1}, 100);
                            $(".page2 .sweat").animate({"opacity": 1}, 200);

                        }, 5700)
                        prot=setTimeout(function () {
                          
                            $(".page2 .sweat").animate({"opacity": 0}, 100);
                            $(".page2 .notext").animate({"opacity": 0}, 100);
                            $(".page2 .page-img").animate({"opacity": 1}, 200);

                            $(".page2 .prot").animate({width: "90%"}, 5000);


                        }, 6800)

                    } else {
                       
                       $(".page2 .prot").animate({width: "0%"}, 0);
                        $(".page2 .barrow_1").animate({"opacity": 0}, 0);
                        $(".page2 .barrow_2").animate({"opacity": 0}, 0);
                        $(".page2 .barrow_3").animate({"opacity": 0}, 0);
                        $(".page2 .person").animate({"opacity": 1}, 0);
                        $(".page2 .peach").animate({"opacity": 0}, 0);
                        $(".page2 .beautiful").animate({"opacity": 0}, 0);
                        $(".page2 .niu").animate({"opacity": 0}, 0);
                        $(".page2 .wasai").animate({"opacity": 0}, 0);
                        $(".page2 .pretty").animate({"opacity": 0}, 0);
                        $(".page2 .drunk").animate({"opacity": 0}, 0);
           
                        $(".page2 .notext").animate({"opacity": 0}, 0);
                        $(".page2 .sweat").animate({"opacity": 0}, 0);
      
                        
                       
                    }

                    if (nowpage == 2) {
                        $("#arrow").hide();
                       
                    }
                    if (nowpage == 3) {
                        nowpage = 2
                    }
                    $(".wrapper").animate({"top": nowpage * -100 + "%"}, 400);//根据当前记数器滚动到相应的高度
                    //了解安牛点击事件
                    $(".page7 .scanLife").click(function () {
                        $(".page8").animate({"opacity": 1}, 100);
                        $(".page7").hide();
                    })
                    // 点击开始答题
                    $(".page3 .begin-img").unbind('click').click(function () {
                        $(".page4").show();
                        $(".page3").hide();
                        pk();
                    })
                    // 答错超过五道题，再来一次。
                    $(".rework").click(function () {
                        $(".page4").show();
                        $(".page5").hide();
                        $(".page6").hide();
                        $(".page4 > div").removeClass("animated bounceOutLeft");
                        $("[type='checkbox']").removeAttr("checked");//取消全选
                        $(".answer_02").hide();
                        $(".answer_03").hide();
                        $(".answer_04").hide();
                        $(".answer_05").hide();
                        $(".answer_06").hide();
                        $(".answer_07").hide();
                        $(".answer_08").hide();
                        $(".answer_09").hide();
                        $(".answer_10").hide();
                        $("#yes").text("0");
                        $("#no").text("0");
                      
                    })
                    //机会用完点击关闭了解安牛
                    $(".page3 .close").click(function() {
                      $(".page3").hide();
                      $(".page7").show();
                    })
                   

                    //点击分享出现遮罩层
                    $(".share").click(function () {
                        $(".bg").show();
                        $(".show").show();
                    })
                    // $(".bg").click(function () {
                    //     $(".bg").hide();
                    //     $(".show").hide()
                    //     $(".page5 .no-lottery").animate({"opacity": 1}, 100);
                    //     $(".page6 .lottery").animate({"opacity": 1}, 100);
                    // })

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
        $(".answer_01 .checkbox label").change(function () {
            console.log(1);
            // 答题左侧消失样式
            $(".answer_01").addClass("animated bounceOutLeft ");
            $(".answer_02").show(500);

            //  判断答对数字显示，答错数字
            if ($(this).find("input").hasClass("true")) {

                sum = sum + 1;
             
                $("#yes").text(sum);
            } else {
                      

                num = num + 1;
                $("#no").text(num);
            }


        });
        $(".answer_02 .checkbox label").change(function () {
            $(".answer_02").addClass("animated bounceOutLeft ");
            $(".answer_03").show(500);
            //  判断答对数字显示，答错数字
            if ($(this).find("input").hasClass("true")) {
                sum = sum + 1;
                $("#yes").text(sum);
            } else {
                num = num + 1;
                $("#no").text(num);
            }
        });
        $(".answer_03 .checkbox label").change(function () {
            $(".answer_03").addClass("animated bounceOutLeft ");
            $(".answer_04").show(500);
            //  判断答对数字显示，答错数字
            if ($(this).find("input").hasClass("true")) {
                sum = sum + 1;
                $("#yes").text(sum);
            } else {
                num = num + 1;
                $("#no").text(num);
            }
        });
        $(".answer_04 .checkbox label").change(function () {
            $(".answer_04").addClass("animated bounceOutLeft ");
            $(".answer_05").show(500);
            //  判断答对数字显示，答错数字
            if ($(this).find("input").hasClass("true")) {
                sum = sum + 1;
                $("#yes").text(sum);
            } else {
                num = num + 1;
                $("#no").text(num);
            }
        });
        $(".answer_05 .checkbox label").change(function () {
            $(".answer_05").addClass("animated bounceOutLeft ");
            $(".answer_06").show(500);
            //  判断答对数字显示，答错数字
            if ($(this).find("input").hasClass("true")) {
                sum = sum + 1;
                $("#yes").text(sum);
            } else {
                num = num + 1;
                $("#no").text(num);
            }
        });
        $(".answer_06 .checkbox label").change(function () {
            $(".answer_06").addClass("animated bounceOutLeft ");
            $(".answer_07").show(500);
            //  判断答对数字显示，答错数字
            if ($(this).find("input").hasClass("true")) {
                sum = sum + 1;
                $("#yes").text(sum);
            } else {
                num = num + 1;
                $("#no").text(num);
            }
        });
        $(".answer_07 .checkbox label").change(function () {
            $(".answer_07").addClass("animated bounceOutLeft ");
            $(".answer_08").show(500);
            //  判断答对数字显示，答错数字
            if ($(this).find("input").hasClass("true")) {
                sum = sum + 1;
                $("#yes").text(sum);
            } else {
                num = num + 1;
                $("#no").text(num);
            }
        });
        $(".answer_08 .checkbox label").change(function () {
            $(".answer_08").addClass("animated bounceOutLeft ");
            $(".answer_09").show(500);
            //  判断答对数字显示，答错数字
            if ($(this).find("input").hasClass("true")) {
                sum = sum + 1;
                $("#yes").text(sum);
            } else {
                num = num + 1;
                $("#no").text(num);
            }
        });
        $(".answer_09 .checkbox label").change(function () {
            $(".answer_09").addClass("animated bounceOutLeft ");
            $(".answer_10").show(500);
            //  判断答对数字显示，答错数字
            if ($(this).find("input").hasClass("true")) {
                sum = sum + 1;
                $("#yes").text(sum);
            } else {
                num = num + 1;
                $("#no").text(num);
            }
        });
        $(".answer_10 .checkbox label").change(function () {
            console.log(10);
            $(".answer_10").addClass("animated bounceOutLeft ");
            //  判断答对数字显示，答错数字
            if ($(this).find("input").hasClass("true")) {
                sum = sum + 1;
                if(sum!=10){
                $("#yes").text(sum);
                }else{
                    $("#yes").text(9);
                }
                 
            } else {
                num = num + 1;
                $("#no").text(num);
            }
          
            
             //答对五道题就可以抽奖  答错超过五道题就需要重新答题
               
            if (sum >= 5) {
                $(".page6").show();
                $(".page4").hide();
                run();
            } else {
                $(".page5").show();
                $(".page4").hide();

            }
           
            
            setTimeout(function() {
              sum=0;
              num=0;
            },500)
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
            // alert('Sorry，出错了！');
            return false;
        },
        success: function (data) {
            prize = data.id;
            img = '{$imgUrl}/' + data.praisecontent;
            
            var lottery = new Lottery('lotteryContainer', '{$imgUrl}/scrape.png', 'image', 270, 60, drawPercent);
            lottery.init(img, 'image');
            var callback_lock = 0;
            function drawPercent(percent) {
               if(percent>50 && callback_lock == 0){
                   callback_lock = 1;
                    cool();
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

<div class="page-logo">
    <img src="<?= $assetsUrl; ?>/logo.png" alt="logo" class="img-responsive logo">
</div>
<div class="wrapper">
    <div class="page1 page">
        <img src="<?= $assetsUrl; ?>/home.png" alt="首页" class="img-responsive page-img ">
    </div>
    <div class="page2 page">

        <img src="<?= $assetsUrl; ?>/2.jpg" alt="第二个页面" class="img-responsive page-img"
             style="position: absolute">
        <img src="<?= $assetsUrl; ?>/2.0.png" alt="初始人物" class="img-responsive page-img person">
        <img src="<?= $assetsUrl; ?>/barrow_1.png" alt="第一个山" class="img-responsive page-img barrow_1"
             style="opacity: 0">
        <img src="<?= $assetsUrl; ?>/barrow_2.png" alt="第二个山" class="img-responsive page-img barrow_2"
             style="opacity: 0">
        <img src="<?= $assetsUrl; ?>/barrow_3.png" alt="第三个山" class="img-responsive page-img barrow_3"
             style="opacity: 0">
        <img src="<?= $assetsUrl; ?>/2.1.png" alt="桃花眼" class="img-responsive peach"
             style="opacity: 0">
        <img src="<?= $assetsUrl; ?>/2.2.png" alt="美景" class="img-responsive beautiful"
             style="opacity: 0">
        <img src="<?= $assetsUrl; ?>/2.3.png" alt="牛" class="img-responsive niu" style="opacity: 0">
        <img src="<?= $assetsUrl; ?>/2.4.png" alt="哇塞" class="img-responsive wasai" style="opacity: 0">
        <img src="<?= $assetsUrl; ?>/2.5.png" alt="美呆" class="img-responsive pretty"
             style="opacity: 0">
        <img src="<?= $assetsUrl; ?>/2.6.png" alt="醉了" class="img-responsive drunk" style="opacity: 0">
        <img src="<?= $assetsUrl; ?>/2.7_1.png" alt="没词了" class="img-responsive notext"
             style="opacity: 0">
        <img src="<?= $assetsUrl; ?>/2.7_2.png" alt="表情图" class="img-responsive sweat"
             style="opacity: 0">
        <div class="prot">
            <img src="<?= $assetsUrl; ?>/2.text.png" alt="诗词图" class="img-responsive protry">
        </div>
    </div>
    <?php if ($ending == true) { ?>
        <!-- 机会用完 -->
        <div class="page3 page">
            <img src="<?= $assetsUrl; ?>/ending.png" alt="活动结束"
                 class="img-responsive center-block over">
            <img src="<?= $assetsUrl; ?>/close.jpg" alt="关闭" class="img-responsive center-block close">
        </div>

        <?php if ($forbidden == true) { ?>
            <!-- 机会用完 -->
            <div class="page3 page">
                <img src="<?= $assetsUrl; ?>/over.png" alt="活动次数用完"
                     class="img-responsive center-block over">
                <img src="<?= $assetsUrl; ?>/close.jpg" alt="关闭" class="img-responsive center-block close">
            </div>
        <?php } else { ?>
            <!-- 答题 -->

            <div class="page3 page">
                <img src="<?= $assetsUrl; ?>/3.png" alt="第三个页面" class="img-responsive page-img begin-img">
                <img src="<?= $assetsUrl; ?>/begin.png" alt="开始答题" class="img-responsive begin">
            </div>
            <div class="page4 page" style="display: none">
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
                <img src="<?= $assetsUrl; ?>/answer_bg.png" alt="答题背景" class="img-responsive answer_bg">
                <div class="answer_10" style="display: none">
                    <img src="<?= $assetsUrl; ?>/answer_10.png" alt="答题第十题"
                         class="img-responsive center-block answer_img">
                    <div class="checkbox">
                        <label class="label_first">
                            <input type="checkbox">
                            <img src="<?= $assetsUrl; ?>/answer_10_1.png" alt="选项一"
                                 class="img-responsive center-block">
                        </label>
                        <label>
                            <input type="checkbox" class="true">
                            <img src="<?= $assetsUrl; ?>/answer_10_2.png" alt="选项二"
                                 class="img-responsive center-block">
                        </label>
                    </div>
                </div>
                <div class="answer_09" style="display: none">
                    <img src="<?= $assetsUrl; ?>/answer_09.png" alt="答题第九题"
                         class="img-responsive center-block answer_img">
                    <div class="checkbox">
                        <label class="label_first">
                            <input type="checkbox" class="true">
                            <img src="<?= $assetsUrl; ?>/answer_09_1.png" alt="选项一"
                                 class="img-responsive center-block">
                        </label>
                        <label>
                            <input type="checkbox">
                            <img src="<?= $assetsUrl; ?>/answer_09_2.png" alt="选项二"
                                 class="img-responsive center-block">
                        </label>
                    </div>
                </div>
                <div class="answer_08" style="display: none">
                    <img src="<?= $assetsUrl; ?>/answer_08.png" alt="答题第八题"
                         class="img-responsive center-block answer_img">
                    <div class="checkbox">
                        <label class="label_first">
                            <input type="checkbox" class="true">
                            <img src="<?= $assetsUrl; ?>/answer_08_1.png" alt="选项一"
                                 class="img-responsive center-block">
                        </label>
                        <label>
                            <input type="checkbox">
                            <img src="<?= $assetsUrl; ?>/answer_08_2.png" alt="选项二"
                                 class="img-responsive center-block">
                        </label>
                    </div>
                </div>
                <div class="answer_07" style="display: none">
                    <img src="<?= $assetsUrl; ?>/answer_07.png" alt="答题第七题"
                         class="img-responsive center-block answer_img">
                    <div class="checkbox">
                        <label class="label_first">
                            <input type="checkbox" class="true">
                            <img src="<?= $assetsUrl; ?>/answer_07_1.png" alt="选项一"
                                 class="img-responsive center-block">
                        </label>
                        <label>
                            <input type="checkbox">
                            <img src="<?= $assetsUrl; ?>/answer_07_2.png" alt="选项二"
                                 class="img-responsive center-block">
                        </label>
                    </div>
                </div>
                <div class="answer_06" style="display: none">
                    <img src="<?= $assetsUrl; ?>/answer_06.png" alt="答题第六题"
                         class="img-responsive center-block answer_img">
                    <div class="checkbox">
                        <label class="label_first">
                            <input type="checkbox" class="true">
                            <img src="<?= $assetsUrl; ?>/answer_06_1.png" alt="选项一"
                                 class="img-responsive center-block">
                        </label>
                        <label>
                            <input type="checkbox">
                            <img src="<?= $assetsUrl; ?>/answer_06_2.png" alt="选项二"
                                 class="img-responsive center-block">
                        </label>
                    </div>
                </div>
                <div class="answer_05" style="display: none">
                    <img src="<?= $assetsUrl; ?>/answer_05.png" alt="答题第五题"
                         class="img-responsive center-block answer_img">
                    <div class="checkbox">
                        <label class="label_first">
                            <input type="checkbox">
                            <img src="<?= $assetsUrl; ?>/answer_05_1.png" alt="选项一"
                                 class="img-responsive center-block">
                        </label>
                        <label>
                            <input type="checkbox" class="true">
                            <img src="<?= $assetsUrl; ?>/answer_05_2.png" alt="选项二"
                                 class="img-responsive center-block">
                        </label>
                    </div>
                </div>
                <div class="answer_04" style="display: none">
                    <img src="<?= $assetsUrl; ?>/answer_04.png" alt="答题第四题"
                         class="img-responsive center-block answer_img">
                    <div class="checkbox">
                        <label class="label_first">
                            <input type="checkbox">
                            <img src="<?= $assetsUrl; ?>/answer_04_1.png" alt="选项一"
                                 class="img-responsive center-block">
                        </label>
                        <label>
                            <input type="checkbox" class="true">
                            <img src="<?= $assetsUrl; ?>/answer_04_2.png" alt="选项二"
                                 class="img-responsive center-block">
                        </label>
                    </div>
                </div>
                <div class="answer_03" style="display: none">
                    <img src="<?= $assetsUrl; ?>/answer_03.png" alt="答题第三题"
                         class="img-responsive center-block answer_img">
                    <div class="checkbox">
                        <label class="label_first">
                            <input type="checkbox" class="true">
                            <img src="<?= $assetsUrl; ?>/answer_03_1.png" alt="选项一"
                                 class="img-responsive center-block">
                        </label>
                        <label>
                            <input type="checkbox">
                            <img src="<?= $assetsUrl; ?>/answer_03_2.png" alt="选项二"
                                 class="img-responsive center-block">
                        </label>
                    </div>
                </div>
                <div class="answer_02" style="display: none">
                    <img src="<?= $assetsUrl; ?>/answer_02.png" alt="答题第二题"
                         class="img-responsive center-block answer_img">
                    <div class="checkbox">
                        <label class="label_first">
                            <input type="checkbox">
                            <img src="<?= $assetsUrl; ?>/answer_02_1.png" alt="选项一"
                                 class="img-responsive center-block">
                        </label>
                        <label>
                            <input type="checkbox" class="true">
                            <img src="<?= $assetsUrl; ?>/answer_02_2.png" alt="选项二"
                                 class="img-responsive center-block">
                        </label>
                    </div>
                </div>
                <div class="answer_01">
                    <img src="<?= $assetsUrl; ?>/answer_01.png" alt="答题第一题"
                         class="img-responsive center-block answer_img">
                    <div class="checkbox">
                        <label class="label_first">
                            <input type="checkbox" class="true">
                            <img src="<?= $assetsUrl; ?>/answer_01_1.png" alt="选项一"
                                 class="img-responsive center-block">
                        </label>
                        <label>
                            <input type="checkbox">
                            <img src="<?= $assetsUrl; ?>/answer_01_2.png" alt="选项二"
                                 class="img-responsive center-block">
                        </label>
                    </div>
                </div>
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
            <img src="<?= $assetsUrl; ?>/lottery.png" alt="可以抽奖"
                 class="img-responsive center-block lottery">
            <img src="<?= $assetsUrl; ?>/two.png" alt="活动规则"
                 class="img-responsive center-block activity">
            <div style="position: absolute; bottom: 10vh;width:270px; left:0; right:0;margin: auto">
                <div id="lotteryContainer" style="position:relative;width: 270px;height:60px;"></div>
            </div>
            <div class="popup">
                <div class="mask"></div>
                <div class="receive-money">
                    <div style="position: relative">
                        <img src="<?= $assetsUrl; ?>/money.png?v=1501" alt="红包到账"
                             class="img-responsive center-block money" style="display: none">
                        <div class="popup-close" style="">X</div>
                    </div>

                </div>

<!--                <img src="--><?//= $assetsUrl; ?><!--/OK.jpg" alt="确定" style="display: none" class="img-responsive center-block OK">-->
                <img src="<?= $assetsUrl; ?>/join.png" alt="谢谢参与"
                     class="img-responsive center-block join" style="display: none">
                <img src="<?= $assetsUrl; ?>/onemoretime.png" alt="再来一次" style="display: none" class="img-responsive center-block recur">

                </div>

            </div>
        <?php }; ?>
    <?php }; ?>

    <!-- 结束 -->

    <div class="page7 page" style="opacity: 1">
        <img src="<?= $assetsUrl; ?>/know.png" alt="了解安牛" class="img-responsive center-block know">
        <img src="<?= $assetsUrl; ?>/scanLife.png" alt="了解安牛按钮"
             class="img-responsive center-block scanLife">
        <img src="<?= $assetsUrl; ?>/share.png" alt="分享到朋友圈" class="img-responsive center-block share">
        <div class="bg">
            <img src="<?= $assetsUrl; ?>/mask.png" alt="指向二维码" class="img-responsive show">
        </div>
    </div>
    <!-- 了解 -->
    <div class="page8 page" style="opacity: 0">
        <img src="<?= $assetsUrl; ?>/ThinkChange_bg.png" alt="分享二维码背景"
             class="img-responsive center-block ThinkChange_bg">
        <img src="<?= $assetsUrl; ?>/ThinkChange.png" alt="分享二维码"
             class="img-responsive center-block ThinkChange">
        <img src="<?= $assetsUrl; ?>/share.png" alt="分享到朋友圈" class="img-responsive center-block share">
        <div class="bg">
            <img src="<?= $assetsUrl; ?>/mask.png" alt="指向二维码" class="img-responsive show">
        </div>
    </div>


    <div id="arrow">
        <img src="<?= $assetsUrl; ?>/arrow.png" alt="">
    </div>

</div>

