<?php
use app\modules\ejiaoaojiaodajie\Asset;
use yii\helpers\Url;

$wxJsApiConfig = json_encode(Yii::$app->exchange->jsApiConfig(['jsApiList' => ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ']]));

$shareUrl = isset($model) ? Url::to(['photo', 'id' => $model->id], true) : Url::home(true);
$shareDesc = '首届"金牌熬胶员评选大赛"火热投票中,点击参与活动.';
$shareImgUrl = Asset::getAssetUrl('images/share-image.png');
$shareTitle = '为TA投票,还能参与抽奖~';
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
