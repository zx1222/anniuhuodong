 $(".wrapper").ready(
  function() {
    $(".u-pageLoading").hide();
    $(".wrapper").show();
      $(".logo").show();
    var nowpage = 0;

//      活动规则显示隐藏
      $(".activity-rule-btn").click(function(){
          $(".activity-rule-detail").show();
      })
      $(".activity-rule-detail-btn").click(function(){
          $(".activity-rule-detail").hide();
      })


        //点击领取红包
      $(".page2 .receive-award-ok").click(function(){
          $(".page2").removeClass("award-animation").hide();
          $(".page3").show();

      });
     //点击 再来一次
      $(".page2 .receive-award-again").click(function(){
          window.location.reload();
      });
        //关注二维码页面 点击关闭
      $(".page3 .qr-code-close").click(function(){
          $(".page3").hide();
      });
       //点击 了解安牛
      $(".page4 .anniu-btn").click(function(){
        $(".page4 .anniu-detail").show();
      });

    //点击 分享到朋友圈
      $(".page4 .share-btn").click(function(){
        $(".page4 .share-detail").show();
      })
    //点击弹窗的关闭 按钮
      $(".page4 .qr-code-close").click(function(){
          $(".page4 .anniu-detail").hide();
        $(".page4 .share-detail").hide();
      })

      //点击 再来一次
      $(".receive-award-again-last").click(function(){
          window.location.reload();
      })
}
);
