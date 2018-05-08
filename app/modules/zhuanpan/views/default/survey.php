<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 16/5/5
 * Time: 下午10:21
 */
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
$this->registerJsFile('@jsUrl/jquery.touchSwipe.min.js');
$this->registerJsFile('@jsUrl/main.js');
$this->registerJsFile("http://res.wx.qq.com/open/js/jweixin-1.0.0.js",['position'=>View::POS_HEAD]);

?>
<script type="text/javascript">
    wx.config(<?= json_encode(Yii::$app->wechat->jsApiConfig(['jsApiList' => ['onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ']])); ?>);
    wx.ready(function () {
        // 在这里调用 API
        wx.onMenuShareTimeline({
            title: '我和妈妈之间相隔一句“我爱你”——北京同仁堂“母亲节”专题', // 分享标题
            link: 'http://anniu0507.sindcorp.net/zhuanpan/default/share?&openid=<?= Yii::$app->user->getId()?>', // 分享链接
            imgUrl: 'http://anniu0507image.sindcorp.net/share-icon.jpg', // 分享图标
        });
        wx.onMenuShareAppMessage({
            title: '我和妈妈之间相隔一句“我爱你”——北京同仁堂“母亲节”专题', // 分享标题
            desc: '这是给妈妈的一份不想作弊的问卷', // 分享描述
            link: 'http://anniu0507.sindcorp.net/zhuanpan/default/share?&openid=<?= Yii::$app->user->getId()?>', // 分享链接
            imgUrl: 'http://anniu0507image.sindcorp.net/share-icon.jpg', // 分享图标
        });
        wx.onMenuShareQQ({
            title: '我和妈妈之间相隔一句“我爱你”——北京同仁堂“母亲节”专题', // 分享标题
            desc: '这是给妈妈的一份不想作弊的问卷', // 分享描述
            link: 'http://anniu0507.sindcorp.net/zhuanpan/default/share?&openid=<?= Yii::$app->user->getId()?>', // 分享链接
            imgUrl: 'http://anniu0507image.sindcorp.net/share-icon.jpg', // 分享图标
        });
    });
</script>
<div class="u-pageLoading">
    <?= Html::img('@imgUrl/load.gif', ['alt' => 'loading']) ?>
</div>
<div class="main-center" style="display: none;">
    <?= Html::img('@imgUrl/logo.png', ['class' => 'logo']) ?>
    <div class="wrapper-answer">
        <form id='form' style="height: inherit" action="<?= Url::current() ?>" method="post">

            <div class="page9 page">

                <?= Html::img('@imgUrl/page9-img.png', ['class' => 'page9-img page-answer-img', 'alt' => '']) ?>
                <div class="radio">
                    <label class="page9-input-01 page-input">
                        <input type="radio" name="optionsRadios[1]" value="记得">
                        <?= Html::img('@imgUrl/page9-a-01.png', ['alt' => '记得']) ?>
                    </label>
                    <label class="page9-input-02 page-input">
                        <input type="radio" name="optionsRadios[1]" value="不记得" checked="checked">
                        <?= Html::img('@imgUrl/page9-a-02.png', ['alt' => '不记得']) ?>
                    </label>
                </div>
            </div>
            <div class="page10 page">
                <?= Html::img('@imgUrl/page10-img.png', ['class' => 'page10-img page-answer-img', 'alt' => '']) ?>
                <div class="radio">
                    <label class="page10-input-01 page-input">
                        <input type="radio" name="optionsRadios[2]" value="庆祝过">
                        <?= Html::img('@imgUrl/page10-a-01.png', ['alt' => '庆祝过']) ?>
                    </label>
                    <label class="page10-input-02 page-input">
                        <input type="radio" name="optionsRadios[2]" value="没有" checked="checked">
                        <?= Html::img('@imgUrl/page10-a-02.png', ['alt' => '没有']) ?>
                    </label>
                </div>
            </div>
            <div class="page11 page">
                <?= Html::img('@imgUrl/page11-img.png', ['class' => 'page11-img page-answer-img', 'alt' => '']) ?>
                <div class="radio">
                    <label class="page11-input-01 page-input">
                        <input type="radio" name="optionsRadios[3]" value="有">
                        <?= Html::img('@imgUrl/page11-a-01.png', ['alt' => '有']) ?>
                    </label>
                    <label class="page11-input-02 page-input">
                        <input type="radio" name="optionsRadios[3]" value="没有" checked="checked">
                        <?= Html::img('@imgUrl/page10-a-02.png', ['alt' => '没有']) ?>
                    </label>
                </div>
            </div>
            <div class="page12 page">
                <?= Html::img('@imgUrl/page12-img.png', ['class' => 'page12-img page-answer-img', 'alt' => '']) ?>
                <div class="radio">
                    <label class="page12-input-01 page-input">
                        <input type="radio" name="optionsRadios[4]" value="每天">
                        <?= Html::img('@imgUrl/page12-a-01.png', ['alt' => '每天']) ?>
                    </label>
                    <label class="page12-input-02 page-input">
                        <input type="radio" name="optionsRadios[4]" value="每周">
                        <?= Html::img('@imgUrl/page12-a-02.png', ['alt' => '每周']) ?>
                    </label>
                    <label class="page12-input-03 page-input">
                        <input type="radio" name="optionsRadios[4]" value="不到一月">
                        <?= Html::img('@imgUrl/page12-a-03.png', ['alt' => '不到一月']) ?>
                    </label>
                    <label class="page12-input-04 page-input">
                        <input type="radio" name="optionsRadios[4]" value="一月以上" checked="checked">
                        <?= Html::img('@imgUrl/page12-a-04.png', ['alt' => '一月以上']) ?>
                    </label>
                </div>
            </div>
            <div class="page13 page">
                <?= Html::img('@imgUrl/page13-img.png', ['class' => 'page13-img page-answer-img', 'alt' => '']) ?>
                <div class="radio">
                    <label class="page13-input-01 page-input">
                        <input type="radio" name="optionsRadios[5]" value="1-5分钟" checked="checked">
                        <?= Html::img('@imgUrl/page13-a-01.png', ['alt' => '1-5分钟']) ?>
                    </label>
                    <label class="page13-input-02 page-input">
                        <input type="radio" name="optionsRadios[5]" value="10-20分钟">
                        <?= Html::img('@imgUrl/page13-a-02.png', ['alt' => '10-20分钟']) ?>
                    </label>
                    <label class="page13-input-03 page-input">
                        <input type="radio" name="optionsRadios[5]" value="半小时以上">
                        <?= Html::img('@imgUrl/page13-a-03.png', ['alt' => '半小时以上']) ?>
                    </label>
                    <label class="page13-input-04 page-input">
                        <input type="radio" name="optionsRadios[5]" value="一小时以上">
                        <?= Html::img('@imgUrl/page13-a-04.png', ['alt' => '一小时以上']) ?>
                    </label>
                </div>
            </div>
            <div class="page14 page">
                <?= Html::img('@imgUrl/page14-img.png', ['class' => 'page14-img page-answer-img', 'alt' => '']) ?>
                <div class="radio">
                    <label class="page14-input-01 page-input">
                        <input type="radio" name="optionsRadios[6]" value="非常开心">
                        <?= Html::img('@imgUrl/page14-a-01.png', ['alt' => '非常开心']) ?>
                    </label>
                    <label class="page14-input-02 page-input">
                        <input type="radio" name="optionsRadios[6]" value="一般">
                        <?= Html::img('@imgUrl/page14-a-02.png', ['alt' => '一般']) ?>
                    </label>
                    <label class="page14-input-03 page-input">
                        <input type="radio" name="optionsRadios[6]" value="有些不耐烦">
                        <?= Html::img('@imgUrl/page14-a-03.png', ['alt' => '有些不耐烦']) ?>
                    </label>
                    <label class="page14-input-04 page-input">
                        <input type="radio" name="optionsRadios[6]" value="不想接/回复" checked="checked">
                        <?= Html::img('@imgUrl/page14-a-04.png', ['alt' => '不想接/回复']) ?>
                    </label>
                </div>
            </div>
            <div class="page15 page">
                <?= Html::img('@imgUrl/page15-img.png', ['class' => 'page15-img page-answer-img', 'alt' => '']) ?>
                <div class="radio">
                    <label class="page15-input-01 page-input">
                        <input type="radio" name="optionsRadios[7]" value="耐心听她说完">
                        <?= Html::img('@imgUrl/page15-a-01.png', ['alt' => '耐心听她说完']) ?>
                    </label>
                    <label class="page15-input-02 page-input">
                        <input type="radio" name="optionsRadios[7]" value="转移话题" checked="checked">
                        <?= Html::img('@imgUrl/page15-a-02.png', ['alt' => '转移话题']) ?>
                    </label>
                    <label class="page15-input-03 page-input">
                        <input type="radio" name="optionsRadios[7]" value="直接打断">
                        <?= Html::img('@imgUrl/page15-a-03.png', ['alt' => '直接打断']) ?>
                    </label>
                    <label class="page15-input-04 page-input">
                        <input type="radio" name="optionsRadios[7]" value="结束聊天/网聊">
                        <?= Html::img('@imgUrl/page15-a-04.png', ['alt' => '结束聊天/网聊']) ?>
                    </label>
                </div>
            </div>
            <div class="page16 page">
                <?= Html::img('@imgUrl/page16-img.png', ['class' => 'page16-img page-answer-img', 'alt' => '']) ?>
                <div class="radio">
                    <label class="page16-input-01 page-input">
                        <input type="radio" name="optionsRadios[8]" value="很清楚">
                        <?= Html::img('@imgUrl/page16-a-01.png', ['alt' => '很清楚']) ?>
                    </label>
                    <label class="page16-input-02 page-input">
                        <input type="radio" name="optionsRadios[8]" value="大概了解">
                        <?= Html::img('@imgUrl/page16-a-03.png', ['alt' => '大概了解']) ?>
                    </label>
                    <label class="page16-input-03 page-input">
                        <input type="radio" name="optionsRadios[8]" value="不太清楚">
                        <?= Html::img('@imgUrl/page16-a-02.png', ['alt' => '不太清楚']) ?>
                    </label>
                    <label class="page16-input-04 page-input">
                        <input type="radio" name="optionsRadios[8]" value="不了解" checked="checked">
                        <?= Html::img('@imgUrl/page16-a-04.png', ['alt' => '不了解']) ?>
                    </label>
                </div>
            </div>
            <div class="page17 page">
                <?= Html::img('@imgUrl/page17-img.png', ['class' => 'page17-img page-answer-img', 'alt' => '']) ?>
                <div class="radio">
                    <label class="page17-input-01 page-input">
                        <input type="radio" name="optionsRadios[9]" value="半年内">
                        <?= Html::img('@imgUrl/page17-a-01.png', ['alt' => '半年内']) ?>
                    </label>
                    <label class="page17-input-02 page-input">
                        <input type="radio" name="optionsRadios[9]" value="一年内">
                        <?= Html::img('@imgUrl/page17-a-02.png', ['alt' => '一年内']) ?>
                    </label>
                    <label class="page17-input-03 page-input">
                        <input type="radio" name="optionsRadios[9]" value="一年以上">
                        <?= Html::img('@imgUrl/page17-a-03.png', ['alt' => '一年以上']) ?>
                    </label>
                    <label class="page17-input-04 page-input">
                        <input type="radio" name="optionsRadios[9]" value="不清楚" checked="checked">
                        <?= Html::img('@imgUrl/page17-a-04.png', ['alt' => '不清楚']) ?>
                    </label>
                </div>
            </div>
            <div class="page18 page">
                <?= Html::img('@imgUrl/page18-img.png', ['class' => 'page18-img page-answer-img', 'alt' => '']) ?>
                <div class="radio">
                    <label class="page18-input-01 page-input">
                        <input type="radio" name="optionsRadios[10]" value="有，我很了解">
                        <?= Html::img('@imgUrl/page18-a-02.png', ['alt' => '有，我很了解']) ?>
                    </label>
                    <label class="page18-input-02 page-input">
                        <input type="radio" name="optionsRadios[10]" value="没有">
                        <?= Html::img('@imgUrl/page10-a-02.png', ['alt' => '没有']) ?>
                    </label>
                    <label class="page18-input-03 page-input">
                        <input type="radio" name="optionsRadios[10]" value="有，我不是很了解" checked="checked">
                        <?= Html::img('@imgUrl/page18-a-01.png', ['alt' => '有，我不是很了解']) ?>
                    </label>
                    <label class="page18-input-04 page-input">
                        <input type="radio" name="optionsRadios[10]" value="不清楚">
                        <?= Html::img('@imgUrl/page17-a-04.png', ['alt' => '不清楚']) ?>
                    </label>
                </div>
            </div>
            <div class="page19 page">
                <?= Html::img('@imgUrl/page19-img.png', ['class' => 'page19-img page-answer-img', 'alt' => '']) ?>
                <div class="radio">
                    <label class="page19-input-01 page-input">
                        <input type="radio" name="optionsRadios[11]" value="知道">
                        <?= Html::img('@imgUrl/page19-a-01.png', ['alt' => '知道']) ?>
                    </label>
                    <label class="page19-input-02 page-input">
                        <input type="radio" name="optionsRadios[11]" value="没有服用">
                        <?= Html::img('@imgUrl/page19-a-02.png', ['alt' => '没有服用']) ?>
                    </label>
                    <label class="page19-input-03 page-input">
                        <input type="radio" name="optionsRadios[11]" value="有，我不是很了解" checked="checked">
                        <?= Html::img('@imgUrl/page19-a-03.png', ['alt' => '有，我不是很了解']) ?>
                    </label>
                    <label class="page19-input-04 page-input">
                        <input type="radio" name="optionsRadios[11]" value="不知道">
                        <?= Html::img('@imgUrl/page19-a-04.png', ['alt' => '不知道']) ?>
                    </label>
                </div>
            </div>

            <div class="page20 page">
                <?= Html::img('@imgUrl/page20-text.png', ['class' => 'page20-img', 'alt' => '']) ?>
                <?= Html::img('@imgUrl/page20-btn-01.png', ['class' => 'page20-btn-01', 'alt' => '']) ?>
                <?= Html::a(Html::img('@imgUrl/page20-btn-02.png', ['class' => 'page20-btn-02', 'alt' => '']), ['lottery']) ?>
            </div>
            <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">

        </form>
    </div>
</div>

