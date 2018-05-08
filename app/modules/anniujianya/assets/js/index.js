                                //////////////////////////////////////////////////////////////////// 
                                //                            _ooOoo_                             // 
                                //                           o8888888o                            // 
                                //                           88' . '88                            // 
                                //                           (| ^_^ |)                            // 
                                //       永                  O\  =  /O                 绝         // 
                                //                        ____/`---'\____                         // 
                                //       无             .'  \\|     |//  `.            不         // 
                                //                     /  \\|||  :  |||//  \                      // 
                                //       八           /  _||||| -:- |||||-  \          修         // 
                                //                    |   | \\\  -  /// |   |                     // 
                                //       哥           | \_|  ''\---/''  |   |          改         // 
                                //                    \  .-\__  `-`  ___/-. /                     // 
                                //                  ___`. .'  /--.--\  `. . ___                   // 
                                //                .'' '<  `.___\_<|>_/___.'  >'''.                // 
                                //              | | :  `- \`.;`\ _ /`;.`/ - ` : | |               // 
                                //              \  \ `-.   \_ __\ /__ _/   .-` /  /               // 
                                //        ========`-.____`-.___\_____/___.-`____.-'========       // 
                                //                             `=---='                            // 
                                //        ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^      // 
                                //                                                                // 
                                ////////////////////////////////////////////////////////////////////   —— oplis.js V1.0 2015.12.31


$(function(){
	//--------------------window发生改变时 
	  function oplisWinResizeFn(){
			var opliswinWpx = $(".wrap").width(),oplisWinHpx = $(".wrap").height(), _txt , lwq_width = ((parseInt(opliswinWpx)/7.5)) + "px";$("html,body").css("font-size",lwq_width); _txt = parseInt(oplisWinHpx/opliswinWpx * 100) / 100;
			// $(".oplisTestTxt").html(_txt);
			if( _txt < 1.32){
			}else if( _txt < 1.35){
			}else if( _txt < 1.4){
			}else if( _txt < 1.45){
			}else if( _txt < 1.5){
			}else if( _txt < 1.55){
			}else if( _txt < 1.6){
			}else if( _txt < 1.65){
			}
		}oplisWinResizeFn();
		$(".wrap").resize(function(){
			oplisWinResizeFn();
		})
	//--------------------window发生改变时end




    //--------------------判断屏幕滚动
      // $(window).scroll(function(){
      // 　　var scrollTop = $(this).scrollTop();
      // 　　var scrollHeight = $(document).height();
      // 　　var windowHeight = $(this).height();
      //     $(window).resize(function(){
      //         var scrollTop = $(this).scrollTop();
      //     　　var scrollHeight = $(document).height();
      //     　　var windowHeight = $(this).height();
      //     })
      // 　　if(scrollTop + windowHeight >= scrollHeight){
      // 　　　　$(".nva").addClass("none");
      //         console.log("TTT");
      // 　　} else{
      //         console.log("FFF");
      //         $(".nva").removeClass("none");
      //     }
      // });
    //--------------------判断屏幕滚动end

    //--------------------正则判断
      $(".btn_submit").click(function(){
        if($('.txt_name').val()==""){
          alert('请输入您的主宾姓名。');  
        }else if(!(/^[a-zA-Z\u4E00-\u9FA5]{2,15}$/.test($('.txt_name').val()))){
          alert('您输入的主宾姓名格式有误。'); 
        }else if(!(/^[a-zA-Z\u4E00-\u9FA5]{2,15}$/.test($('.txt_name2').val())) && $('.txt_name2').val()!=""){
          alert('您输入的从宾姓名格式有误。'); 
        }else if($('.txt_phone').val()==""){
          alert('请输入您的手机号。'); 
        }else if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test($('.txt_phone').val()))){ 
          alert('您输入的手机号有误。');  
        }else if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test($('.txt_phone2').val())) && $('.txt_phone2').val()!=""){ 
          alert('您输入的从宾手机号有误。');  
        }else if($('.profession').val()==""){
          alert('请选择您的职业。');  
        }else if($('.province').val()==""){
          alert('请选择您的省份。');  
        }else if($('.city').val()==""){
          alert('请选择您的城市。');  
        }else if($('.agency').val()==""){
          alert('请选择经销商。'); 
        }else if($('.Models').val()==""){
          alert('请选择意向车型。');  
        }else if($('.buy_time').val()==""){
          alert('请选择预计购车时间。');  
        }else if(!$('.agreement').hasClass('agreement_h')){
          alert('请勾选协议。');  
        }else{
          alert('预约成功！'); 
        }
        
        if($(".radio_boy").hasClass('radio_h')){
          $(".sex").val('1');
        }else{
          $(".sex").val('0');
        }
      });
    //--------------------正则判断end

    //--------------------ajax

      // $("#join_qy_serBtn").on('touchstart',function(){
      //   //搜索
      //   //ajax
      //   $(".ajaxLoading").removeClass("none");
      //   var txt1 = $("#ser_qy_txt").val();//企业
      //   var data ={};
      //   data.keyword = txt1;//查询字段
      //   data.page = 1;//查询字段
      //   var url = contextPath + "/api/org/list.json";
      //   $.ajax({
      //     type: "POST",
      //     url: url,
      //     data: data,
      //     success: function(data, textStatus) {
      //       if (data.exception_message != undefined) {
      //         $(".ajaxLoading").addClass("none");
      //         alert(data.exception_message);
      //       }else if(data.exception != undefined){
      //         $(".ajaxLoading").addClass("none");
      //         alert("请求失败");
      //       }else{
      //         //alert(data.recordset);
      //         var len = data.recordset.length;
      //         var txtHtml = '';
      //         for (var i = 0; i < len; i++) {
      //           var qiYeImgUrl = data.recordset[i].org_logo;
      //           if (qiYeImgUrl == undefined) {
      //             qiYeImgUrl = "/plus/reg/reg_logo.png";
      //           };
      //           txtHtml += "<ul>"+
      //           "<img src='" + qiYeImgUrl + "'>"+
      //           "<em>"+ data.recordset[i].name + "</em>"+
      //           "<span id='"+ data.recordset[i].id +"'>加入</span>"+
      //           "</ul>";
      //         };
      //         $(".ajaxLoading").addClass("none");
      //         $(".join_qy .join_result").html(txtHtml);
      //       }
      //       $(".ajaxLoading").addClass("none");
      //     },
      //     error:function(XMLHttpRequest,textStatus,errorThrown){
      //       $(".ajaxLoading").addClass("none");
      //       alert("请求失败！");
      //     }
      //   });
      // })
    //--------------------ajaxEnd





});


window.onload = function() {


$('.loading').addClass('none');
}



//--------------------音乐播放
  /*
   * 需要音乐模块直接调用下面方法
   * 需要在根目录创建“m”文件夹，里面需要有以下文件
    "0.png"-音乐停止图标
    "1.png"-"音乐播放时图标"
    "bgm.mp3"-音乐文件
   * 需要音乐模块直接调用下面方法
   * oplisMusicPlayer(true);//参数为true时候自动播放
   * oplisBgmPlayFn();//音乐播放
   * oplisBgmPauseFn();//音乐暂停
   */
    var oplisIsPlay = false,/* 播放状态 */ oplisWinTap = false,/* 是否点击过 */ oplisMusicVal = '',/* 自定义音乐dom */ oplisMusicValAutoPlay = "<audio src='m/bgm.mp3' id='Jaudio' class='audio' autoplay='autoplay' preload='preload' loop='loop'></audio>",/* 自动播放audio标签 */ oplisMusicValPause = "<audio src='m/bgm.mp3' class='audio' preload='preload' loop='loop'></audio>",/* 不自动播放audio标签 */ oplisMusicDom = "<div class='bgm '><span class='bgm_btn'></span><img src='m/1.png' ></div><style> @-webkit-keyframes oplisMusicPlayerAnKey {0%{-webkit-transform:rotateZ(0deg);}100% {-webkit-transform:rotateZ(360deg);}} @keyframes oplisMusicPlayerAnKey {0%{transform:rotateZ(0deg);}100% {transform:rotateZ(360deg);}} .bgm{position: absolute;position: fixed;z-index: 888;top: 2%;right: 4%;width: 10%;} .bgm span{position: absolute; top: 0; left: 0; display: block; width: 100%; height: 100%; z-index: 222; background: url('m/0.png') no-repeat; background-size: 100% 100%; } .bgm img{position: relative; top: 0; left: 0; display:block; width: 100%; z-index: 111; opacity: 0;} html body .bgm .bgmTurn{-webkit-transform-origin:50% 50%; -webkit-animation:oplisMusicPlayerAnKey 1.5s linear infinite; transform-origin:50% 50%; animation:oplisMusicPlayerAnKey 1.5s linear infinite; background: url('m/1.png') no-repeat; background-size: 100% 100%; } </style> ";/* 音乐图标DOM+CSS */ /* 兼容微信的音乐自动播放 */ function audioAutoPlay(id){var audio = document.getElementById(id), play = function(){audio.play(); oplisWinTap = true; document.removeEventListener("touchstart",play, false); document.removeEventListener("WeixinJSBridgeReady", false); }; audio.play(); document.addEventListener("WeixinJSBridgeReady", function () {play(); }, false); document.addEventListener("touchstart",play, false); }; /* 获取bool参数判断是否自动播放 */ function oplisMusicPlayer(bool){if (bool == true) {/* 自动播放 */ oplisMusicDom += oplisMusicValAutoPlay; $("body").append(oplisMusicDom); audioAutoPlay('Jaudio'); oplisBgmPlayFn(); oplisIsPlay = true; }else{oplisWinTap = true; oplisMusicDom += oplisMusicValPause; $("body").append(oplisMusicDom); } /* 点击切换播放/暂停 */ $(".bgm span").on("touchstart",function() {if (oplisWinTap) {oplisIsPlay = !oplisIsPlay; oplisIsPlay ? oplisBgmPlayFn() : oplisBgmPauseFn(); }; }); } /* 音乐播放 */ function oplisBgmPlayFn() {$('.audio')[0].play(); $(".bgm_btn").addClass("bgmTurn"); } /* 音乐暂停 */ function oplisBgmPauseFn(){$('.audio')[0].pause(); $(".bgm_btn").removeClass("bgmTurn"); }
//--------------------音乐播放end


//-------------------判断 ios/android
                    //判断是否wifi环境
  /*
   * ----------------------------判断ios/android 判断方向（俩个方向相反）
   * oplisIsIos()//返回值为： true 时为IOS
   * -----------------------
   * ----------------------------判断是否wifi环境
   * oplisIsWifi()//返回值为： true 时为wifi
   * -----------------------
   */
  function oplisIsIos() {var phoneType = false; if (/ipad|iphone|mac/i.test(navigator.userAgent)) {phoneType = true; } return phoneType; };
  function oplisIsWifi() {var isWifi = false; if (/wifi/i.test(navigator.userAgent)) {isWifi = true; } return isWifi; };
  $('.oplisTestTxt').html(navigator.userAgent);
//-------------------判断ios/android end


//--------------------屏幕滚动
  /*
   * 禁止屏幕滚动
   * 恢复滚动 oplisMoveTrueFn();
   * 禁止滚动 oplisMoveFalseFn();
  */
  // oplisMoveFalseFn();
  function oplisMoveTrueFn(){$(window).unbind('touchmove'); }; function oplisMoveFalseFn(){$(window).bind('touchmove', function (event) {event.preventDefault(); }); };
//--------------------屏幕滚动end










