<?php
use app\modules\ejiaoyuandan2018\Asset;
use yii\helpers\Url;

$url = Url::home();
$this->render('/layouts/_jsapi-share');
?>
<input type="hidden" value="<?= $url . $this->context->module->id; ?>" id="data-module">
<input type="hidden" value="<?= $is_end; ?>" id="is_end">
<div class="index">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide" data-hash="slide1">
                <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
                <ul id="scene1">
                    <li class="layer" data-depth="0.22"><img class="clould1"
                                                            src="<?= Asset::getAssetUrl('images/clould1.png') ?>"></li>
                    <li class="layer" data-depth="0.3"><img class="clould2"
                                                            src="<?= Asset::getAssetUrl('images/clould2.png') ?>"></li>
                    <li class="layer" data-depth="0.2"><img class="flower1"
                                                            src="<?= Asset::getAssetUrl('images/flower7.png') ?>"></li>
                    <li class="layer" data-depth="0.2"><img class="flower3"
                                                            src="<?= Asset::getAssetUrl('images/flower6.png') ?>"></li>
                    <li class="layer" data-depth="0.4"><img class="flower2"
                                                            src="<?= Asset::getAssetUrl('images/flower2.png') ?>"></li>
                    <li class="layer" data-depth="0.25"><img class="flower4"
                                                            src="<?= Asset::getAssetUrl('images/flower3.png') ?>"></li>
                    <li class="layer" data-depth="0.2"><img class="flower5"
                                                             src="<?= Asset::getAssetUrl('images/flower4.png') ?>"></li>
                    <li class="layer" data-depth="0.2"><img class="flower6"
                                                            src="<?= Asset::getAssetUrl('images/flower8.png') ?>"></li>
                    <li class="layer" data-depth="0.2"><img class="flower7"
                                                            src="<?= Asset::getAssetUrl('images/flower3.png') ?>"></li>
                    <li class="layer" data-depth="0.22"><img class="flower8"
                                                             src="<?= Asset::getAssetUrl('images/flower1.png') ?>"></li>
                </ul>
                <img class="tree" src="<?= Asset::getAssetUrl('images/tree.png') ?>">
                <img class="card-bg" src="<?= Asset::getAssetUrl('images/card-bg.png') ?>">
                <img class="product" src="<?= Asset::getAssetUrl('images/product.png') ?>">
                <p class="text-xbmy s3">辛苦一年，是时候滋补一下了！</p>
                <img class="icon-up shaking" src="<?= Asset::getAssetUrl('images/icon-up.png') ?>">

                <!--活动结束蒙层-->
                <?php if($is_end):?>
                <div class="event-end">
                    <img class="code" src="<?= Asset::getAssetUrl('images/code.jpg') ?>">
                    <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
                    <p class="text-center">活动已结束,感谢您的参与!<br>扫码了解同仁堂阿胶</p>
                </div>
                <?php endif;?>
            </div>
            <div class="swiper-slide" data-hash="slide2">
                <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">

                <img class="lace-l" src="<?= Asset::getAssetUrl('images/lace-l.png') ?>">
                <img class="lace-r" src="<?= Asset::getAssetUrl('images/lace-r.png') ?>">
                <ul id="scene2">
                    <li class="layer" data-depth="0.2"><img class="clould1"
                                                            src="<?= Asset::getAssetUrl('images/clould1.png') ?>"></li>
                    <li class="layer" data-depth="0.13"><img class="clould2"
                                                             src="<?= Asset::getAssetUrl('images/clould2.png') ?>"></li>
                    <li class="layer" data-depth="0.2"><img class="clould3"
                                                            src="<?= Asset::getAssetUrl('images/clould1.png') ?>"></li>
                    <li class="layer" data-depth="0.13"><img class="flower1"
                                                             src="<?= Asset::getAssetUrl('images/flower7.png') ?>"></li>
                    <li class="layer" data-depth="0.15"><img class="flower2"
                                                             src="<?= Asset::getAssetUrl('images/flower6.png') ?>"></li>
                    <li class="layer" data-depth="0.2"><img class="flower3"
                                                            src="<?= Asset::getAssetUrl('images/flower8.png') ?>"></li>
                    <li class="layer" data-depth="0.1"><img class="flower4"
                                                            src="<?= Asset::getAssetUrl('images/flower4.png') ?>"></li>
                    <li class="layer" data-depth="0.15"><img class="flower5"
                                                             src="<?= Asset::getAssetUrl('images/flower8.png') ?>"></li>
                    <li class="layer" data-depth="0.2"><img class="flower6"
                                                            src="<?= Asset::getAssetUrl('images/flower3.png') ?>"></li>
                    <li class="layer" data-depth="0.1"><img class="flower7" src="<?= Asset::getAssetUrl('images/flower1.png') ?>"></li>
                </ul>
                <img class="envelope" src="<?= Asset::getAssetUrl('images/envelope.png') ?>">
                <img class="envelope-inner" src="<?= Asset::getAssetUrl('images/envelope-inner.png') ?>">
                <img class="btn-click" src="<?= Asset::getAssetUrl('images/btn-click.png') ?>">
                <img class="clould4" src="<?= Asset::getAssetUrl('images/clould3.png') ?>">
            </div>
            <div class="swiper-slide turntable" data-hash="slide3">
                <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
                <p class="chanceNum text-xbmy">(活动期间每人每天有3次机会)</p>
                <img class="turntable-panel" src="<?= Asset::getAssetUrl('images/turntable.png') ?>">
                <img class="btn-draw" src="<?= Asset::getAssetUrl('images/turntable-icon.png') ?>">
                <div class="mask-nochance transition">
                    <img class="code" src="<?= Asset::getAssetUrl('images/code.jpg') ?>">
                    <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
                    <p class="text-center">今日机会已用尽<br>扫码持续关注活动</p>
                </div>
            </div>
            <div class="swiper-slide prize" data-hash="slide4">
                <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
                <div class="win" style="display: none">
                    <h3 class="text-pink text-xbmy title">恭喜您获得</h3>
                    <div class="prize1 prize-content">
                        <img class="prize-product" src="<?= Asset::getAssetUrl('images/prize1.png') ?>">
                        <h3 class="text-center text-pink prize-name text-xbmy">果丹皮一袋</h3>
                    </div>
                    <div class="prize2 prize-content" style="display: none">
                        <img class="prize-product" src="<?= Asset::getAssetUrl('images/prize2.png') ?>">
                        <h3 class="text-center text-pink prize-name text-xbmy">阿胶糕一盒</h3>
                    </div>
                    <div class="prize3 prize-content" style="display: none">
                        <img class="prize-product" src="<?= Asset::getAssetUrl('images/prize3.png') ?>">
                        <h3 class="text-center text-pink prize-name text-xbmy">阿胶250g一盒</h3>
                    </div>
                    <div class="prize4 prize-content" style="display: none">
                        <img class="prize-product" src="<?= Asset::getAssetUrl('images/prize3.png') ?>">
                        <h3 class="text-center text-pink prize-name text-xbmy">阿胶500g一盒</h3>
                    </div>
                    <img class="btn-get" src="<?= Asset::getAssetUrl('images/btn-get.png') ?>">
                </div>
                <div class="noWin" style="display: none">
                    <h3 class="text-pink text-xbmy title text-center">祝福礼</h3>
                    <h4 class="text-center text-xbmy sub-title">2018建议</h4>
                    <h5 class="text-xbmy  content" data-index="1">不要总嘲笑上一辈人这么爱看养生，是因为他们已经开始感到体力不支~2018年多关心父母的身体健康……</h5>
                    <h5 class="text-xbmy content" data-index="2">新的一年要做让自己快乐的事,并且是有助于身心健康的事。</h5>
                    <h5 class="text-xbmy  content" data-index="3">新的一年，不期待突如其来的好运，只希望所有的努力终有回报！</h5>
                    <img class="code" src="<?= Asset::getAssetUrl('images/code.jpg') ?>">
                    <p class="text-center">扫码持续关注活动</p>
                    <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
                </div>
            </div>
            <div class="swiper-slide form" data-hash="slide5">
                <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
                <p class="text-pink text-xbmy title text-center">请输入快递可送达的地址</p>
                <form>
                    <input type="text" placeholder="收件人" name="user_name">
                    <input type="text" placeholder="电话" name="user_phone">
                    <input type="text" placeholder="地址" name="user_address">
                    <input type="hidden" name="_csrf"  value="<?= Yii::$app->request->csrfToken ?>">
                    <img class="btn-submit" src="<?= Asset::getAssetUrl('images/btn-submit.png') ?>">
                </form>
            </div>
            <div class="swiper-slide submitOK" data-hash="slide6">
                <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
                <h3 class="text-pink text-xbmy title text-center">提交成功</h3>
                <img class="code" src="<?= Asset::getAssetUrl('images/code.jpg') ?>">
                <h3 class="text-xbmy text-center">新年礼正在路上<br>扫码关注活动</h3>
                <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
            </div>
            <div class="swiper-slide backcover" data-hash="slide7">
                <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
                <img class="card-bg" src="<?= Asset::getAssetUrl('images/card-bg2.png') ?>">
                <img class="product" src="<?= Asset::getAssetUrl('images/product.png') ?>">
                <img class="btn-ejiao" src="<?= Asset::getAssetUrl('images/btn-ejiao.png') ?>">
                <img class="btn-share" src="<?= Asset::getAssetUrl('images/btn-share.png') ?>">
                <img class="mask-share transition" src="<?= Asset::getAssetUrl('images/mask-share.png') ?>"
                     style="display: none">
                <div class="mask">
                    <img class="code" src="<?= Asset::getAssetUrl('images/code.jpg') ?>">
                    <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
                </div>
                <p class="chanceNum text-xbmy">(活动期间每人每天有3次机会)</p>
            </div>
        </div>
    </div>
</div>

