<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 16/5/5
 * Time: 下午10:34
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use app\modules\anniujianya\Asset;
use yii\widgets\ActiveForm;

$this->render('/layouts/_jsapi-share');
$ajaxUrl = Url::to(['lottery-run'], true);
$ajaxScoreUrl = Url::to(['score'], true);
$ajaxRankUrl = Url::to(['rank'], true);

$assetsUrl = Asset::getAssetUrl();
$imgUrl = Url::to('@web/img', true);
$this->title = '降压大作战';
$js = <<<JS
_assets_url = "{$assetsUrl}";
JS;
$this->registerJs($js, View::POS_HEAD);

unset($js);
$js = <<<JS
function showRank() {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        type: 'POST',
        url: '{$ajaxRankUrl}',
        dataType: 'json',
        data: { _csrf : csrfToken},
        cache: false,
        error: function() {
            alert('Sorry，出错了！');
            return false;
        },
        success: function(json) {
            $('#rank').empty();
            $.each(json.rank, function(index,item) {
              $('<ul><em>'+(index+1)+'</em><span>'+item.wx_username+'</span><strong>'+item.extra+'</strong></ul>').appendTo($('#rank'));
            });
            $('#my').empty();
            $('<span>'+json.my.name+'</span><strong>'+json.my.score+'</strong>').appendTo($('#my'));
        }
    });
    $('.pga').removeClass('none').siblings().addClass('none');

}

 function lottery() {
 
 var csrfToken = $('meta[name="csrf-token"]').attr("content");
 if($('.txt_phone').val() !== undefined ){
     
        if($('.txt_phone').val()==""){
          alert('请输入您的手机号。'); 
          return false;
        }else if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test($('.txt_phone').val()))){ 
          alert('您输入的手机号有误。');  
          return false;
        }
 }   
    $.ajax({
        type: 'POST',
        url: '{$ajaxUrl}',
        dataType: 'json',
         data: { _csrf : csrfToken,phone :$('.txt_phone').val()},
        cache: false,
        error: function() {
            alert('Sorry，出错了！');
            return false;
        },
        success: function(json) {
            var id = json.id; //中奖奖项标题
            if(id == 2){
                $('.pg6').removeClass('none').siblings().addClass('none');
            } else {
                $('.pg7').removeClass('none').siblings().addClass('none');
            }
        }
    });
 }
JS;
$this->registerJs($js, View::POS_END);

unset($js);
$js = <<<JS

 	var _arr_class = ['sub1','sub2','sub3','sub4','add1','add2','add3','add4'],
		_arr_num = ['-3','-3','-5','-10','+3','+5','+5','+8'],
		_arr_add = [2,3,3,4,5,7,7,8,9],//血压递增关卡
		_arr_an = ['txy3','txy4','txy5','txy6','txy7','txy8','txy9','txy10','txy11','txy11'],
		_add_lv = 100,//关卡升级系数
		_arrNum = 0,//目前关卡值
		_arrLis = [0,1,2,3,4,5,6,7,8,9,10,11],//可活动的下标
		_cound = 0;//分数值
		_startNum = 15,//初始血压值
		_addNum = 45,//目前血压增加值
		_endNum = 68,//终点血压值
		_speed = 500,//时间系数
		_timer = null,//计时器
		_game_num = 0,
		_timeNum = 0,//当前秒数
		_lis = $('.lisCon em'),
		_lisLen = _lis.length,
		_none = null;

	function timerStart(){
		_timer = setInterval(function(){
			_timeNum ++;
			for (var i = 0; i < _lisLen ; i++) {
				if ( (_lis.eq(i).attr('data-time') > 0 ) && (_timeNum - (_lis.eq(i).attr('data-time')) > 6) ) {
					_arrLis.push(i);
					_lis.eq(i).attr({
						'data-num' : ' ',
						'data-time' : ' ',
						'class' : ' '
					});
				};
			};
			var _eq = Math.floor(Math.random() * _arrLis.length);
			var _n = Math.floor(Math.random() * 8) , _class = 'type' + (_n + 1) ;
			_lis.eq(_arrLis[_eq]).attr({
				'data-num' : _arr_num[_n],
				'data-time' : _timeNum
			});
			_lis.eq(_arrLis[_eq]).addClass(_class + ' ' + _arr_an[Math.floor(_cound / _add_lv) > 9 ? 9 : Math.floor(_cound / _add_lv)] + ' ' + (_n < 4 ? 'colorSub' : 'colorAdd' ));
			_arrLis.splice(_eq,1);

			if (_timeNum % 2 == 0) {
				_addNum += _arr_add[Math.floor(_cound / _add_lv) > 9 ? 9 : Math.floor(_cound / _add_lv) ];
				$('.wdj ol span').width(_startNum + (_addNum < 0 ? 0 : _addNum) + '%');
				_addNum > _endNum ? gameEndFn() : function(){};
			};
		},_speed);
	}

	function gameCoundFn(){
	}

	function gameEndFn(){
		clearInterval(_timer);
		$('.pg3').addClass('none');
		$('.pg4_cound, .pg5_num').html(_cound);
		if(_cound <= 250){
           $('.pg4').removeClass('none');
       }else {
           $('.pg5').removeClass('none');
       }
		var csrfToken = $('meta[name="csrf-token"]').attr("content");
 
        $.ajax({
            type: 'POST',
            url: '{$ajaxScoreUrl}',
            dataType: 'json',
             data: { _csrf : csrfToken,score:_cound},
            cache: false,
            error: function() {
            },
            success: function(json) {
               
            }
        });
	}
	function gameStartFn(){
		timerStart();
	}

	_lis.on('touchstart',function(){
		if (!$(this).hasClass('ck')) {
			var _index = $(this).index(),_nu = parseInt($(this).attr('data-num'));
			$(this).addClass('ck');
			_addNum += parseInt($(this).attr('data-num'));
			$('.wdj ol span').width(_startNum + (_addNum < 0 ? 0 : _addNum)  + '%');
			if (_addNum > _endNum) {
				gameEndFn();
			};
			_nu < 0 ? $('.game_num').html(_cound -= _nu) : function(){};
		};
	});

JS;
$this->registerJs($js, View::POS_END);
?>

<!-- 测试信息 -->
<p class="oplisTestTxt none"></p>
<!-- loading -->
<div class="loading">
    <img src="<?= $assetsUrl; ?>/img/load.gif" alt="" class="pat db">
</div>
<!-- ajaxLoading -->
<div class="ajaxLoading none">
    <img src="<?= $assetsUrl; ?>/img/load.gif" alt="" class="pat db">
</div>
<!-- resultLoading -->
<div class="resultLoading ">
    <img src="<?= $assetsUrl; ?>/img/result.png" alt="" class="pat db">
</div>
<!-- 内容 -->
<div class="wrap">

    <!-- 首页 -->
    <section class=" pg1 ">
        <div class="dbw pab">
            <img src="<?= $assetsUrl; ?>/img/12.png" alt="" class="dbw prt">
            <img src="<?= $assetsUrl; ?>/img/btn_ready.png" alt="" class="dbw pab btn_ready">
        </div>
        <img src="<?= $assetsUrl; ?>/img/11.png" alt="" class="dbw pat">
        <div class="dbw prt">
            <img src="<?= $assetsUrl; ?>/img/logo.png" class="dbw prt op0">
            <img src="<?= $assetsUrl; ?>/img/btn_rank.png" class="dbh patr btn_rank z4">
        </div>
        <img src="<?= $assetsUrl; ?>/img/logo.png" class="dbw pat logo z3">
    </section>

    <!-- 角色选择页面 -->
    <section class=" pg2 none">
        <img src="<?= $assetsUrl; ?>/img/logo.png" class="dbw pat logo">
        <div class="pg2_con pat">
            <em class="pg2_btn  "></em>
            <em class="pg2_btn x2 "></em>
            <em class="pg2_btn x3 "></em>
            <em class="pg2_btn y2"></em>
            <em class="pg2_btn x2 y2"></em>
            <em class="pg2_btn x3 y2"></em>
            <img src="<?= $assetsUrl; ?>/img/22.png" class="dbw prt z1">
        </div>
        <div class="pg2_box ">
            <img src="<?= $assetsUrl; ?>/img/pg2_list1.png" alt="" class="dbw prt none">
            <img src="<?= $assetsUrl; ?>/img/pg2_list2.png" alt="" class="dbw prt none">
            <img src="<?= $assetsUrl; ?>/img/pg2_list3.png" alt="" class="dbw prt none">
            <img src="<?= $assetsUrl; ?>/img/pg2_list4.png" alt="" class="dbw prt none">
            <img src="<?= $assetsUrl; ?>/img/pg2_list5.png" alt="" class="dbw prt none">
            <img src="<?= $assetsUrl; ?>/img/pg2_list6.png" alt="" class="dbw prt none">
        </div>
        <img src="<?= $assetsUrl; ?>/img/btn_go.png" class="dbw pab btn_go none">
    </section>

    <!-- 游戏页 -->
    <section class=" pg3 none">
        <img src="<?= $assetsUrl; ?>/img/logo.png" class="dbw pat z3 logo">
        <div class="game_top dbw pat">
            <img src="<?= $assetsUrl; ?>/img/31.png" alt="" class="dbw prt">
            <div class="db wh pat">
                <span class="game_num">0</span>
            </div>
            <div class="wdj dbw pab">
                <ol class="dbw mga prt">
                    <img src="<?= $assetsUrl; ?>/img/lis/num_bg.png" class="dbw prt num_bg">
                    <span></span>
                    <img src="<?= $assetsUrl; ?>/img/lis/num_kd.png" class="dbw pat num_kd">
                </ol>
            </div>
        </div>

        <div class="dbw pab z1 lisCon" data-num='5'>
            <em></em>
            <em></em>
            <em></em>
            <em></em>
            <em></em>
            <em></em>
            <em></em>
            <em></em>
            <em></em>
            <em></em>
            <em></em>
            <em></em>
        </div>
        <img src="<?= $assetsUrl; ?>/img/game_bottom.png" alt="" class="dbw pab z2">
    </section>

    <!-- 游戏结束页 -->
    <section class=" pg4 none">
        <img src="<?= $assetsUrl; ?>/img/logo.png" class="dbw pat z3 logo">
        <div class="dbw pat ty50">
            <img src="<?= $assetsUrl; ?>/img/end.png" alt="" class="dbw prt ">
            <img src="<?= $assetsUrl; ?>/img/end.gif" alt="" class="pg4_gif">
            <em class="pg4_cound">0</em>
            <span class="pg4_btn_agin"></span>
            <span class="pg4_btn_over"></span>
        </div>
    </section>

    <!-- 输手机号领取红包 -->
    <section class=" pg5 none">
        <img src="<?= $assetsUrl; ?>/img/logo.png" class="dbw pat z3 logo">
        <div class="dbw pat ty50">
            <?php if(empty(Yii::$app->user->identity->mobile)):?>
                <img src="<?= $assetsUrl; ?>/img/51.png" alt="" class="dbw prt ">
            <?php else:?>
                <img src="<?= $assetsUrl; ?>/img/51_1.png" alt="" class="dbw prt ">
            <?php endif;?>
            <em class="pg5_num">0</em>
            <?php if(empty(Yii::$app->user->identity->mobile)):?>
                <input type="tel" class="pg5_input txt_phone" placeholder='请输入您的手机号' maxlength="11">
            <?php endif;?>
            <span class="pg5_btn_get"></span>
            <h5 class="btn_close"></h5>
        </div>
    </section>

    <!-- 一元红包 -->
    <section class=" pg6 none">
        <img src="<?= $assetsUrl; ?>/img/logo.png" class="dbw pat z3 logo">
        <div class="dbw pat ty50">
            <img src="<?= $assetsUrl; ?>/img/61.png" alt="" class="dbw prt ">
            <h5 class="btn_close"></h5>
        </div>
    </section>

    <!-- 谢谢参与 -->
    <section class=" pg7 none">
        <img src="<?= $assetsUrl; ?>/img/logo.png" class="dbw pat z3 logo">
        <div class="dbw pat ty50">
            <img src="<?= $assetsUrl; ?>/img/71.png" alt="" class="dbw prt ">
            <h5 class="btn_close"></h5>
        </div>
    </section>
    <!-- 请务必了解这些 -->

    <section class=" pg8 none">
        <img src="<?= $assetsUrl; ?>/img/logo.png" class="dbw pat z3 logo">
        <div class="dbw pat ty50">
            <img src="<?= $assetsUrl; ?>/img/81.png" alt="" class="dbw prt ">
            <em class="pg8_btn"></em>
        </div>
    </section>
    <!-- 支招 -->

    <section class=" pg9 none">
        <img src="<?= $assetsUrl; ?>/img/logo.png" class="dbw pat z3 logo">
        <div class="dbw pat ty50">
            <img src="<?= $assetsUrl; ?>/img/91.png" alt="" class="dbw prt ">
            <em class="pg9_btn_know"></em>
            <em class="pg9_btn_rank"></em>
            <em class="pg9_btn_share"></em>
        </div>
    </section>

    <!--关注安牛 -->
    <section class=" pg10 none">
        <img src="<?= $assetsUrl; ?>/img/logo.png" class="dbw pat z3 logo">
        <div class="dbw pat ty50">
            <img src="<?= $assetsUrl; ?>/img/101.png" alt="" class="dbw prt ">
            <h5 class="btn_close"></h5>
        </div>
    </section>
    <!--分享 -->
    <section class=" pg11 none">
        <img src="<?= $assetsUrl; ?>/img/logo.png" class="dbw pat z3 logo">
        <div class="dbw pat">
            <img src="<?= $assetsUrl; ?>/img/111.png" alt="" class="dbw prt ">
        </div>
    </section>
    <!-- 排行榜 -->

    <section class=" pga none">
        <img src="<?= $assetsUrl; ?>/img/logo.png" class="dbw pat z3 logo">
        <img src="<?= $assetsUrl; ?>/img/rank_head.png" class="dbw prt z1 logo">

        <div class="dbw prt z1 rank_lis">
            <dl id="rank">

            </dl>
            <p>我的得分：</p>
            <ul id="my">

            </ul>
            <p style="font-size: .33rem;color: #b5151f">活动已结束，积分不排名。</p>

        </div>
        <img src="<?= $assetsUrl; ?>/img/rank_btn.png" alt="" class="dbw prt mga rank_btn">
    </section>
</div>

