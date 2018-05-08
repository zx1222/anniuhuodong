<?php
use app\modules\chongyang\Asset;

$wxJsApiConfig = json_encode(Yii::$app->wechat->jsApiConfig(['jsApiList' => ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ']]));

$shareUrl = isset($model) ? \yii\helpers\Url::to(['photo', 'id' => $model->id], true) : 'http://anniu2016chongyang.sindcorp.net';
$shareDesc = '重阳节，是一个赏秋的节日。当与家人面对这秋季三千大好美景时，你是否还能吟出那些当年学过的绝美诗句？';
$shareImgUrl = Asset::getAssetUrl('images/title_logo.png');
$shareTitle = '重阳节诗词大会开始啦，你来就有奖！';
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
