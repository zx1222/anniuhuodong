$(document).ready(function () {
        $('#scene').parallax();
        document.querySelector('body').addEventListener('touchmove', function (e) {
            e.preventDefault();
        });
        //阻止滑动冒泡
        var floatingWindow = document.getElementsByClassName('floating-window');
        for (var i = 0; i < floatingWindow.length; i++) {
            floatingWindow[i].addEventListener('touchmove', function (e) {
                e.stopPropagation()
            }, false)
        }
        //判断横竖屏
        window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", orientationfn, false);
        orientationfn();

        // 初始swiper
        if ($('.swiper-container').length > 0) {
            mySwiper = new Swiper('.swiper-container', {
                direction: 'vertical',
                speed: 400,
                onSlideChangeEnd: function () {
                    if ($('.swiper-slide:nth-child(2)').hasClass('swiper-slide-active')) {
                        $('.envelope-inner').addClass('slideInUp')
                        mySwiper.lockSwipes()
                    }
                }
            });
        }
        $('.btn-click').on('click', function () {
            mySwiper.unlockSwipes();
            mySwiper.slideTo(3, 600, false);
            mySwiper.lockSwipes()
        });

        //点击抽奖
        $('.btn-draw').click(function () {
            var url = $('#data-module').val();
            lottery(url)
        });

        $('.noWin .btn-close').on('click', function () {
            mySwiper.unlockSwipes();
            mySwiper.slideTo(7, 600, false);
            mySwiper.lockSwipes()
        })

        //表单
        $('.btn-submit').on('click', function () {
                var data = {
                    user_name: $("input[name='user_name']").val(),
                    user_phone: $("input[name='user_name']").val(),
                    user_address: $("input[name='user_address']").val()
                };
                if (checkInfo()) {
                    $.ajax({
                        url: '',
                        data: data,
                        success: function () {

                        }
                    })
                }
            }
        );

        $('.btn-share').on('click', function () {
            $('.mask-share').show();
        });

        $('.mask-share').on('click', function () {
            $(this).hide()
        });
        $('.btn-ejiao').on('click', function () {
            $('.backcover .mask').addClass('slideInUp2')
        })
        $('.backcover .btn-close').on('click', function () {
            $(this).parent('.mask').removeClass('slideInUp2')
        })
    }
);
//判断横竖屏
function orientationfn() {
    setTimeout(function () {
        var html = document.documentElement;
        var w = html.clientWidth, h = html.clientHeight;
        if (h < w) {
            alert('锁定竖屏显示效果更好yo~');
        }
    }, 300);
}

//返回角度
function GetSlideAngle(dx, dy) {
    return Math.atan2(dy, dx) * 180 / Math.PI;
}

//根据起点和终点返回方向 1：向上，2：向下，3：向左，4：向右,0：未滑动
function GetSlideDirection(startX, startY, endX, endY) {
    var dy = startY - endY;
    var dx = endX - startX;
    var result = 0;

    //如果滑动距离太短
    if (Math.abs(dx) < 2 && Math.abs(dy) < 2) {
        return result;
    }

    var angle = GetSlideAngle(dx, dy);
    if (angle >= -45 && angle < 45) {
        result = 4;
    } else if (angle >= 45 && angle < 135) {
        result = 1;
    } else if (angle >= -135 && angle < -45) {
        result = 2;
    } else if ((angle >= 135 && angle <= 180) || (angle >= -180 && angle < -135)) {
        result = 3;
    }
    return result;
}

//抽奖
function lottery(url) {
    $.ajax({
        type: 'POST',
        url: url + '/default/lottery',
        error: function () {
            return false;
        },
        success: function (json) {
            if (json == '') {
                window.location.href = url + '/default/back-cover?forbidden=1';
            }
            else {
                var json = JSON.parse(json)
                var angle = json.angle; //指针角度
                var id = json.id; //中奖奖项标题

                $(".turntablePanle").rotate({
                    duration: 3000,//转动时间 ms
                    angle: 0, //从0度开始
                    animateTo: 3600 - angle,//转动角度
                    easing: $.easing.easeOutSine, //easing扩展动画效果
                    callback: function () {
                        mySwiper.slideTo(1, 600, false);
                        if (id == 6) {
                            var index = Math.floor(Math.random() * 4 + 1)//生成1-4随机数
                            $(".prizeContent[data-index=" + index + "]").css({'opacity': '1'});
                            $('.prize .noWin').show();
                            $('.prize .win').hide();
                        }
                        if (id == 1) {
                            $('.prize .noWin').hide();
                            $('.prize .win').show();
                            $('.prizeNum').text(1)
                        }
                        if (id == 2) {
                            $('.prize .noWin').hide();
                            $('.prize .win').show();
                            $('.prizeNum').text(2)
                        }
                        if (id == 3) {
                            $('.prize .noWin').hide();
                            $('.prize .win').show();
                            $('.prizeNum').text(5)
                        }
                        setTimeout(function () {
                            $('.turntable').hide();
                            $('.prize').addClass('fadeInUp')
                        }, 800)
                    }
                });
            }
        }
    });
}

function checkInfo() {
    var phoneCheck = /^1[3|4|5|7|8][0-9]{9}$/;
    var user_name = $("input[name='user_name']").val();
    var user_phone = $("input[name='user_name']").val();
    var user_address = $("input[name='user_address']").val();
    if (!phoneCheck.test(user_phone)) {
        alert('手机号格式有误')
        return false
    }
    if (user_phone == '') {
        alert('请输入手机号')
        return false
    }
    if (user_name == '') {
        alert('请输入手机号')
        return false
    }

    if (user_address == '') {
        alert('请输入收件地址')
        return false
    }
    if (phoneCheck.test(user_phone) && user_phone != '' && user_name != '' && user_address != '') {
        return true
    }
}