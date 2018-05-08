$(".wrapper").ready(
    function () {
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
                    }

                    if (nowpage > 6)//因本实例只有8张图片，所以当记数器大于8时令他返回7（从0开始记），避免溢出出错
                    {
                        nowpage = 6;
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

                    }

                    if (nowpage == 2) {
                        $("#arrow").hide();
                    }
                    if (nowpage == 3) {
                        nowpage = 2
                    }
                    if (nowpage == 4) {

                    }
                    if (nowpage == 5) {

                    }
                    if (nowpage == 6) {

                    }
                    if (nowpage == 7) {

                    }
                    $(".wrapper").animate({"top": nowpage * -100 + "%"}, 400);//根据当前记数器滚动到相应的高度
                    //了解安牛点击事件
                    $(".page7 .scanLife").click(function () {
                        $(".page8").animate({"opacity": 1}, 100);
                        $(".page7").hide();
                    })
                    // 点击开始答题
                    $(".page3 .begin-img").click(function () {
                        $(".page4").show();
                        $(".page3").hide();
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
                        sum = 0;
                        num = 0;
                    })

                    //点击分享出现遮罩层
                    $(".share").click(function () {
                        $(".bg").show();
                        $(".show").show();
                    })
                    $(".bg").click(function () {
                        $(".bg").hide();
                        $(".show").hide()
                        $(".page5 .no-lottery").animate({"opacity": 1}, 100);
                        $(".page6 .lottery").animate({"opacity": 1}, 100);
                    })

                    //每人每天活动超过两次之后关闭事件
                    $(".page5 .close").click(function () {
                        $(".page5").hide();
                        $(".page5 .no-lottery").animate({"opacity": 1}, 100);
                        $(".page7").show();
                    })
                    //刮开奖项之后的点击事件
                    $(".page6 .OK").click(function () {
                        $(".page6").hide();
                        $(".page6 .lottery").animate({"opacity": 1}, 100);
                        $(".page7").show();

                    })


                }
            }
        );


        //  十道题答题的点击事件  点击选择框隐藏第一题 显示第二道题
        var sum = 0;
        var num = 0;
        $(".answer_01 .checkbox label").change(function () {
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
            $(".answer_10").addClass("animated bounceOutLeft ");
            //答对五道题就可以抽奖  答错超过五道题就需要重新答题

            if (sum >= 5) {
                $(".page6").show();
                $(".page4").hide();
            } else {
                $(".page5").show();
                $(".page4").hide();

            }
        });


    }
);
