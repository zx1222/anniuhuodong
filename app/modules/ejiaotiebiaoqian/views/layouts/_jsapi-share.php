<?php
use app\modules\ejiaotiebiaoqian\Asset;
use yii\helpers\Url;

$wxJsApiConfig = json_encode(Yii::$app->exchange->jsApiConfig(['jsApiList' => ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ']]));

$shareUrl = isset($myself) ? Url::to(['default/index'], true) : Url::home(true);
$shareDesc = '万年备胎转正的机会就在眼前，快来参加我的后宫大选吧!';
$shareImgUrl = Asset::getAssetUrl('images/logo-share.jpg');
$shareTitle = '给我一个翻你牌子的机会';
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
        desc:'{$shareDesc}',
    });
    wx.onMenuShareQQ({
        title: '{$shareTitle}', // 分享标题
        link: '{$shareUrl}', // 分享链接
        imgUrl: '{$shareImgUrl}', // 分享图标
        desc:'{$shareDesc}',
    });
});

JS;
$this->registerJs($js);
