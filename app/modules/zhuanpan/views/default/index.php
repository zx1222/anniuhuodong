<?php
use yii\helpers\Html;
use yii\web\View;
use app\modules\zhuanpan\BL\StatusTransfer;

$this->registerJsFile('@jsUrl/jquery.touchSwipe.min.js');
$this->registerJsFile('@jsUrl/main.js');
$this->registerJsFile("http://res.wx.qq.com/open/js/jweixin-1.0.0.js", ['position' => View::POS_HEAD]);

?>
<script type="text/javascript">
    wx.config(<?= json_encode(Yii::$app->wechat->jsApiConfig(['jsApiList' => ['onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ']])); ?>);
    wx.ready(function () {
        // 在这里调用 API
        wx.onMenuShareTimeline({
            title: '我和妈妈之间相隔一句“我爱你”——北京同仁堂“母亲节”专题', // 分享标题
            link: 'http://anniu0507.sindcorp.net', // 分享链接
            imgUrl: 'http://anniu0507image.sindcorp.net/share-icon.jpg', // 分享图标
        });
        wx.onMenuShareAppMessage({
            title: '我和妈妈之间相隔一句“我爱你”——北京同仁堂“母亲节”专题', // 分享标题
            desc: '这是给妈妈的一份不想作弊的问卷', // 分享描述
            link: 'http://anniu0507.sindcorp.net', // 分享链接
            imgUrl: 'http://anniu0507image.sindcorp.net/share-icon.jpg', // 分享图标
        });
        wx.onMenuShareQQ({
            title: '我和妈妈之间相隔一句“我爱你”——北京同仁堂“母亲节”专题', // 分享标题
            desc: '这是给妈妈的一份不想作弊的问卷', // 分享描述
            link: 'http://anniu0507.sindcorp.net', // 分享链接
            imgUrl: 'http://anniu0507image.sindcorp.net/share-icon.jpg', // 分享图标
        });
    });
</script>

<div class="u-pageLoading">
    <?= Html::img('@imgUrl/load.gif', ['alt' => 'loading']) ?>
</div>
<div class="main-center" style="display: none;">
    <?= Html::img('@imgUrl/logo.png', ['class' => 'logo']) ?>
    <div class="wrapper">
        <div class="page1 page">
            <?= Html::img('@imgUrl/page1-text.png', ['class' => 'page1-text page-text', 'alt' => '']) ?>
            <?= Html::img('@imgUrl/page1-img.png', ['class' => 'page1-img page-img', 'alt' => '']) ?>
        </div>
        <div class="page2 page">
            <?= Html::img('@imgUrl/page2-text.png', ['class' => 'page2-text page-text', 'alt' => '']) ?>
            <?= Html::img('@imgUrl/page2-img.png', ['class' => 'page2-img page-img', 'alt' => '']) ?>
        </div>
        <div class="page3 page">
            <?= Html::img('@imgUrl/page3-text.png', ['class' => 'page3-text page-text', 'alt' => '']) ?>
            <?= Html::img('@imgUrl/page3-img.png', ['class' => 'page3-img page-img', 'alt' => '']) ?>
        </div>
        <div class="page4 page">
            <?= Html::img('@imgUrl/page4-text.png', ['class' => 'page4-text page-text', 'alt' => '']) ?>
            <?= Html::img('@imgUrl/page4-img.png', ['class' => 'page4-img page-img', 'alt' => '']) ?>
        </div>
        <div class="page5 page">
            <?= Html::img('@imgUrl/page5-text.png', ['class' => 'page5-text page-text', 'alt' => '']) ?>
            <?= Html::img('@imgUrl/page5-img.jpg', ['class' => 'page5-img page-img', 'alt' => '']) ?>
        </div>
        <div class="page6 page">
            <?= Html::img('@imgUrl/page6-text.png', ['class' => 'page6-text page-text', 'alt' => '']) ?>
            <?= Html::img('@imgUrl/page6-img.png', ['class' => 'page6-img page-img', 'alt' => '']) ?>
        </div>


        <?php if (!StatusTransfer::isEnd()): ?>
        <?php if (!empty(Yii::$app->user->identity->extra)) { ?>

            <!--         直接抽奖-->
            <div class="page0 page">
                <?= Html::img('@imgUrl/page-31-img.png', ['class' => 'page-31-img', 'alt' => '']) ?>
                <?= Html::a(Html::img('@imgUrl/page21-btn.png', ['class' => 'page21-btn', 'alt' => '']), ['lottery']) ?>
            </div>
        <?php } else { ?>

            <div class="page7 page">
                <?= Html::img('@imgUrl/page7-text.png', ['class' => 'page7-text page-text', 'alt' => '']) ?>
                <?= Html::img('@imgUrl/page7-img.png', ['class' => 'page7-img page-img', 'alt' => '']) ?>
            </div>
            <!-- 点击进行答题 -->
            <div class="page8 page">
                <?= Html::img('@imgUrl/page8-title.png', ['class' => 'page8-title', 'alt' => '']) ?>
                <?= Html::a(Html::img('@imgUrl/page8-btn.png', ['class' => 'page8-btn', 'alt' => '']), ['survey']) ?>
            </div>
        <?php } ?>

    </div>
<?php endif; ?>

</div>