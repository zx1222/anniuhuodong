$(document).ready(function () {
    //判断横竖屏
    function orientationfn() {
        setTimeout(function () {
            var html = document.documentElement;
            var w = html.clientWidth, h = html.clientHeight;
            if (h < w) {
                alert('竖屏效果展示更好哦!')
            }
        }, 200);
    }

    window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", orientationfn, false);

    
    //首页部分
    // 点击规则上的知道了
    $('.home .btn-know').on('click', function () {
        var door1 = $('.btn-chosen').attr('data-door1');
        var door2 = $('.btn-chosen').attr('data-door2');
        $('.door-l').attr('src', door1);
        $(this).parent('.regulation').hide();
    });

    //为我的后宫选秀的点击次数
    var clickNumber = 1;
    $('.home .start').on('click', function () {
        if (clickNumber == 1) {
            $('.regulation').show();
            $('.home .door-dialogue1').hide();
        }
        else {
            $('.home .door-dialogue2').hide();
            $('.home .door-l').addClass('slideOutLeft');
            $('.home .door-r').addClass('slideOutRight');
            $('.home .board').addClass('bounceOutUp');
            $('.home .slogan').addClass('bounceOutUp');
            $('.home .start').addClass('bounceOutUp');
            setTimeout(function () {
                $('.dialogues').css('z-index', '3');
                $('.icon-harem').addClass('bounceInDown')
            }, 1200);
            setTimeout(function () {
                $('.dialogues1').addClass('fadeOutLeft')
            }, 2800);
            setTimeout(function () {
                $('.dialogues2').addClass('fadeOutRight')
            }, 3500);
            setTimeout(function () {
                $('.dialogues3').addClass('fadeOutLeft')
            }, 4200);
            setTimeout(function () {
                $('.tags ').css('z-index', '3');
                $('.tags').addClass('fadeIn')
            }, 4600)
        }
        clickNumber++
    });

    //初始判断用户是否已经选择了标签 选择了
    if ($('.myLabels').length > 0) {
        var myLabels = $('.myLabels').val();
        initLabels(myLabels, $('.tags .tag'))
    }

    //选标签验证
    var tagArr = [];
    $('.tags .tag').on('click', function (event) {
        if (myLabels == '') {
            var key = $(this).data('key');
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                var flag = tagArr.indexOf(key);
                tagArr.splice(flag, 1);
                $('.hiddenField').val(tagArr)
            }
            else {
                if (tagArr.length >= 3) {
                    event.preventDefault();
                }
                else {
                    $(this).addClass('active');
                    tagArr.push(key);
                    $('.hiddenField').val(tagArr);
                }
            }
        }
        else {
        }
    });

    //点击我的后宫图标
    $('.icon-harem ').on('click', function () {
        if (myLabels == '') {
            $('.tags .shade').show();
            return false;
        }
        else {
            return true
        }
    });

    //点击前往
    $('.btn-go').on('click', function () {
        $('.tags .shade').hide();
    });
    //首页结束


    

    $('.harem .btn-invite').on('click', function () {
        //通过后宫是否为空判断是否是第一次点击邀请好友 成功邀请后不弹出分享即获得抽奖的遮罩
        if ($('.harem .empty').is(':visible')) {
            $('.harem .invite-friend').show()
        }
        else {
            $('.harem .share-shade').show();
        }
    });

    $('.harem .btn-share').on('click', function () {
        $('.share-shade').show();
    });

    //点击任意位置隐藏遮罩
    $('.harem .share-shade').on('click', function () {
        $('.harem .share-shade').hide();
        $('.harem .invite-friend').hide();
    });
    //后宫页结束


    
    //抽奖页
    // 初始swiper
    if ($('.swiper-container').length > 0) {
        var mySwiper = new Swiper('.swiper-container', {
            direction: 'vertical',
            speed: 800
        });
        mySwiper.lockSwipes();
    }
    $('.lottery .card').on('click', function () {
        $.ajax({
            type: 'GET',
            url: "lottery-run",
            success: function (res) {
                var res = JSON.parse(res);
                if (res.id == 5) {
                    $('.lottery .noWin').show();
                    $('.lottery .noWin .btn-know').on('click',function () {
                        $('.swiper-slide:nth-child(2)').hide()
                        mySwiper.unlockSwipes();
                        mySwiper.slideTo(1,800,false);
                        mySwiper.lockSwipes();
                    })
                }
                else {
                    $('.lottery .win').show();
                    $('.lottery .win .prizeName').text(res.praisename);
                    $('.lottery .win .prizeContent').text('获得'+res.praisecontent);
                    $('.lottery .win .prizeImg').attr('src',res.praiseimage);
                    $("input[name='prize_id']").val(res.id)
                    $('.btn-getPrize').on('click', function () {
                        mySwiper.unlockSwipes();
                        mySwiper.slideNext();
                        mySwiper.lockSwipes();
                    })
                }
            }
        })
    });
    $('.lottery .noWin .btn-know').on('click', function () {
        $(this).parent('.noWin').hide();
    });

    //表单焦点控制以及软键盘弹出隐藏监听
    var winHeight = $(window).height();
    $(window).resize(function () {
        var thisHeight = $(this).height();
        if (winHeight - thisHeight > 50) {
            $('input,textarea').css('margin-bottom', '5px');
            $('.lottery .btn-submit').hide()
        } else {
            $('input,textarea').css('margin-bottom', '20px');
            $('.lottery .btn-submit').show()
        }
    });
    $('input,textarea').focus(function () {
        $('input,textarea').css('margin-bottom', '5px');
        $('.lottery .btn-submit').hide()
    });
    $('input,textarea').blur(function () {
        $('input,textarea').css('margin-bottom', '20px');
        $('.lottery .btn-submit').show()
    });
    //表单提交
    $('.submit').click(function () {
        var data = {
            username: $("input[name='username']").val(),
            phone: $("input[name='phone']").val(),
            address: $("textarea[name='address']").val(),
            prize_id:$("input[name='prize_id']").val()
        };
        if (inputCheck(data)) {
            $.ajax({
                type: 'GET',
                url: 'receive',
                data: data,
                success: function (res) {
                    var res = JSON.parse(res);
                    if (res.code == 0) {
                        mySwiper.unlockSwipes();
                        mySwiper.slideNext();
                        mySwiper.lockSwipes();
                    }
                    else if (res.code == 1) {
                        if (res.desc.phone != '') {
                            alert(res.desc.phone)
                        }
                    }
                }
            });
        }
    });

    //产品页
    $('.lottery .btn-shareAppMessage,.lottery .btn-shareTimeLine').on('click', function () {
        $('.lottery .share-shade').show()
    });
    $('.lottery .share-shade').on('click', function () {
        $('.lottery .share-shade').hide();
    });
    //抽奖页结束


    
    //分享贴标签页
    $('.share .btn-know').on('click', function () {
        $('.door-l').attr('data-door1');
        $(this).parent('.regulation').hide();
        $('.share .door-l').addClass('slideOutLeft');
        $('.share .door-r').addClass('slideOutRight');
        $('.share .board').addClass('bounceOutUp');
        $('.share .start').addClass('bounceOutUp');
        $('.share .slogan').addClass('bounceOutUp');
        setTimeout(function () {
            $('.tags ').css('z-index', '3');
            $('.tags').addClass('fadeIn')
        }, 1200)
    });

    //好友选好标签
    //好友已经正确初始化显示建立我的后宫的按钮
    if(myLabels!=''){
        $('.share form').hide();
        $('.container.share .tags>.btn-buildHarem').show();
    }
    $('.share .submit-tags').on('click', function () {
        var flag=checkTags();
        if(flag){
            var data = {
                labels: $('.share .hiddenField').val(),
                myself: $("input[name='myself']").val()
            };
            $.ajax({
                type: 'GET',
                data: data,
                url: 'guess-label',
                success: function (res) {
                    var res = JSON.parse(res);
                    if (res.code == 0) {
                        $('.share .right').show();
                    }
                    else {
                        $('.share .wrong').show();
                        $('.share .wrong .btn-rePlay').on('click', function () {
                            $(this).parent('.wrong').hide();
                            $('.hiddenField').val('');
                            $('.tags .tag').removeClass('active')
                            tagArr = []
                        });
                    }
                }
            });
        }
    });
    //分享贴标签页结束
});

//点击选好了提交表单验证
function checkTags() {
    var selectedTags = $('.hiddenField').val();
    if (selectedTags.split(',').length == 3) {
        return true
    }
    else {
        alert('需要选够三个标签yo~');
        return false
    }
}

//初始化已经选择过标签的用户的标签
function initLabels(val, obj) {
    if (val != '') {
        var labelsArr = val.split(',');
        labelsArr.forEach(function (val, index) {
            $.each(obj, function () {
                if ($(this).data('key') == val) {
                    $(this).addClass('active')
                }
            });
        });
        $('.btn-chosen').hide();
    }
    else {
    }
}

//表单验证
function inputCheck(data) {
    var flag = false;
    var phoneCheck = /^1[3|4|5|7|8][0-9]{9}$/;
    if (data.username == "") {
        alert("请输入姓名!");
        return flag = false;
    }
    else if (data.phone == "") {
        alert("请输联系电话!");
        return flag = false;
    }
    else if (!phoneCheck.test(data.phone)) {
        alert("请输入正确的联系电话!");
        return flag = false;
    }
    else if (data.address == "") {
        alert("请输入收货地址!");
        return flag = false;
    }
    else if (data.username != "" && phoneCheck.test(data.phone) && data.address != "") {
        return flag = true;
    }
}