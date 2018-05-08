<?php
use app\modules\anniuzhengwen\Asset;
use yii\helpers\Url;

$wxJsApiConfig = json_encode(Yii::$app->exchange->jsApiConfig(['jsApiList' => ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ']]));
$shareUrl =  Url::home(true).'zhengwen';
$shareDesc = '请把票投给最让你感动的文章！';
$shareImgUrl = Asset::getAssetUrl('img/logo-share.jpg');
$shareTitle = '投票啦～安宫牛黄丸征文大赛第一名由你决定！';
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
