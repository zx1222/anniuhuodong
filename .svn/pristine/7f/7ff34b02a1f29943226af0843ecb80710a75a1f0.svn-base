<?php

$wxJsApiConfig = json_encode(Yii::$app->exchange->jsApiConfig(['jsApiList' => ['hideMenuItems']])) ;
$js = <<<JS
  wx.config({$wxJsApiConfig});
    wx.ready(function () {
        wx.hideOptionMenu();
    });
JS;
$this->registerJs($js);
