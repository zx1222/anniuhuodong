// index 翻页效果
$(".wrapper").ready(
    function () {
        var nowpage1 = 0;
        $(".page1-photo").animate({"top": "0"}, 2000)
        //给class为container的容器加上触滑监听事件
        $(".wrapper").swipe(
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

                    if (nowpage1 > 4)//因本实例只有7张图片，所以当记数器大于7时令他返回7（从0开始记），避免溢出出错
                    {
                        nowpage1 = 4;
                        // self.location='campaign.html';
                    }

                    if (nowpage1 < 0)//道理同上
                    {
                        nowpage1 = 0;
                    }
                    if (nowpage1 == 0) {


                    }
                    if (nowpage1 == 1) {
                        $(".page2-photo-first").addClass('home-left-photo');
                        $(".page2-photo-last").addClass('home-right-photo');
                    }
                    if (nowpage1 == 2) {
                        $(".page3-photo-first").addClass('home-left-photo');
                        $(".page3-photo-last").addClass('home-right-photo');
                    }
                    if (nowpage1 == 3) {
                        $(".page4-photo-first").addClass('home-left-photo');
                        $(".page4-photo-last").addClass('home-right-photo');
                    }
                    if (nowpage1 ==4 ) {
$(".arrow").hide()
                    }


                    $(".wrapper").animate({"top": nowpage1 * -100 + "%"}, 400);//根据当前记数器滚动到相应的高度
                }
            }
        );
        // 帮助说明页隐藏显示
        $(".page11-help-ico").click(function () {
            $(".page11-help").show();
        });

        $(".page11-help-return").click(function () {
            $(".page11-help").hide();
        });

// 点击活动进入第二页


    }
);

//campaign 
$(".wrapper-campaign").ready(function () {
    var nowpage2 = 0;


    $(".page12-ok").click(function () {
        nowpage2 = 1;
        if ($("img#preview-old").length == 0) {
            $(".wrapper-campaign").animate({"top": nowpage2 * -100 + "%"}, 400)
        } else {
            alert('请点击加号,选择图片');
        }
    });

    $(".page13-ok").click(function () {
        nowpage2 = 2;
        if ($("img#preview-new").length == 0) {
            $(".wrapper-campaign").animate({"top": nowpage2 * -100 + "%"}, 400)
        } else {
            alert('请点击加号,选择图片');
        }
    });

    $(".page14-btn").click(function () {
        nowpage2 = 3;
    $(".upload-load").show();

    });

    $(".page15-help-close").click(function () {
        $(".page15-help").hide();
    });
});


//exhibition
$(".exhibition-main").ready(function () {

    $(".exhibition-no-ico").click(function () {
        $(".exhibition-no").hide();
    });

    $(".exhibition-no3-ico").click(function () {
        $(".exhibition-no3").hide();
    });

});

//share
$(".wrapper-share").ready(function () {
    var nowpage3 = 0;

});

//vote
$(".wrapper-vote").ready(function () {
    var nowpage5 = 0;


});

//turntable  lottery
$(".wrapper-turntable").ready(function () {


    $(".page31-no-ico").click(function () {
        $(".wrapper-turntable1").animate({"top": "-100%"}, 400)
    });
    $(".page32-prize-close").click(function () {
        $(".wrapper-turntable1").animate({"top": "-100%"}, 400)
    });
    $(".page41-btn-1").click(function () {

    });

    $(".page41-btn-3").click(function () {
        $(".page41-code").show();
    });
    $(".page41-code-close").click(function () {
        $(".page41-code").hide();
    });
});

// 分享遮罩
$(".page15-share").click(function(){
    $(".share-mask").show()
})
$(".page21-btn").click(function(){
    $(".share-mask").show()
})
$(".share-mask").click(function(){
    $(".share-mask").hide()
})

//加载完成后 显示页面
$(".main-center").ready(
    function () {
        $(".main-center").show();
        $(".u-pageLoading").hide();
    })


$(".photo-main").click(function () {
    $(".photo-main").css({
        "z-index": "99"
    });
    $(this).css({
        "z-index": "9999"
    });
})

//图片点击放大
$(".photo-main").click(function(){
    if($(this).hasClass("photo-click-main")){
        $(this).removeClass("photo-click-main")
        $(this).find("img").removeClass("photo-click-main-img")
    }
    else{
        $(this).addClass("photo-click-main")
        $(this).find("img").addClass("photo-click-main-img")
    }
})
    
