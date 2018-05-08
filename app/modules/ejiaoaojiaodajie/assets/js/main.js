
$(".wrapper").ready(
    function () {
        //内容加载之后隐藏加载动画,显示内容
        $(".u-pageLoading").hide();
        $(".wrapper").show();

        // 活动规则
        $(".page1 .activity-info .close").click(function () {
            $(".page1 .activity-info").hide();
            $(".page1 .mask").hide();
            $(".page1 .ejiaodajie-icon").addClass("animated fadeInLeft")
        })


        //点击去中红包
        $(".page5 .close-two").click(function () {
            $(".page9").show();
            $(".page5").hide();
        });
        //点击去填写寄货地址
        $(".page6 .writeaddress").click(function () {
            $(".page7").show();
            $(".page6").hide();
        });
        //提交
        $(".page7 .address-content .Submit").click(function () {

            $('form#winform').on('beforeSubmit', function (e) {
                var $form = $(this);
                $.ajax({
                    url: $form.attr('action'),
                    type: 'post',
                    data: $form.serialize(),
                    success: function (data) {
                        $(".page8").show();
                        $(".page7").hide();
                    }
                });
            }).on('submit', function (e) {
                e.preventDefault();
            });
        });

        //点击了解阿胶
        $(".page8 .close-two").click(function () {
            $(".page9").show();
            $(".page8").hide();
        });
        // 点击去分享页面
        //点击去中红包
        $(".page10 .close-two").click(function () {
            $(".page9").show();
            $(".page10").hide();
        });
        //点击右上角分享页面
        $(".page9 .share").click(function () {
            $(".mask").show();
            $(".share-bg").show();
        });
        //点击去掉遮罩和分享背景图
        $(".page9 .mask").click(function () {
            $(".mask").hide();
            $(".share-bg").hide();
        });
        $(".page9 .share-bg").click(function () {
            $(".mask").hide();
            $(".share-bg").hide();
        });
        // 次数用完,点击去分享页面
        //点击去中红包
        $(".page3-2 .bt-close").click(function () {
            $(".page9").show();
            $(".page3-2").hide();
        });
    }
);

var rotateHTML5 = function (limit) {
    var reg = /(rotate\([\-\+]?((\d+)(deg))\))/i;
    var wt = div.style['-webkit-transform'], wts = wt.match(reg);
    var $2 = RegExp.$2;
    console.log($2);
    div.style['-webkit-transform'] = wt.replace($2, parseFloat(RegExp.$3) + limit + RegExp.$4);
}

var rotateIE = function (obj) {
    var d = !!obj.d ? obj.d : 1;
    var r = d * Math.PI / 180;
    costheta = Math.cos(r);
    sintheta = Math.sin(r);
    obj.style.filter = "progid:DXImageTransform.Microsoft.Matrix()";
    var item = obj.filters.item(0);
    var width = obj.clientWidth;
    var height = obj.clientHeight;
    item.DX = -width / 2 * costheta + height / 2 * sintheta + width / 2;
    item.DY = -width / 2 * sintheta - height / 2 * costheta + height / 2;
    item.M11 = costheta;
    item.M12 = -sintheta;
    item.M21 = sintheta;
    item.M22 = costheta;
    obj.timer = setTimeout(function () {
        var dx = d + 1;
        dx = dx > 360 ? 1 : dx;
        obj.d = dx;
        rotate(obj, dx);
    }, 30);
};

var start = function () {
    if (!!div.interval) {
        clearInterval(div.interval);
        delete div.interval;
    }
    else {
        div.interval = setInterval(function () {
            /.*webkit.*/i.test(navigator.userAgent) ? rotateHTML5(1) : rotateIE(div);
        }, 30);
    }
}

var aabb = document.getElementById('audio-main');
$(".u-audio-suspend").click(function () {
    $(this).hide()
    $(".u-audio-play").show()
    aabb.pause();
    start();

})
$(".u-audio-play").click(function () {
    $(this).hide()
    $(".u-audio-suspend").show()
    aabb.play();
    start();

})