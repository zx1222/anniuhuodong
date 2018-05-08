function oplisMoveTrueFn() {
    $(window).unbind('touchmove');
};
function oplisMoveFalseFn() {
    $(window).bind('touchmove', function (event) {
        event.preventDefault();
    });
};
oplisMoveFalseFn();
var oplisIsPlay = false,
    oplisWinTap = false,
    oplisMusicVal = '',
    oplisMusicValAutoPlay = "<audio src='" + _assets_url + "/m/bgm.mp3' id='Jaudio' class='audio' autoplay='autoplay' preload='preload' loop='loop'></audio>",
    oplisMusicValPause = "<audio src='" + _assets_url + "/m/bgm.mp3' class='audio' preload='preload' loop='loop'></audio>",
    oplisMusicDom = "<div class='bgm '><span class='bgm_btn'></span><img src='" + _assets_url + "/m/1.png' ></div><style> @-webkit-keyframes oplisMusicPlayerAnKey {0%{-webkit-transform:rotateZ(0deg);}100% {-webkit-transform:rotateZ(360deg);}} @keyframes oplisMusicPlayerAnKey {0%{transform:rotateZ(0deg);}100% {transform:rotateZ(360deg);}} .bgm{position: absolute;position: fixed;z-index: 888;top: 2%;right: 4%;width: 10%;} .bgm span{position: absolute; top: 0; left: 0; display: block; width: 100%; height: 100%; z-index: 222; background: url('" + _assets_url + "/m/0.png') no-repeat; background-size: 100% 100%; } .bgm img{position: relative; top: 0; left: 0; display:block; width: 100%; z-index: 111; opacity: 0;} html body .bgm .bgmTurn{-webkit-transform-origin:50% 50%; -webkit-animation:oplisMusicPlayerAnKey 1.5s linear infinite; transform-origin:50% 50%; animation:oplisMusicPlayerAnKey 1.5s linear infinite; background: url('" + _assets_url + "/m/1.png') no-repeat; background-size: 100% 100%; } </style> ";
function audioAutoPlay(id) {
    var audio = document.getElementById(id), play = function () {
        audio.play();
        oplisWinTap = true;
        document.removeEventListener("touchstart", play, false);
        document.removeEventListener("WeixinJSBridgeReady", false);
    };
    audio.play();
    document.addEventListener("WeixinJSBridgeReady", function () {
        play();
    }, false);
    document.addEventListener("touchstart", play, false);
};
function oplisMusicPlayer(bool) {
    if (bool == true) {
        oplisMusicDom += oplisMusicValAutoPlay;
        $("body").append(oplisMusicDom);
        audioAutoPlay('Jaudio');
        oplisBgmPlayFn();
        oplisIsPlay = true;
    } else {
        oplisWinTap = true;
        oplisMusicDom += oplisMusicValPause;
        $("body").append(oplisMusicDom);
    }
    $(".bgm span").on("touchstart", function () {
        if (oplisWinTap) {
            oplisIsPlay = !oplisIsPlay;
            oplisIsPlay ? oplisBgmPlayFn() : oplisBgmPauseFn();
        }
        ;
    });
}
function oplisBgmPlayFn() {
    $('.audio')[0].play();
    $(".bgm_btn").addClass("bgmTurn");
}
function oplisBgmPauseFn() {
    $('.audio')[0].pause();
    $(".bgm_btn").removeClass("bgmTurn");
}
window.onload = function () {
    function oplisWinResizeFn() {
        var opliswinWpx = $(".wrap").width(), oplisWinHpx = $(".wrap").height(), _txt, lwq_width = ((parseInt(opliswinWpx) / 7.5)) + "px";
        $("html,body").css("font-size", lwq_width);
        _txt = parseInt(oplisWinHpx / opliswinWpx * 100) / 100;
        $(".oplisTestTxt").html(_txt);
    }

    oplisWinResizeFn();
    $(window).resize(function () {
        oplisWinResizeFn();
    })
    //点击查看排行榜
    $('.btn_rank').on('touchstart click', function () {
        event.preventDefault();
        showRank();
    });
    //点击开始作战
    $('.btn_ready').on('touchstart click', function () {
        event.preventDefault();
        $('.pg2').removeClass('none').siblings().addClass('none');
    });
    //角色选择
    $('.pg2_con em').on('touchstart click', function () {
        event.preventDefault();
        $('.pg2_con').addClass('none');
        $('.pg2_box img').eq($(this).index()).removeClass('none');
        $('.btn_go').removeClass("none");
    });
    //点击开始游戏
    $('.btn_go').on('touchstart click', function () {
        event.preventDefault();
        $('.pg3').removeClass('none').siblings().addClass('none');
        gameStartFn();
    });
    //再玩一次
    $('.pg4_btn_agin').on('touchstart click', function () {
        event.preventDefault();
        window.location.reload();
    });
    //不继续玩
    $('.btn_close,.pg4_btn_over').on('touchstart click', function () {
        event.preventDefault();
        $('.pg8').removeClass('none').siblings().addClass('none');
    });
    //点击领取红包
    $('.pg5_btn_get').on('touchstart click', function () {
        event.preventDefault();
        _lotteryLock = 0;
        if (_lotteryLock == 0) {
            _lotteryLock = 1;
            lottery();
        }
    });
    //教你俩招
    $('.pg8_btn').on('touchstart click', function () {
        event.preventDefault();
        $('.pg9').removeClass('none').siblings().addClass('none');
    });
    //了解安牛
    $('.pg9_btn_know').on('touchstart click', function () {
        event.preventDefault();
        $('.pg10').removeClass('none').siblings().addClass('none');
    });
    //查看排行
    $('.pg9_btn_rank').on('touchstart click', function () {
        event.preventDefault();
        showRank();
    });
    //分享游戏
    $('.pg9_btn_share').on('touchstart click', function () {
        event.preventDefault();
        $('.pg11').removeClass('none').siblings().addClass('none');
    });
    //排行榜 我也要玩
    $('.rank_btn').on('touchstart click', function () {
        event.preventDefault();
        window.location.reload();
    });
    //点击关闭规则蒙板
    $('.resultLoading, .resultLoading img').on('touchstart click', function (event) {
        event.preventDefault();
        $('.resultLoading').addClass('none');
    });

    //点击logo
    // $('.logo').on('touchstart click', function (event) {
    //     event.preventDefault();
    //     var _index = $(this).parent('section').index();
    //     if (_index == $('.wrap section').length - 1) {
    //         $('.pg1').removeClass('none').siblings().addClass('none');
    //     } else {
    //         $(this).parent('section').addClass('none').next('section').removeClass('none');
    //     }
    // });
    $('.loading').addClass('none');
    oplisMusicPlayer(true);
}