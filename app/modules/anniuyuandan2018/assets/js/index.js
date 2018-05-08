$(document).ready(function () {
        //活动结束标识
        var event_end = $('#is_end').val();
        if (event_end==1) {
            $('.packet .s3,.packet .icon-up').hide();
        }

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

        //swiper初始化
        mySwiper = new Swiper('.swiper-container', {
            direction: 'vertical',
            speed: 400
        });
        mySwiper.lockSwipes();

        //滑动处理
        if ($('.home').length > 0 && event_end=='') {
            var startX, startY;
            var slideDistance = 0;
            var home = document.getElementsByClassName('home');
            home[0].addEventListener('touchstart', function (ev) {
                startX = ev.touches[0].pageX;
                startY = ev.touches[0].pageY;

                $('.flag').hide();
                $('.building').removeClass('scale');
                $('.building').hide();
            }, false);

            home[0].addEventListener('touchmove', function (ev) {
                ev.preventDefault();
                var currentX, currentY;
                currentX = ev.changedTouches[0].pageX;
                currentY = ev.changedTouches[0].pageY;
                var direction = GetSlideDirection(startX, startY, currentX, currentY);
                var distance = startY - currentY;

                slideDistance = distance;

                if (direction == 1) {
                    $('.packet-header').addClass('flipped')
                    setTimeout(function () {
                        $('.red-packet').css({'z-index': '3'});
                        $('.packet-header').css({'z-index': '1'});
                        $('.mark').css({'z-index': '2'});
                        $('.icon-up,.s2,.s3').hide();
                        $('.s4').show();
                        $('.home .chanceNum').show();
                    }, 600)
                    setTimeout(function () {
                        $('.mark,.mask').addClass('slideInUp');
                        $('.mask').addClass('slideInUp2');

                    }, 1400)
                }
            }, false);
        }

        $('.btn-toDraw').click(function () {
            $('.mark,.s4,.mask').hide();
            $('.turntable').addClass('fadeInUp')
        });

        //点击抽奖
        $('.btn-draw').click(function () {
            var url = $('#data-module').val();
            lottery(url)
        });


        $('.prize .btn-close').on('click', function () {
            mySwiper.unlockSwipes();
            $('.swiper-wrapper .swiper-slide:nth-child(2)').css({'z-index': '3'})
            mySwiper.slideTo(1, 600, false);
            mySwiper.lockSwipes();
        });
        $('.btn-anniu').on('click', function () {
            $('.sign1').hide();
            $('.sign2').show();
            mySwiper.unlockSwipes();
            mySwiper.slideTo(2, 600, false);
            mySwiper.lockSwipes();
        });
        $('.codeWrapper .btn-close').on('click', function () {
            mySwiper.unlockSwipes();
            $('.swiper-wrapper .swiper-slide:nth-child(2)').css({'z-index': '3'})
            mySwiper.slideTo(1, 600, false);
            mySwiper.lockSwipes();
        });

        $('.btn-share').on('click', function () {
            $('.mask-share').show();
        });
        $('.mask-share').on('click', function () {
            $(this).hide()
        });

        //活动结束
        $('.event-end .btn-close').on('click', function () {
            mySwiper.lockSwipes();
            $('.event-end').hide();
            $('.packet .s3,.packet .icon-up').hide();
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
                $('.sign1').show();
                $('.sign2').hide();
                mySwiper.unlockSwipes();
                mySwiper.slideTo(2, 600, false);
                mySwiper.lockSwipes();
            }
            else {
                var json = JSON.parse(json)
                var angle = json.angle; //指针角度
                var id = json.id; //中奖奖项标题
                $('.sign1').hide();
                $('.sign2').show();
                $(".turntablePanle").rotate({
                    duration: 3000,//转动时间 ms
                    angle: 0, //从0度开始
                    animateTo: 3600 - angle,//转动角度
                    easing: $.easing.easeOutSine, //easing扩展动画效果
                    callback: function () {
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