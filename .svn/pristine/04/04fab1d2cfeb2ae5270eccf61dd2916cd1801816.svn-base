$(function () {
    // localStorage.setItem("first", "0");
    if($('body').find('.swiper-container').length>0){
        var mySwiper = new Swiper('.swiper-container', {
            speed: 800
        });
        if(sessionStorage.getItem("flag")==1&&sessionStorage.getItem('back')==1){

           $('.swiper-slide:nth-child(1)').hide();
            $('.swiper-slide:nth-child(2)').addClass('fadeIn');
            mySwiper.lockSwipes();
        }
        sessionStorage.setItem("back", "0");
    }
    //首页
    $('.btn-know').on('click',function () {
        $(this).prev('.regulation').hide();
        $(this).hide();
    });
    $('.box').on('click',function () {
        //0不是第一次 1是第一次
        if(sessionStorage.getItem("first")==1){
            sessionStorage.setItem("first", "0");
        }
        else{
            sessionStorage.setItem("first", "1");
        }
    });

    //详情页
    if($('body').find('.article').length>0){
        if(sessionStorage.getItem("flag")==1){
            $('.article .rem').hide();
        }
        $('.article .rem').one('click',function () {
            $(this).hide()
        });
        $('.article .btn-back').on('click',function () {
            sessionStorage.setItem("flag", "1");
            sessionStorage.setItem("back", "1");
            // localStorage.setItem("first", "0");

        });
        var url = $('#url').val();
        $('.article .btn-vote').on('click',function () {
            $.ajax({
                url:url,
                method:'GET',
                success:function (data) {
                    if(JSON.parse(data).code==200){
                        $('.article .shade-success').show();
                        $('.close').on('click',function () {
                            sessionStorage.setItem("flag", "1");
                            sessionStorage.setItem("back", "1");
                        })
                    }
                    else if(JSON.parse(data).code==304){
                        $('.article .shade-fail').show();
                    }
                    else if(JSON.parse(data).code==404){
                        alert('当前文章不存在 请您重试')
                    }
                }
            })
        });
    }


    //分享
    $('.share .btn-shareTimeline').on('click',function () {
        $(this).next('.shade-share_bg').show();
        $(this).next('.shade-share_bg').addClass('fadeIn')
    });
    $('.share .shade-share_bg').on('click',function () {
        $(this).hide();
        $(this).removeClass('fadeIn');
    });
    $('.share .btn-backList').on('click',function () {
        sessionStorage.setItem("flag", "1");
        sessionStorage.setItem("back", "1");
    })
});