/**
 * Created by Miinno-13 on 2017/10/17.
 */
$(function () {
    url = $("#data-module").val();
    //设置答对题目数量
    sessionStorage.setItem('correctCount', 0);
    //存储当前关卡数
    sessionStorage.setItem('level', '1');
    //参数设置
    initOption = {
        //每一关题目数量
        questionNum: 5,
        //关数
        levelNum: 3
    };
    //题目索引
    indexArr = ['壹', '贰', '叁', '肆', '伍', '陆', '柒', '捌', '玖', '拾', '拾壹', '拾贰', '拾叁', '拾肆',
        '拾伍', '拾陆', '拾柒', '拾捌', '拾玖', '贰拾', '贰拾壹', '贰拾贰', '贰拾叁', '贰拾肆', '贰拾伍', '贰拾陆', '贰拾柒',
        '贰拾捌', '贰拾玖', '叁拾'];

    //首页
    if ($('body').find('.cover').length > 0) {
        //设置抽奖次数
        sessionStorage.setItem('lotteryCount', 0);

        //关闭规则
        $('.btn-know').on('click', function () {
            $('.shade-regulation').hide();
            $(this).hide();
        });

        var mySwiper = initSwiper();
        mySwiper.lockSwipes();

        //开始答题
        //当前关卡所有题目
        questionArr = [];
        //选择的的选项
        selectedOption = '';
        $('.btn-start').on('click', function () {
            $.ajax({
                url: url + '/default/question',
                data: {
                    category: parseInt(sessionStorage.getItem('level'))
                },
                success: function (res) {
                    var data = JSON.parse(res);
                    questionArr = data;
                    $('.question-content').empty();
                    $('.questionIndex span').text(indexArr[sessionStorage.getItem('correctCount')]);
                    var parent = $('.question-content');
                    createQuestion(parent, data[0]);
                }
            });
            mySwiper.unlockSwipes();
            mySwiper.slideTo(1, 1000, false);
            mySwiper.lockSwipes();
        });

        //答错 一次抽奖机会都没有 再来一次
        $('.btn-tryAgain').on('click', function () {
            //答对题目数量清空
            sessionStorage.setItem('correctCount', '0');
            $(this).parents('.shade').hide();

            $.ajax({
                url: url + '/default/question',
                data: {
                    category: parseInt(sessionStorage.getItem('level'))
                },
                success: function (res) {
                    var data = JSON.parse(res);
                    questionArr = data;
                    $('.question-content').empty();
                    $('.questionIndex span').text(indexArr[sessionStorage.getItem('correctCount')]);
                    var parent = $('.question-content');
                    createQuestion(parent, data[0]);
                }
            });

        });

        //过关当前关卡 继续答题 请求下一关题目
        $('.btn-continuePlay').on('click', function () {
            var correctCount = parseInt(sessionStorage.getItem('correctCount'));
            var level = sessionStorage.getItem('level');
            $.ajax({
                url: url + '/default/question',
                data: {
                    category: level
                },
                success: function (res) {
                    //更新题目
                    questionArr = JSON.parse(res);
                    var obj = questionArr[correctCount - (level - 1) * initOption.questionNum];
                    $('.questionIndex span').text(indexArr[correctCount]);

                    $('.question-content').empty();
                    createQuestion($('.question-content'), obj);
                }
            });
            $(this).parents('.shade').hide();
        });
    }

    //抽奖
    if ($('body').find('.lottery').length > 0) {
        var mySwiper = initSwiper();
        mySwiper.lockSwipes();

        //从存储中提取抽奖次数
        var lotteryText = "<p class='lotteryCount'><b>" + sessionStorage.getItem('lotteryCount') + "</b></p>";
        $('.turntable-label').append(lotteryText);


        $('.btn-draw').on('click', function () {
            //抽奖机会数量
            var lotteryCount = sessionStorage.getItem('lotteryCount');
            if (lotteryCount > 0) {
                lottery(url);
                sessionStorage.setItem('lotteryCount', lotteryCount - 1);
                $('.turntable-label').removeClass('slideDown');
                $('.turntable-label').addClass('slideUp');
                setTimeout(function () {
                    $('.turntable-label').removeClass('slideUp');
                    $('.turntable-label').addClass('slideDown');
                }, 2000);
                $('.lotteryCount').text(lotteryCount - 1);
            }
            //抽奖机会用尽中过奖
            else if (lotteryCount <= 0 && sessionStorage.getItem('win') == 1) {
                $('.shade-chanceEnd1').show();
            }
            //抽奖机会用尽没有中过奖
            else if (lotteryCount <= 0 && sessionStorage.getItem('win') != 1) {
                $('.shade-chanceEnd0').show();
            }
        });

        //点击继续抽奖
        $('.btn-continueDraw').on('click', function () {
            $(this).parent('.shade').hide()
        });

        $('.swiper-slide:nth-child(1) .close').on('click', function () {
            mySwiper.unlockSwipes();
            $(this).hide();
            mySwiper.slideTo(1, 1000, false);
            mySwiper.lockSwipes();
        });

        //封底页
        $('.btn-anniu').on('click', function () {
            $('.shade-anniu').show();
            $('.swiper-slide:nth-child(2) .close').show();
        });
        $('.btn-share').on('click', function () {
            $('.shade-share').show();
        });
        $('.swiper-slide:nth-child(2) .close').on('click', function () {
            $('.shade-anniu').hide();
            $(this).hide();
        });
    }
    $('.shade-share').on('click', function () {
        $(this).hide()
    })
});
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
            $(".turntable").rotate({
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

//创建题目选项
function createQuestion(parent, obj) {
    var options = parent.children('.options');
    var title = "<p class='title'>" + obj.title + "</p>";
    var author = "<p class='author'>" + obj.author + "</p>";
    var questionArr = obj.question.split(/[, ，。]/);
    var question = '';
    questionArr.forEach(function (item, index) {
        if (index % 2 != 1&&index<questionArr.length-2) {
            question += "<p>" + item + "，</p><br>"
        }
        else if (index % 2 == 1&&index<questionArr.length-2) {
            question += "<p>" + item + "。</p><br>"
        }
        else if(index==questionArr.length-2) {
            question += "<p>" + item + "。</p>"
        }
    });

    var question = "<div class='question' data-id=" + obj.id + ">" + question + "<br></div>";

    parent.append("<div class='options'></div>");
    options = $('.options')
    obj.choice.forEach(function (item, index) {
        if (index == 0) {
            var key = 'a';
        }
        else if (index == 1) {
            key = 'b'
        }
        var iconSelect = $('#data-select').val();
        var iconOption = $('#data-marquee').val();
        var option = "<div class='option' onclick='selectOption($(this))'><p> " + item + "</p><img class='select' style='display: none' src=" + iconSelect + " data-key=" + key + "><img class='marquee' src=" + iconOption + "></div>";
        options.append(option);
    });
    parent.append(title);
    parent.append(author);
    parent.append(question);
    parent.append(options)
    if(questionArr.length<=3){
        $('.questions .question-content .question').css('marginTop','8%')
    }
}

//选择选项
function selectOption(e) {
    $('.select').hide();
    $(e).children('.select').show();
    selectedOption = $(e).children('.select').data('key');

    var level = parseInt(sessionStorage.getItem('level'));
    var correctCount = parseInt(sessionStorage.getItem('correctCount'));
    var lotteryCount = parseInt(sessionStorage.getItem('lotteryCount'));
    var obj = questionArr[correctCount - (level - 1) * initOption.questionNum + 1];
    if (selectedOption != '') {
        $.ajax({
            url: url + '/default/answer',
            data: {
                answer: selectedOption,
                question: $('.question').attr('data-id')
            },
            success: function (res) {
                //答对了但是不是关卡的最后一道
                if (res == 0 && (correctCount + 1) % initOption.questionNum != 0) {
                    //答对的次数
                    sessionStorage.setItem('correctCount', correctCount + 1);
                    //更新题目
                    $('.question-content').empty();
                    createQuestion($('.question-content'), obj);
                    $('.questionIndex span').text(indexArr[correctCount+1]);
                }
                //关卡的最后一题 但是不是整个试卷的最后一题
                else if (res == 0 && (correctCount + 1) % initOption.questionNum == 0 && (correctCount + 1) != initOption.questionNum * initOption.levelNum) {
                    //关卡数+1
                    sessionStorage.setItem('level', level + 1);
                    sessionStorage.setItem('correctCount', correctCount + 1);
                    sessionStorage.setItem('lotteryCount', lotteryCount + 1);
                    $('.shade-passOne .lotteryCount').text((correctCount + 1) / initOption.questionNum);
                    $('.shade-passOne').show();
                    $('.questionIndex span').text(indexArr[correctCount+1]);
                }
                //整个试卷的最后一题
                else if (res == 0 && (correctCount + 1) % initOption.questionNum == 0 && (correctCount + 1) == initOption.questionNum * initOption.levelNum) {
                    sessionStorage.setItem('correctCount', correctCount + 1);
                    sessionStorage.setItem('lotteryCount', lotteryCount + 1);
                    $('.shade-passAll').show();
                    $('.questionIndex span').text(indexArr[correctCount+1]);
                }
                //没有抽奖机会
                else if ((correctCount + 1) <= initOption.questionNum && res == 1) {
                    $('.shade-noChance').show();
                }
                //答错但是通过了某一关
                else if ((correctCount + 1) > initOption.questionNum && (correctCount + 1) < initOption.questionNum * initOption.levelNum && res == 1) {
                    $('.shade-hasChance').show();
                }
            }
        })
    }
    else {
    }
}

//初始化swiper
function initSwiper() {
    var mySwiper = new Swiper('.swiper-container', {
        direction: 'vertical'
    });
    return mySwiper
}

