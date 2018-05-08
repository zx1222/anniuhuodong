<?php
use app\modules\fathersday\Asset;
use yii\helpers\Html;
$this->render('/layouts/_jsapi-share');

?>

<div class="arrow">
    <!-- 下滑向上箭头 -->
</div>

<div class="wrapper wrapper-main">
    <div class="page1 page">
        <div class="page1-center bg-post">
            <!-- 第一页内容图 -->
        </div>
        <div class="page1-photo-main bg-post">
            <div class="page1-photo bg-post">
                <!-- 第一页照片 -->
            </div>
        </div>

        <div class="fish bg-post">
            <!-- 右上角鱼 -->
        </div>
        <div class="leaf-first bg-post">
            <!-- 左边树叶 -->
        </div>
        <div class="leaf-last bg-post">
            <!-- 右边树叶 -->
        </div>

    </div>
    <div class="page2 page">
        <div class="page2-center bg-post">
            <!-- 第二页内容图 -->
        </div>
        <div class="page2-photo-first bg-post">
            <!-- 第二页左侧相片 -->
            <div class="bg-post photo-border"></div>
        </div>
        <div class="page2-photo-last bg-post">
            <!-- 第二页右侧相片 -->
            <div class="bg-post photo-border"></div>
        </div>
        <div class="fish bg-post">
            <!-- 右上角鱼 -->
        </div>
        <div class="leaf-first bg-post">
            <!-- 左侧树叶 -->
        </div>
        <div class="leaf-last bg-post">
            <!-- 右侧树叶 -->
        </div>

    </div>
    <div class="page3 page">
        <div class="page3-center bg-post">
            <!-- 第三页内容图 -->
        </div>
        <div class="page3-photo-first bg-post">
            <!-- 第三页左侧相片 -->
            <div class="bg-post photo-border"></div>
        </div>
        <div class="page3-photo-last bg-post">
            <!-- 第三页右侧相片 -->
            <div class="bg-post photo-border"></div>
        </div>
        <div class="fish bg-post">
            <!-- 右上角鱼 -->
        </div>
        <div class="leaf-first bg-post">
            <!-- 左侧树叶 -->
        </div>
        <div class="leaf-last bg-post">
            <!-- 右侧树叶 -->
        </div>

    </div>
    <div class="page4 page">
        <div class="page4-center bg-post">
            <!-- 第四页内容图 -->
        </div>
        <div class="page4-photo-first bg-post">
            <!-- 第四页左侧相片 -->
            <div class="bg-post photo-border"></div>
        </div>
        <div class="page4-photo-last bg-post">
            <!-- 第四页右侧相片 -->
            <div class="bg-post photo-border"></div>
        </div>
        <div class="fish bg-post">
            <!-- 右上角鱼 -->
        </div>
        <div class="leaf-first bg-post">
            <!-- 左侧树叶 -->
        </div>
        <div class="leaf-last bg-post">
            <!-- 右侧树叶 -->
        </div>


    </div>
    <div class="page11 page">
        <div class="title-cloud bg-post">
            <!-- 右上角三块小云 -->
        </div>
        <div class="page11-title bg-post">
            <!-- 云 大标题 -->
        </div>
        <div class="page11-text bg-post">
            <!-- 内容 -->
        </div>
        <div class="page11-ico-1 bg-post">
            <!-- 一等奖 -->
        </div>
        <div class="page11-ico-2 bg-post">
            <!-- 二等奖 -->
        </div>
        <div class="page11-ico-3 bg-post">
            <!-- 三等奖 -->
        </div>
        <div class="page11-help-ico bg-post">
            <!-- 帮助 -->
        </div>
        <div class="page11-into bg-post">
            <?= Html::a('', ['/fathersday/default/campaign'], ['class' => 'a-btn']) ?>

            <!-- 进入活动按钮 -->
        </div>
        <div class="page11-understand bg-post">
            <?= Html::a('', ['/fathersday/default/exhibition'], ['class' => 'a-btn']) ?>
            <!-- 看看他人照片按钮 -->
        </div>
        <div class="fish bg-post">
            <!-- 右上角鱼 -->
        </div>
        <div class="leaf-first bg-post">
            <!-- 左边树叶 -->
        </div>
        <div class="leaf-last bg-post">
            <!-- 右边树叶 -->
        </div>
        <!-- 帮助说明页 -->
        <div class="page11-help page-inner" style="display: none;">
            <div class="page11-help-text bg-post">
                <!-- 页面内容 -->
            </div>
            <div class="page11-title-cloud bg-post">
                <!-- 右上角三块小云 -->
            </div>
            <div class="fish bg-post">
                <!-- 右上角鱼 -->
            </div>
            <div class="leaf-first bg-post">
                <!-- 左边树叶 -->
            </div>
            <div class="leaf-last bg-post">
                <!-- 右边树叶 -->
            </div>
            <div class="page11-help-return bg-post">
                <!-- 返回按钮 -->
            </div>
        </div>
        
    </div>
</div>
