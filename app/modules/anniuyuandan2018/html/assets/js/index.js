$(document).ready(function () {
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


    //滑动处理
    if($('.home').length>0){
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
                $('.mark,.mask').addClass('slideInUp')
                $('.icon-up,.s2,.s3').hide()
                $('.s4').show();
            }
        }, false);
    }

    $('.btn-toDraw').click(function () {
       $('.mark,.s4,.mask').hide()
        $('.turntable').addClass('fadeInUp')
    })
    //点击抽奖
    $('.btn-draw').click(function () {
        // lottery(url)
        $('.turntable').hide()
        $('.prize').addClass('fadeInUp')
    })
    
    $('.btn-share').on('click',function () {
        $('.mask-share').show();
    });
    $('.mask-share').on('click',function () {
        $(this).hide()
    });
});
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
        url: url + '/default/lottery-run',
        error: function () {
            alert('Sorry，出错了！');
            return false;
        },
        success: function (json) {
            var json = JSON.parse(json)
            var angle = json.angle; //指针角度
            var id = json.id; //中奖奖项标题
            $(".turntablePanle").rotate({
                duration: 3000,//转动时间 ms
                angle: 0, //从0度开始
                animateTo: 3600 - angle - 30,//转动角度
                easing: $.easing.easeOutSine, //easing扩展动画效果
                callback: function () {
                    if (id == 1) {
                        setTimeout(function () {
                            var prize = "<p><b>抽中1元红包！</b></p>";
                            $('.shade-win').append(prize);
                            $('.shade-win').show()
                        }, 500);
                        sessionStorage.setItem('win', '1')
                    } else if (id == 2) {
                        setTimeout(function () {
                            var prize = "<p><b>抽中2元红包！</b></p>";
                            $('.shade-win').append(prize);
                            $('.shade-win').show()
                        }, 500);
                        sessionStorage.setItem('win', 1)
                    } else if (id == 3) {
                        setTimeout(function () {
                            var prize = "<p><b>抽中5元红包！</b></p>";
                            $('.shade-win').append(prize);
                            $('.shade-win').show()
                        }, 500);
                        sessionStorage.setItem('win', 1)
                    } else {
                        setTimeout(function () {
                            $('.shade-noWin').show()
                        }, 500);
                    }
                }
            });
        }
    });
}