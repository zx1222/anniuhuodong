$(".wrapper").ready(
    function () {
        $(".u-pageLoading").hide();
        $(".wrapper").show();
        var nowpage = 0;

        setTimeout(function () {
            page2_bg()
        },1000)
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

                    }

                    if (nowpage > 2)//因本实例只有7张图片，所以当记数器大于7时令他返回7（从0开始记），避免溢出出错
                    {
                        nowpage = 2;
                    }

                    if (nowpage < 0)//道理同上
                    {
                        nowpage = 0;
                    }
                    if (nowpage == 0) {

                    }
                    if (nowpage == 1) {

                        page1();
                    }
                    if (nowpage == 2) {
                        $("#arrow").hide();
                    }
                    $(".wrapper").animate({"top": nowpage * -100 + "%"}, 400)//根据当前记数器滚动到相应的高度
                }
            })
    });

function page1(){
    setTimeout(function () {
        $(".page1_niu1").animate({"left":"10.44vh"},400);
        $(".page1_niu2").animate({"right":"10.44vh"},800);
    },400)
    setTimeout(function () {
        $(".page1_ling").animate({"top":"39vh","opacity":"1"},800);
    },800)
}
function page2_bg(){
    setTimeout(function () {
        $(".page2_house").animate({"left":"0"},400);
        $(".page2_tree").animate({"left":"27vh"},800);
        $(".page2_yun").animate({"opacity":"1"},800);
        $(".page2_green").animate({"opacity":"1"},1000);
    },400)
    setTimeout(function () {
        $(".page2_nv1").animate({"left":"5.06vh"},400);
    },1400)
    setTimeout(function () {
        $(".page2_text1").animate({"opacity":"1"},600);
    },1800)
    setTimeout(function () {
        $(".page2_nan1").animate({"right":"5.06vh"},600);
    },2400)
    setTimeout(function () {
        $(".page2_text2").animate({"opacity":"1"},600);
    },3000)
    setTimeout(function () {
        $(".page2_text1").animate({"opacity":"0"},400);
        $(".page2_text2").animate({"opacity":"0"},400);


    },4200)

    setTimeout(function () {
        $(".page2_nv1").animate({"opacity":"0"},400);
        $(".page2_text0").animate({"opacity":"1"},600);
        $(".page2_nv2").animate({"opacity":"1"},400);

    },4600)
    setTimeout(function () {
        $(".page2_text0").animate({"opacity":"0"},400);
        $(".page2_nan1").animate({"opacity":"0"},400);
        $(".page2_nan2").animate({"opacity":"1"},400);
        $(".page2_text8").animate({"opacity":"1"},400);
    },6100)
    setTimeout(function () {

        $(".page2_text7").animate({"opacity":"1"},400);
    },6500)
    setTimeout(function () {

        $(".page2_text6").animate({"opacity":"1"},400);
    },6900)
    setTimeout(function () {

        $(".page2_text5").animate({"opacity":"1"},400);
    },7300)
    setTimeout(function () {

        $(".page2_text4").animate({"opacity":"1"},400);
    },7700)
    setTimeout(function () {
        $(".page2_text3").animate({"opacity":"1"},400);
    },8100)


    setTimeout(function () {
        $(".page2_nv2").animate({"opacity":"0"},400);
        $(".page2_nv3").animate({"opacity":"1"},400);
        $(".page2_text9").animate({"opacity":"1"},400);
        $(".page2_text3").animate({"opacity":"0"},400);
        $(".page2_text4").animate({"opacity":"0"},400);
        $(".page2_text5").animate({"opacity":"0"},400);
        $(".page2_text6").animate({"opacity":"0"},400);
        $(".page2_text7").animate({"opacity":"0"},400);
        $(".page2_text8").animate({"opacity":"0"},400);
    },10500)
    setTimeout(function () {
        $(".page2_nan2").animate({"opacity":"0"},400);
        $(".page2_nan3").animate({"opacity":"1"},400);

    },11800)
    setTimeout(function () {
        $(".page2_text10").animate({"opacity":"1"},400);
    },12800)
    setTimeout(function () {
        $(".page2_nv3").animate({"opacity":"0"},400);
        $(".page2_text9").animate({"opacity":"0"},400);
        $(".page2_nan3").animate({"opacity":"0"},400);
        $(".page2_text10").animate({"opacity":"0"},400);
        $(".page2_green").animate({"opacity":"0"},400);
    },14500)
    setTimeout(function () {

        $(".page2_green").animate({"left":"40%","opacity":"1"},400);
    },14900)
    setTimeout(function () {

        $(".page2_nan4").animate({"right":"0"},1000);
    },15500)
    setTimeout(function () {

        $(".page2_text11").animate({"opacity":"1"},400);
    },17100)
}


// 規則説明
$(".page1_detail_btn").click(function () {
    $(".logo").hide();
    $("#arrow").hide();
    $(".page1_main").hide();
    $(".page1_detail_main").show();
});

$(".page1_detail_return img").click(function () {
    $(".logo").show();
    $("#arrow").show();
    $(".page1_main").show();
    $(".page1_detail_main").hide();
});

// 關閉獎品
$(".page4_modal_off").click(function () {
    $(".page5").hide();
    $(".page_lottery").hide();
    $(".page6").show();
})
// 了解安牛
$(".page6_btn_anniu").click(function () {
    $(".page6_main").hide();
    $(".page6_modal").show();
});
$(".page6_btn_share").click(function () {
    $(".page6_modal_share").show();
});

// 已抽奖弹窗关闭
$(".page6 .page4_modal_off").click(function(){
       $(".page6_modal_no").hide();
})

$("#duang").click(function(){
    MtaH5.clickStat('choujiang',{'write':'true'});
})
$(".page3_bottom").click(function(){
    MtaH5.clickStat('liuyan',{'write':'true'})
})