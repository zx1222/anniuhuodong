<?php
use app\modules\ejiaoyuandan\Asset;

$wxJsApiConfig = json_encode(Yii::$app->wechat->jsApiConfig(['jsApiList' => ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ']]));

$shareUrl = isset($model) ? \yii\helpers\Url::to(['photo', 'id' => $model->id], true) : 'http://ejiao.sindcorp.net/ejiaoaojiaodajie';
$shareDesc = '为TA投票,还能参与抽奖~';
$shareImgUrl = Asset::getAssetUrl('images/title-logo.jpg');
$shareTitle = '首届"金牌熬胶员评选大赛"火热投票中,点击参与活动.';
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
$this->registerJs($js);
