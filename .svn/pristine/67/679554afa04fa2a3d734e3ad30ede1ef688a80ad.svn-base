$(function () {
    function orientationfn() {
        setTimeout(function () {
            var html = document.documentElement;
            var w = html.clientWidth,
                h = html.clientHeight;
            if (h < w) {
                swal({
                    title: "竖屏显示效果更好哦!",
                    text: "我将会在2s内关闭.",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        }, 200);
    }
    window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", orientationfn, false);

    orientationfn();


    //  页面中点击事件
    var exhibition_url = $('#exhibition').attr('data-url');
    //    上传照片后跳转至照片详情页
    $('.btn-confirm').on('click', function () {
        $(this).parent('.shade-audit').hide();
    });
    $('.btn-all').on('click', function () {
        window.location.href = exhibition_url
    });

    //    召唤亲友团
    $('.btn-call').on('click', function () {
        $('.shade-share').show();
    });

    $('.photo-box').on('click', function () {
        window.location.href = 'photo.html';
    });

    //    关闭按钮
    $('.btn-close').on('click', function () {
        $(this).parent('.shade').hide();
    });

    //    点击任意位置分享遮罩隐藏
    $('.shade-share').click(function () {
        $(".shade-share").hide();
    });

    //防止键盘把当前输入框给挡住
    var winHeight = $(window).height();
    $(window).resize(function () {
        var thisHeight = $(this).height();
        if (winHeight - thisHeight > 50) {
            $(this).parent('form').css({
                'margin-top': '8%'
            });
            $('#uploader').hide()
        } else {
            $(this).parent('form').css({
                'margin-top': '10%'
            })
            $('#uploader').show()
        }
    });

//    列表页展示的效果
//    判断长宽
    var list=$('.exhibition-container .photo-box')
    jQuery.each(list, function(){
        if($(this).find('.t .photo').width()<$(this).find('.t .photo').height()){
            $(this).find('.t .photo').css({
                'width': '64%',
                'margin-left': '18%'
            })
        }
        else {
            $(this).find('.t .photo').css({
                'width': '100%'
            })
        }
    });

//    照片详情页展示效果
    if($('.photo-container .photo-wrapper .photo').width()<$('.photo-container .photo-wrapper .photo').height()){
        $('.photo-container .photo-wrapper .photo').css({
            'width': '64%',
            'margin-left': '18%'
        })
    }
    else{
        $('.photo-container .photo-wrapper .photo').css({
            'width': '100%',
        })
    }
});




























