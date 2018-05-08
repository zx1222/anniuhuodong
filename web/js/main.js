$(".wrapper").ready(
    function () {
        var nowpage1 = 0;
        var tpage = $(".wrapper .page");
        var pagenum = tpage.length - 1;
        setTimeout(function () {
            $(".page1 .page-text").css({
                "opacity": "1",
            })
        }, 400)
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
                    if (nowpage1 == 1) {
                        setTimeout(function () {
                            $(".page2 .page-text").css({
                                "opacity": "1",
                            })
                        }, 400)
                    }
                    if (nowpage1 == 2) {
                        setTimeout(function () {
                            $(".page3 .page-text").css({
                                "opacity": "1",
                            })
                        }, 400)
                    }
                    if (nowpage1 == 3) {
                        setTimeout(function () {
                            $(".page4 .page-text").css({
                                "opacity": "1",
                            })
                        }, 400)
                    }
                    if (nowpage1 == 4) {
                        setTimeout(function () {
                            $(".page5 .page-text").css({
                                "opacity": "1",
                            })
                        }, 400)
                    }
                    if (nowpage1 == 5) {
                        setTimeout(function () {
                            $(".page6 .page-text").css({
                                "opacity": "1",
                            })
                        }, 400)
                    }
                    if (nowpage1 == 6) {
                        setTimeout(function () {
                            $(".page7 .page-text").css({
                                "opacity": "1",
                            })
                        }, 400)

                    } else {

                    }
                    if (nowpage1 == 7) {


                    } else {

                    }
                    $(".wrapper").animate({"top": nowpage1 * -100 + "%"}, 400);//根据当前记数器滚动到相应的高度
                }
            }
        );
    }
);

$(".wrapper-answer").ready(
    function () {
        var nowpage = 0;
        //给class为container的容器加上触滑监听事件
        $(".wrapper-answer").swipe(
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

                    if (nowpage > 11)//因本实例只有7张图片，所以当记数器大于7时令他返回7（从0开始记），避免溢出出错
                    {
                        nowpage = 11;
                    }

                    if (nowpage < 0)//道理同上
                    {
                        nowpage = 0;
                    }

                    if (nowpage == 0) {

                    } else {

                    }
                    if (nowpage == 1) {
                    }
                    else {

                    }
                    if (nowpage == 2) {
                    }
                    else {

                    }
                    if (nowpage == 3) {
                    }
                    else {
                    }
                    if (nowpage == 4) {

                    } else {

                    }
                    if (nowpage == 5) {

                    } else {

                    }
                    if (nowpage == 6) {


                    } else {

                    }
                    if (nowpage == 7) {


                    } else {

                    }
                    if (nowpage == 8) {


                    } else {

                    }
                    if (nowpage == 9) {


                    } else {

                    }
                    if (nowpage == 10) {


                    } else {

                    }
                    if (nowpage == 11) {

                            var form = $('form#form');
                        // submit form
                        $.ajax({
                            url: form.attr('action'),
                            type: 'post',
                            data: form.serialize(),
                            success: function (response) {
                                // do something with response
                            }
                        });


                    } else {

                    }
                    if (nowpage == 12) {

                    } else {

                    }
                    $(".wrapper-answer").animate({"top": nowpage * -100 + "%"}, 400);//根据当前记数器滚动到相应的高度
                }
            }
        );
    }
);
$(".main-center").ready(
    function () {
        $(".main-center").show();
        $(".u-pageLoading").hide();
    })

// function hanswer(){
//  var tradio=$(".wrapper-answer .radio");
//   var tshare=$(".share div");
//  for (var i =0;i< tradio.length;i++) {
//      var tradioinput=tradio.eq(i).find("input");
//      for (var j =0;j< tradioinput.length;j++) {
//             if (tradioinput.eq(j):checked) {
//               var tjradio = tradioinput.eq(j).val();
//             }
//      }
// tshare.eq(i).find(".share-text").text(tjradio);

//  }
// }