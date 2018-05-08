<?php
use app\modules\ejiaoaojiaodajie\Asset;
use yii\helpers\Html;
$this->render('/layouts/_jsapi-share');

?>
<div class="page1 page">
    <!--首页-->
    <div class="logo" id="logo">
        <!-- logo -->
    </div>
    <div class="topstrap bg-post"></div>
    <div class="title bg-post page-post-center"></div>
    <div class="themewords  bg-post page-post-center"></div>
    <div class="go bg-post page-post-center"><?= Html::a(' ',['exhibition'],['class'=>'btn-block go-link'])?></div>
    <div class="house-one bg-post"></div>
    <div class="ejiaodajie-icon bg-post " style="opacity: 0"></div>
    <!--遮罩层-->
    <div class="mask bg-post"></div>
    <!--活动介绍-->
    <div class="activity-info bg-post page-post-center">
        <div class="close bg-post"></div>
    </div>
</div>