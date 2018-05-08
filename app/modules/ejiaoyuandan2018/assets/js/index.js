$(document).ready(function () {
        var event_end = $('#is_end').val();
        if (event_end==1) {
            $('.icon-up').hide()
        }

        $('body').height($('body')[0].clientHeight);

        $('#scene1').parallax();
        $('#scene2').parallax();
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
        if (event_end!=1) {
            mySwiper = new Swiper('.swiper-container', {
                direction: 'vertical',
                speed: 400,
                hashNavigation: true,
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
            mySwiper.slideTo(2, 600, false);
            mySwiper.lockSwipes()
        });

        //点击抽奖
        $('.btn-draw').click(function () {
            var url = $('#data-module').val();
            lottery(url)
        });

        //机会用尽
        $('.mask-nochance .btn-close').on('click', function () {
            $('.mask-nochance').hide();
            $('.prize,.submitOK,.form').hide();
            mySwiper.unlockSwipes();
            mySwiper.slideTo(3, 600, false);
            mySwiper.lockSwipes()
        });

        //领取奖品
        $('.btn-get').on('click', function () {
            mySwiper.unlockSwipes();
            mySwiper.slideTo(4, 600, false);
            mySwiper.lockSwipes()
        });

        $('.noWin .btn-close').on('click', function () {
            mySwiper.unlockSwipes();
            mySwiper.slideTo(4, 600, false);
            mySwiper.lockSwipes()
        });
        $('.submitOK .btn-close').on('click', function () {
            mySwiper.unlockSwipes();
            mySwiper.slideTo(6, 600, false);
            mySwiper.lockSwipes()
        });

        //表单
        $('.btn-submit').on('click', function () {
            var url = $('#data-module').val();
            if (checkInfo()) {
                submit(url)
            }
        });

        $('.btn-share').on('click', function () {
            $('.mask-share').show();
        });

        $('.mask-share').on('click', function () {
            $(this).hide()
        });
        $('.btn-ejiao').on('click', function () {
            $('.backcover .mask').addClass('slideInUp2')
        });
        $('.backcover .btn-close').on('click', function () {
            $(this).parent('.mask').removeClass('slideInUp2')
        });
        $('.event-end .btn-close').on('click', function () {
            $('.event-end').hide();
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

//抽奖
function lottery(url) {
    $.ajax({
        url: url + '/default/lottery',
        error: function () {
            return false;
        },
        success: function (json) {
            if (json == '') {
                $('.mask-nochance').addClass('slideInUp2')
            }
            else {
                var json = JSON.parse(json)
                var angle = json.angle; //指针角度
                var id = json.id; //中奖奖项标题

                $(".turntable-panel").rotate({
                    duration: 3000,//转动时间 ms
                    angle: 0, //从0度开始
                    animateTo: 3600 - angle,//转动角度
                    easing: $.easing.easeOutSine, //easing扩展动画效果
                    callback: function () {
                        if (id == 6) {
                            $('.submitOK,.form').hide();
                            $('.mask-nochance').hide();
                            sessionStorage.setItem('prize_id', 0);
                            var index = Math.floor(Math.random() * 3 + 1)//生成1-4随机数
                            $(".noWin .content[data-index=" + index + "]").css({'opacity': '1'});
                            $('.prize .noWin').show();
                            $('.prize .win').hide();
                            mySwiper.unlockSwipes();
                            mySwiper.slideTo(3, 600, false);
                            mySwiper.lockSwipes();
                        }
                        if (id == 1) {
                            $('.mask-nochance').hide();
                            sessionStorage.setItem('prize_id', id);
                            $('.prize .noWin').hide();
                            $('.prize .win').show();
                            $('.prize-content').hide();
                            $('.prize4').show();
                            mySwiper.unlockSwipes();
                            mySwiper.slideTo(3, 600, false);
                            mySwiper.lockSwipes();
                        }
                        if (id == 2) {
                            $('.mask-nochance').hide();
                            sessionStorage.setItem('prize_id', id);
                            $('.prize .noWin').hide();
                            $('.prize .win').show();
                            $('.prize-content').hide();
                            $('.prize3').show();
                            mySwiper.unlockSwipes();
                            mySwiper.slideTo(3, 600, false);
                            mySwiper.lockSwipes();
                        }
                        if (id == 3) {
                            $('.mask-nochance').hide();
                            sessionStorage.setItem('prize_id', id);
                            $('.prize .noWin').hide();
                            $('.prize .win').show();
                            $('.prize-content').hide();
                            $('.prize2').show();
                            mySwiper.unlockSwipes();
                            mySwiper.slideTo(3, 600, false);
                            mySwiper.lockSwipes();
                        }
                        if (id == 4) {
                            $('.mask-nochance').hide();
                            sessionStorage.setItem('prize_id', id);
                            $('.prize .noWin').hide();
                            $('.prize .win').show();
                            $('.prize-content').hide();
                            $('.prize1').show();
                            mySwiper.unlockSwipes();
                            mySwiper.slideTo(3, 600, false);
                            mySwiper.lockSwipes();
                        }
                    }
                });
            }
        }
    });
}

//提交领奖信息
function submit(url) {
    $.ajax({
        url: url + '/default/receive',
        data: {
            username: $("input[name='user_name']").val(),
            phone: $("input[name='user_phone']").val(),
            address: $("input[name='user_address']").val(),
            _csrf: $("input[name='_csrf']").val(),
            prize_id: sessionStorage.getItem('prize_id')
        },
        type: "POST",
        success: function (res) {
            var res = JSON.parse(res)
            if (res.code == 0) {
                mySwiper.unlockSwipes();
                mySwiper.slideTo(5, 600, false);
                mySwiper.lockSwipes();
            }
            else {

            }
        }
    })
}
function checkInfo() {
    var phoneCheck = /^1[3|4|5|7|8][0-9]{9}$/;
    var user_name = $("input[name='user_name']").val();
    var user_phone = $("input[name='user_phone']").val();
    var user_address = $("input[name='user_address']").val();
    if (user_name == '') {
        alert('请输入收件人')
        return false
    }
    if (user_phone == '') {
        alert('请输入手机号')
        return false
    }
    if (!phoneCheck.test(user_phone)) {
        alert('手机号格式有误')
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

