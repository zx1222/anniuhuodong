$(function () {
    $('body').height($('body')[0].clientHeight);

    //活动结束标识
    var event_end = $('#is_end').val();
    if (event_end == 1) {
        $('.btn-rule').addClass('none');
        $('.mask-end').removeClass('none');
    }

    var mySwiper = new Swiper('.swiper-container', {
        onInit: function (swiper) { //Swiper2.x的初始化是onFirstInit
            swiperAnimateCache(swiper); //隐藏动画元素
            swiperAnimate(swiper); //初始化完成开始动画
        },
        onSlideChangeEnd: function (swiper) {
            swiperAnimate(swiper); //每个slide切换结束时也运行当前slide动画
        }
    });
    mySwiper.lockSwipes()

//    p1
    $('.btn-rule').on('click', function () {
        $('.mask-rule').removeClass('none');
        $('.mask-rule').addClass('bounceIn');
    });
//    p2
    formatHeight($('.card-container'));

    var groupNum = 6,
        preId = 0,
        curId = 0,
        preIndex = 0,
        curIndex = 0,
        idArr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
        cardList = $('.card-wrp'),
        successCount = 0,

    //   关卡
        level = 1,

    // 倒计时
        limit = 90;
    timer = null;

    $('.btn-start').on('click', function () {
        mySwiper.unlockSwipes();
        mySwiper.slideNext();
        mySwiper.lockSwipes();
        // 初始card id
        resetCardId(idArr, cardList);

        //开始游戏
        gameStart();
    });
    $('.btn-playAgain').on('click', function () {
        window.location.href=updateUrl(window.location.href); //不传参，默认是“t”
    });

    function gameStart() {
        countdown(limit);
        $('.card-wrp').on('click', function () {
                if (curId == 0) {
                    curId = $(this).attr('data-id');
                    curIndex = $(this).index();
                }
                else {
                    preId = curId;
                    preIndex = curIndex;
                    curId = $(this).attr('data-id');
                    curIndex = $(this).index();
                }
                //如果前一次点击和当前点击的差的绝对值是成对的组组数 就是一样的 success
                if (preId != 0 && Math.abs(preId - curId) == groupNum) {
                    successCount++;
                    $('.leaveGroup-num').text(groupNum - successCount);
                    cardList.eq(preIndex).addClass('success');
                    cardList.eq(curIndex).addClass('success');
                    if (successCount == groupNum) {
                        clearInterval(timer);
                        level++;
                        successCount = 0;
                        $('.mask-passOne').removeClass('none');
                        $('.mask-passOne').addClass('bounceIn');
                        $('.btn-nextLevel').removeClass('none');
                        if (level == 2) {
                            limit = 45;
                            $('.countdown-num').text(limit);
                        }
                        if (level == 3) {
                            limit = 25;
                            $('.countdown-num').text(limit);
                        }
                        if (level > 3) {
                            $('.btn-nextLevel').addClass('none');
                            $('.btn-toDraw').removeClass('none');
                        }
                    }
                }
                $('.card-wrp').removeClass('flipped');
                $(this).addClass('flipped')
            }
        );
    }

    $('.btn-nextLevel').on('click', function () {
        preId = 0;
        curId = 0;
        preIndex = 0;
        curIndex = 0;
        countdown(limit);
        $('.leaveGroup-num').text(groupNum);
        $('.slogan,.panel-passOne,.mask-passOne').addClass('none');
        $('.slogan').eq(level - 1).removeClass('none');
        $('.card-wrp').removeClass().addClass('card-wrp');
        $('.panel-level' + level).removeClass('none');
        resetCardId(idArr, cardList);

    });
    $('.btn-toDraw').on('click', function () {
        mySwiper.unlockSwipes();
        mySwiper.slideNext();
        mySwiper.lockSwipes();
        $('.mask-verification').removeClass('none');
        jigsaw.init(document.getElementById('captcha'), function () {
            $('.mask-verification').addClass('none');
        })
    });
    $('.p2 .btn-giveUpChance').on('click', function () {
        $('.mask').addClass('none');
        $('.p3').addClass('none');
        mySwiper.unlockSwipes();
        mySwiper.slideNext();
        mySwiper.lockSwipes();
    });
//    p3
    var flag = true;
    $('.btn-lottery').on('click', function () {
        if (flag) {
            flag = !flag;
            lottery();
            setTimeout(function () {
                flag = !flag;
            }, 6000)
        }
    });
    $('.btn-toForm').on('click', function () {
        $('.mask').addClass('none');
        $('.mask-form').removeClass('none');
        $('.mask-form').addClass('bounceIn');
    });
    $('.btn-submit').on('click', function () {
        var url = $('#data-module').val();
        var data = {
            username: $('input[name="username"]').val(),
            phone: $('input[name="phone"]').val(),
            address: $('textarea[name="address"]').val(),
        };
        if (checkInfo(data)) {
            request(url + '/default/receive', data, function (res) {
                var res = JSON.parse(res);
                if (res.code == 0) {
                    $('.mask').addClass('none');
                    $('.mask-submitOk').removeClass('none');
                    $('.mask-submitOk').addClass('bounceIn');
                }
            })
        }
    });


    $('.p3 .close').on('click', function () {
        $(this).parent('.mask').addClass('none');
        mySwiper.unlockSwipes();
        mySwiper.slideNext();
        mySwiper.lockSwipes();
    });
    $('.p3 .btn-giveUpChance').on('click', function () {
        $('.mask').addClass('none');
        $('.mask-code').removeClass('none');
        $('.mask-code').addClass('bounceIn');
    });
    $('.btn-reStart').on('click', function () {
        $('.mask').addClass('none');
        window.location.href=updateUrl(window.location.href); //不传参，默认是“t”
    });

//    p4
    $('.btn-ejiao').on('click', function () {
        $('.mask').addClass('none');
        $('.mask-ejiao').removeClass('none');
        $('.mask-ejiao').addClass('bounceIn')
    });
    $('.btn-share').on('click', function () {
        $('.mask').addClass('none');
        $('.mask-share').removeClass('none');
        $('.mask-share').addClass('bounceIn')
    });
    $('.mask-share').on('click', function () {
        $('.mask').addClass('none');
    });
    $('.p4 .close,.p1 .close').on('click', function () {
        $(this).parent('.mask').addClass('none')
    });
});

function resetCardId(idArr, cardList) {
    var cardBack = '<div class="card-back"></div>';
    var _idArr = idArr.slice(0);
    for (var i = 0; i < cardList.length; i++) {
        var index = Math.floor(Math.random() * _idArr.length);
        cardList.eq(_idArr[index] - 1).append(cardBack);
        cardList.eq(_idArr[index] - 1).attr({'data-id': i + 1});
        cardList.eq(_idArr[index] - 1).find('.card-back').addClass('card' + (i + 1));
        _idArr.splice(index, 1);
    }
}

function countdown(limit) {
    timer = setInterval(function () {
        limit--;
        $('.countdown-num').text(limit);
        if (limit == 0) {
            $('.mask').addClass('none');
            $('.mask-notPass').removeClass('none');
            $('.mask-notPass').addClass('bounceIn');
            clearInterval(timer)
        }
    }, 1000)
}

function lottery() {
    var _speed = 80,//越小越快
        _loopNum = 5,//转圈次数
        _currentNum = 1,
        _addNum = 0;//中奖多转步数

    var url = $('#data-module').val();

    request(url + '/default/lottery', {}, function (res) {
        var res = JSON.parse(res);
        if (res.id == 6) {
            _addNum = 4;
            setTimeout(function () {
                clearInterval(lotteryTimer);
                $('.mask').addClass('none');
                $('.mask-notWin').removeClass('none');
                $('.mask-notWin').addClass('bounceIn')
            }, 4800)
        }
        if (res.id == 3) {
            var arr = [1, 5];
            var num = Math.floor(Math.random() * 2);
            _addNum = arr[num];
            setTimeout(function () {
                clearInterval(lotteryTimer);
                $('.mask').addClass('none');
                $('.mask-win').removeClass('none');
                $('.mask-win').addClass('bounceIn');
                $('.prize-img').attr('src', res.praiseimage);
                $('.prize-name').text(res.praisecontent)
            }, 5200)
        }
        if (res.id == 4) {
            var arr = [3, 7];
            var num = Math.floor(Math.random() * 2);
            _addNum = arr[num];
            setTimeout(function () {
                clearInterval(lotteryTimer);
                $('.mask').addClass('none');
                $('.mask-win').removeClass('none');
                $('.mask-win').addClass('bounceIn');
                $('.prize-img').attr('src', res.praiseimage);
                $('.prize-name').text(res.praisecontent)
            }, 5200)
        }
        var lotteryTimer = setInterval(function () {
            var _prizeList = [1, 2, 3, 4, 5, 6, 7, 8];
            if (_currentNum <= _loopNum * _prizeList.length + _addNum) {
                _currentNum++;
                if (_currentNum % _prizeList.length != 0 && _currentNum % _prizeList.length != 1) {
                    $('.pri img').removeClass('active');
                    $('.pri' + _currentNum % _prizeList.length + ' img').addClass('active');
                }
                else if (_currentNum % _prizeList.length == 0) {
                    $('.pri img').removeClass('active');
                    $('.pri8 img').addClass('active');
                }
                else {
                    $('.pri img').removeClass('active');
                    $('.pri1 img').addClass('active');
                }
            }
            else {
                clearInterval(lotteryTimer);
            }
        }, _speed)
    }, 'POST');

}

function formatHeight(itemWrp) {
    var width = $(itemWrp).find('.card-wrp').width();
    $(itemWrp).find('.card-wrp').height(width);
}

function request(url, params, successCallback, method) {
    var randomstr = randomString(8),
        arr = [randomstr, Date.parse(new Date()) / 1000, 'mothers-day'];
    var data = {
        timestamp: Date.parse(new Date()) / 1000,
        randomstr: randomstr,
        signature: hex_md5(SHA1(arr.sort().toString().replace(/,/g, ""))).toUpperCase(),
        _csrf: $("input[name='_csrf']").val(),
    };
    data = Object.assign(data, params);
    $.ajax({
        url: url,
        data: data,
        type: method || 'POST',
        success: function (res) {
            successCallback(res)
        }
    })
}

function checkInfo(data) {
    var phoneCheck = /^1[3|4|5|7|8][0-9]{9}$/;
    if (data.username == '') {
        alert('请输入姓名');
        return false
    }
    else if (data.phone == '') {
        alert('请输入电话');
        return false
    }
    else if (!phoneCheck.test(data.phone)) {
        alert('请输入正确手机号');
        return false
    }
    else if (data.address == '') {
        alert('请输入地址');
        return false
    }
    else if (data.username != '' && data.phone != '' && phoneCheck.test(data.phone) && data.address != '') {
        return true
    }
}

function updateUrl(url,key){
    var key= (key || 't') +'=';  //默认是"t"
    var reg=new RegExp(key+'\\d+');  //正则：t=1472286066028
    var timestamp=+new Date();
    if(url.indexOf(key)>-1){ //有时间戳，直接更新
        return url.replace(reg,key+timestamp);
    }else{  //没有时间戳，加上时间戳
        if(url.indexOf('\?')>-1){
            var urlArr=url.split('\?');
            if(urlArr[1]){
                return urlArr[0]+'?'+key+timestamp+'&'+urlArr[1];
            }else{
                return urlArr[0]+'?'+key+timestamp;
            }
        }else{
            if(url.indexOf('#')>-1){
                return url.split('#')[0]+'?'+key+timestamp+location.hash;
            }else{
                return url+'?'+key+timestamp;
            }
        }
    }
}
