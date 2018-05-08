$(document).ready(function () {
    //使用fastclick解决ios300ms延迟
    $(function() {
        FastClick.attach(document.body);
    });
    url = $("#data-module").val();
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

    //loading
    setTimeout(function () {
        $('.loading').hide();
        $('.container').show();
        $('.container').addClass('fadeIn')
    }, 2000);

    //滑动提示遮罩
    setTimeout(function () {
        $('.shade-swipe').show();
        $('.shade-swipe').addClass('fadeIn')
    }, 1000);
    var shade = document.getElementsByClassName('shade-swipe');
    shade[0].addEventListener('touchstart', function () {
        $('.shade-swipe').hide();
    }, false);

    //滑动处理
    var startX, startY;
    var currentAngle = null;
    var initAngle = null;
    var home = document.getElementsByClassName('home');
    home[0].addEventListener('touchstart', function (ev) {
        if (ev.target != $('.building')) {
            startX = ev.touches[0].pageX;
            startY = ev.touches[0].pageY;
            $('.flag').hide();
            $('.building').removeClass('scale');
            $('.building').hide();
        }
    }, false);

    home[0].addEventListener('touchmove', function (ev) {
        ev.preventDefault();
        if (ev.target != $('.building')) {
            var currentX, currentY;
            currentX = ev.changedTouches[0].pageX;
            currentY = ev.changedTouches[0].pageY;
            var direction = GetSlideDirection(startX, startY, currentX, currentY);
            var distance = startY - currentY;
            var angle = distance / 5;

            //每次都恢复上次 touchend时的角度
            currentAngle = initAngle;
            currentAngle += angle;

            if (direction == 1) {
                $('.earch').css({
                    'transform': 'rotate(' + currentAngle + 'deg)',
                    '-webkit-transform': 'rotate(' + currentAngle + 'deg)'
                });
                $('.car').css({
                    'transform': 'rotate3d(0,1,0,190deg)'
                })
            }
            if (direction == 2) {
                $('.earch').css({
                    'transform': 'rotate(' + currentAngle + 'deg)',
                    '-webkit-transform': 'rotate(' + currentAngle + 'deg)'
                });
                $('.car').css({
                    'transform': 'rotate3d(0,1,0,0deg)'
                })
            }
        }


    }, false);

    home[0].addEventListener('touchend', function (ev) {
        if (ev.target != $('.building')) {
            if (currentAngle % 40 >= 30) {
                initAngle = (~~(currentAngle / 40) + 1) * 40;
                $('.earch').css({
                    "transform": "rotate(" + initAngle + "deg)",
                    "-webkit-transform": "rotate(" + initAngle + "deg)"
                });
                clockwise(initAngle);
            }
            else if (currentAngle >= 0 && currentAngle % 40 < 30) {
                initAngle = (~~(currentAngle / 40)) * 40;
                $('.earch').css({
                    "transform": "rotate(" + initAngle + "deg)",
                    "-webkit-transform": "rotate(" + initAngle + "deg)"
                });
                clockwise(initAngle);
            }
            else if (currentAngle % 40 <= -30) {
                initAngle = (~~(currentAngle / 40) - 1) * 40;
                $('.earch').css({
                    "transform": "rotate(" + initAngle + "deg)",
                    "-webkit-transform": "rotate(" + initAngle + "deg)"
                });
                counterclockwise(initAngle);
            }
            else if (currentAngle < 0 && currentAngle % 40 > -30) {
                initAngle = (~~(currentAngle / 40)) * 40;
                $('.earch').css({
                    "transform": "rotate(" + initAngle + "deg)",
                    "-webkit-transform": "rotate(" + initAngle + "deg)"
                });
                counterclockwise(initAngle);
            }
        }

    }, false);


    //点击buildingB
    $('.home .buildingB').on('click', function () {
        $.ajax({
            contentType: "application/json; charset=utf-8",
            url: url + '/api/list',
            type: 'GET',
            success: function (res) {
                $('.sales-netWork .header h2').text(+res.data.length + '家配销公司');
                var parent = $('.sales-netWork .swiper-container .swiper-wrapper');
                parent.empty();
                $('.sales-netWork').show();
                res.data.forEach(function (val, index) {
                    var children = "<div class='swiper-slide' onclick='checkDetail($(this))'><input type='hidden' name='id' data-id=" + res.data[index].id + ">" + res.data[index].shop_name + "</div>";
                    parent.append(children);
                });

                var mySwiper = new Swiper('.swiper-container', {
                    initialSlide: 0,
                    speed: 800,
                    slidesPerView: 5,
                    centeredSlides: false,
                    spaceBetween: 0,
                    freeMode: true,
                });
            }
        })
    });

    //设置页面宽高
    var width = $('body').width();
    var height = $('body').height();
    $('.floating-window').css({
        'width': height,
        'height': width,
        'top': (height - width) / 2 + 'px',
        'left': -(height - width) / 2 + 'px'
    });

    //营销模式
    $('.buildingC').on('click', function () {
        $('.floating-window').hide();
        $('.sales-model .container').animate({'scrollTop': 0}, 200);
        $('.sales-model').show();
        $('.sales-model').addClass('fadeIn')
    });

    //搜索
    var provincesArr = ['北京', '上海', '天津', '重庆', '河北省', '山西省', '辽宁省', '吉林省', '黑龙江省', '江苏省', '浙江省', '安徽省', '福建省', '江西省', '山东省', '河南省', '湖北省', '湖南省', '广东省', '海南省', '四川省', '贵州省', '云南省', '陕西省', '甘肃省', '青海省', '内蒙古', '广西', '西藏', '宁夏', '新疆'];
    var provinces = $('.provinces');
    provincesArr.forEach(function (item, index) {
        var li = "<li>" + item + "</li>";
        provinces.append(li)
    });
    $('.buildingA').on('click', function () {
        $('.floating-window').hide();
        var parent = $('.search .content');
        parent.empty();
        $('.search').show();
        $('.search').addClass('fadeIn');

        $('.select').unbind('click').click(function () {
            $('.provinces').slideToggle();
        });
        var keywords = '';
        $('.provinces li').on('click', function (e) {
            e.stopPropagation();
            keywords = $(this).text();
            $('.provinces').slideUp();
            $('.select').text(keywords)
        });

        $(".drop-menu li").on('click', function () {
            search(keywords);
        });
    });


    // 隐藏悬浮窗
    $('.icon-close').on('click', function () {
        $(this).parent('.floating-window').hide();
        keywords = '';
        $('.provinces').slideUp();
        $('.select').text('选择您要查询的省份');
        $('.search .content ').height("auto");
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

function clockwise(initAngle) {
    //旋转到全国配销网络
    if (((initAngle / 40) % 3) == 0) {
        $('.flag-sales').show();
        $('.flag-sales').addClass('bounceIn');

        $('.container .building').css({'top': '42%'});
        $('.buildingB').show();
        $('.buildingB').addClass('scale');
    }
    //旋转到营销模式
    if (((initAngle / 40) % 3) == 1) {
        $('.flag-model').show();
        $('.flag-model').addClass('bounceIn');

        $('.container .building').css({'top': '36%'});
        $('.buildingC').show();
        $('.buildingC').addClass('scale');
    }
    //旋转到查询配销区域
    if (((initAngle / 40) % 3) == 2) {
        $('.flag-location').show();
        $('.flag-location').addClass('bounceIn');

        $('.container .building').css({'top': '40%'});
        $('.buildingA').show();
        $('.buildingA').addClass('scale');
    }
}

function counterclockwise(initAngle) {
    //旋转到全国配销网络
    if (((initAngle / 40) % 3) == 0) {
        $('.flag-sales').show();
        $('.flag-sales').addClass('bounceIn');

        $('.container .building').css({'top': '42%'});
        $('.buildingB').show();
        $('.buildingB').addClass('scale');
    }
    //旋转到营销模式
    if (((initAngle / 40) % 3) == -1) {
        $('.flag-location').show();
        $('.flag-location').addClass('bounceIn');

        $('.container .building').css({'top': '40%'});
        $('.buildingA').show();
        $('.buildingA').addClass('scale');
    }
    //旋转到查询配销区域
    if (((initAngle / 40) % 3) == -2) {
        $('.flag-model').show();
        $('.flag-model').addClass('bounceIn');

        $('.container .building').css({'top': '36%'});
        $('.buildingC').show();
        $('.buildingC').addClass('scale');
    }
}

function search(keywords) {
    $.ajax({
        contentType: "application/json; charset=utf-8",
        url: url + '/api/list?keywords=' + keywords,
        type: 'GET',
        success: function (res) {
            var parent = $('.search .content');
            parent.empty();
            if (res.total > 1) {
                $('.search .content ').height('50%');
                res.data.forEach(function (val, index) {
                    var children = "<div class='box'><h3>" + res.data[index].shop_name + "</h3><p>所在地址:" + res.data[index].address + "</p><p>联系电话:" + res.data[index].telephone + "</p><p>配销区域:" + res.data[index].region + "</p></div>"
                    parent.append(children);
                });
            }
            else if (res.total == 1) {
                res.data.forEach(function (val, index) {
                    var children = "<div class='box'><h3>" + res.data[index].shop_name + "</h3><p>所在地址:" + res.data[index].address + "</p><p>联系电话:" + res.data[index].telephone + "</p><p>配销区域:" + res.data[index].region + "</p></div>"
                    parent.append(children);
                });
            }
            else if (res.total==0)  {
                $('.search .content ').height('auto');
                var children = "<h4 class='text-center'>当前地域并无配销公司</h4>";
                parent.append(children);
            }
        }
    })
}

function checkDetail(e) {
    var id = $(e).children("input[name='id']").data('id');
    $.ajax({
        contentType: "application/json; charset=utf-8",
        url: url + '/api/detail?id=' + id,
        type: 'GET',
        success: function (res) {
            var parent = $('.search .content');
            parent.empty();
            var children = "<div class='box'><h3>" + res.data.shop_name + "</h3><p>所在地址:" + res.data.address + "</p><p>联系电话:" + res.data.telephone + "</p><p>配销区域:" + res.data.region + "</p></div>"
            parent.append(children);
            $('.sales-netWork').hide();
            $('.search').show();
            $('.search').addClass('fadeIn');
            $('.select').text(res.data.region)

            $('.select').unbind('click').click(function () {
                $('.provinces').slideToggle();
            });
            var keywords = '';
            $('.provinces li').on('click', function (e) {
                e.stopPropagation();
                keywords = $(this).text();
                $('.provinces').slideUp();
                $(this).parents('.drop-menu').find('.select').text(keywords)
            });
            $(".drop-menu li").on('click', function () {
                search(keywords)
            });
        }
    });
}