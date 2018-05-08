<?php
use app\modules\ejiaoduilian\Asset;

$wxJsApiConfig = json_encode(Yii::$app->wechat->jsApiConfig(['jsApiList' => ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ']]));

$shareUrl =  'http://ejiao2017duilian.sindcorp.net';
$shareDesc = '新年到，福利滚滚来！';
$shareImgUrl = Asset::getAssetUrl('images/title_logo.png');
$shareTitle = '新春福利 | 同仁堂阿胶邀您对春联，迎开门红！';
$js = <<<JS
wx.config({$wxJsApiConfig});
wx.ready(function () {
    // 在这里调用 API
    wx.onMenuShareTimeline({
        title: '{$shareTitle}', // 分享标题
        link: '{$shareUrl}', // 分享链接
        imgUrl: '{$shareImgUrl}', // 分享图标
    });
    wx.onMenuShareAppMessage({
        title: '{$shareTitle}', // 分享标题
        link: '{$shareUrl}', // 分享链接
        imgUrl: '{$shareImgUrl}', // 分享图标
        desc:'{$shareDesc}'
    });
    wx.onMenuShareQQ({
        title: '{$shareTitle}', // 分享标题
        link: '{$shareUrl}', // 分享链接
        imgUrl: '{$shareImgUrl}', // 分享图标
        desc:'{$shareDesc}'
    });
});

JS;
$this->registerJs($js);
