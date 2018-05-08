<?php
use app\modules\fathersday\Asset;
use yii\helpers\Html;
use yii\widgets\ListView;
use nirvana\infinitescroll\InfiniteScrollPager;

use yii\helpers\Url;
$this->render('/layouts/_jsapi-share');

?>
<div class="exhibition-main page">
    <div class="exhibition-top bg-post">
        <!-- 标题和搜索框背景 -->
    </div>
    <div class="exhibition-center bg-post">
        <!-- 标题和搜索框背景 -->
    </div>
    <div class="title-cloud bg-post">
        <!-- 右上角三块小云 -->
    </div>
    <div class="fish bg-post">
        <!-- 右上角鱼 -->
    </div>


    <div class="exhibition-search bg-post">
        <form action="<?= Url::canonical()?>" method="post">
            <input type="text" name="no" class="" placeholder="请输入选手编号">
            <button type="submit" class="">搜索</button>
            <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        </form>
    </div>
    <div class="exhibition-content bg-post">
        <?php
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'id' => 'my-listview-id',
            'itemView' => '_item',
//    'layout' => "{summary}\n<div class=\"items\">{items}</div>\n{pager}",
            'layout' => "<div class=\"items\">{items}</div>\n{pager}",
            'pager' => [
                'class' => InfiniteScrollPager::className(),
                'widgetId' => 'my-listview-id',
                'itemsCssClass' => 'items',
                'contentLoadedCallback' => 'console.log()',
                'nextPageLabel' => '',
                'linkOptions' => [
                    'class' => 'btn btn-primary',
                ],
                'pluginOptions' => [
                    'loading' => [
                        'msgText' => "<em>加载中...</em>",
                        'finishedMsg' => "<em>没有更多可以看了.</em>",
                    ],
                    'behavior' => InfiniteScrollPager::BEHAVIOR_TWITTER,
                ],
            ],
        ]);
        ?>


    </div>

    <div class="leaf-first bg-post">
        <!-- 左边树叶 -->
    </div>
    <div class="leaf-last bg-post">
        <!-- 右边树叶 -->
    </div>
    <div class="aircraft bg-post">
        <!--  左 边飞机 -->
    </div>


</div>
