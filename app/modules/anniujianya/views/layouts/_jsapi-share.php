<?php
use app\modules\anniujianya\Asset;

$wxJsApiConfig = json_encode(Yii::$app->wechat->jsApiConfig(['jsApiList' => ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ']]));

$shareUrl =  'http://anniu2017jianya.sindcorp.net';
$shareDesc = '好礼抢到手软~';
$shareImgUrl = Asset::getAssetUrl('img/title-logo.png');
$shareTitle = '和同仁堂一起帮妈妈“降压”，更有机会为妈妈赢得手机、kindle等母亲节大礼';
$js = <<<JS
wx.config({$wxJsApiConfig});
wx.ready(function () {
    // 在这里调用 API
    wx.onMenuShareTimeline({
        title: '{$shareTitle}', // 分享标题
        link: '{$shareUrl}', // 分享链接
        imgUrl: '{$shareImgUrl}', // 分享图标
        success: function () { 
        // 用户确认分享后执行的回调函数
        MtaH5.clickShare('wechat_moments');  //这里加上h5分享代码
    }
    });
    wx.onMenuShareAppMessage({
        title: '{$shareTitle}', // 分享标题
        link: '{$shareUrl}', // 分享链接
        imgUrl: '{$shareImgUrl}', // 分享图标
        desc:'{$shareDesc}',
          success: function () { 
        // 用户确认分享后执行的回调函数
        MtaH5.clickShare('wechat_friend');  //这里加上h5分享代码
    }
    });
    wx.onMenuShareQQ({
        title: '{$shareTitle}', // 分享标题
        link: '{$shareUrl}', // 分享链接
        imgUrl: '{$shareImgUrl}', // 分享图标
        desc:'{$shareDesc}',
          success: function () { 
        // 用户确认分享后执行的回调函数
        MtaH5.clickShare('qq');  //这里加上h5分享代码
    }
    
    });
});

JS;
$this->registerJs($js,\yii\web\View::POS_END);
