<?php
use app\modules\ejiaoaojiaodajie\Asset;
use yii\helpers\Html;
use yii\widgets\ListView;
use nirvana\infinitescroll\InfiniteScrollPager;

use yii\helpers\Url;

$this->render('/layouts/_jsapi-share');

?>

<div class="page2 page">
    <!--所有参与者页面-->

    <div class="logo" id="logo">
        <!-- logo -->
    </div>
    <div class="topstrap bg-post"></div>
    <div class="title bg-post page-post-center"></div>
    <div class="search page-post-center bg-post">
        <form action="<?= Url::canonical() ?>" method="get">
            <div class="input-group">
                <input type="text" name="no" class="form-control" placeholder="请输入熬胶员编号或姓名">
                <span class="input-group-btn">
                    <button class="btn btn-default search-button" type="submit"></button>
                </span>
            </div>
        </form>
    </div>
    <div class="participant bg-post page-post-center">
        <div class="participant-title bg-post page-post-center"></div>

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
                'nextPageLabel' => '更多',
                'linkOptions' => [
                    'class' => 'btn btn-primary btn-block',
                ],
                'pluginOptions' => [
                    'loading' => [
                        'msgText' => "<em>加载中...</em>",
                        'finishedMsg' => "<em>没有啦.</em>",
                    ],
                    'behavior' => InfiniteScrollPager::BEHAVIOR_TWITTER,
                ],
            ],
        ]);
        ?>
    </div>

</div>