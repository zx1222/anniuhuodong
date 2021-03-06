<?php

use yii\helpers\Url;
use app\modules\ejiaomothersday\Asset;

$url = Url::home();
$this->render('/layouts/_jsapi-share');
?>
<input type="hidden" value="<?= $url . $this->context->module->id; ?>" id="data-module">
<input type="hidden" value="<?= $is_end; ?>" id="is_end">
<div class="mask mask-verification none">
    <div class="container">
        <div id="captcha" style="position: relative"></div>
        <div id="msg"></div>
    </div>
</div>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide p1">
            <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
            <img class="p11 ani" swiper-animate-effect="bounceInDown" swiper-animate-duration=".8s"
                 src="<?= Asset::getAssetUrl('images/p1-1.png') ?>">
            <img class="p12 ani" swiper-animate-effect="bounceInDown" swiper-animate-duration=".8s"
                 swiper-animate-delay=".2s" src="<?= Asset::getAssetUrl('images/p1-2.png') ?>">
            <img class="btn-rule ani" swiper-animate-effect="bounceInUp" swiper-animate-duration=".8s"
                 swiper-animate-delay=".2s" src="<?= Asset::getAssetUrl('images/btn-rule.png') ?>">
            <div class="mask-rule mask none">
                <img class="panel-rule" src="<?= Asset::getAssetUrl('images/p1-3.png') ?>">
                <img class="btn-start" src="<?= Asset::getAssetUrl('images/btn-start.png') ?>">
            </div>
            <div class="mask mask-end none">
                <img class="panel-ejiao" src="<?= Asset::getAssetUrl('images/panel-ejiao.png') ?>">
                <img class="code" src="<?= Asset::getAssetUrl('images/code.png') ?>">
                <img class="close" src="<?= Asset::getAssetUrl('images/icon-close.png') ?>">
            </div>
        </div>
        <div class="swiper-slide p2">
            <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
            <img class="slogan slogan1" src="<?= Asset::getAssetUrl('images/slogan1.png') ?>">
            <img class="slogan slogan2 none" src="<?= Asset::getAssetUrl('images/slogan2.png') ?>">
            <img class="slogan slogan3 none" src="<?= Asset::getAssetUrl('images/slogan3.png') ?>">

            <p class="countdown">倒计时: <span class="countdown-num"></span>秒</p>
            <div class="card-container">
                <div class="card-wrp ">
                    <div class="card-front">
                        <img src="<?= Asset::getAssetUrl('images/card-front.png') ?>">
                    </div>

                </div>
                <div class="card-wrp">
                    <div class="card-front">
                        <img src="<?= Asset::getAssetUrl('images/card-front.png') ?>">
                    </div>
                </div>
                <div class="card-wrp">
                    <div class="card-front">
                        <img src="<?= Asset::getAssetUrl('images/card-front.png') ?>">
                    </div>
                </div>
                <div class="card-wrp">
                    <div class="card-front">
                        <img src="<?= Asset::getAssetUrl('images/card-front.png') ?>">
                    </div>
                </div>
                <div class="card-wrp">
                    <div class="card-front">
                        <img src="<?= Asset::getAssetUrl('images/card-front.png') ?>">
                    </div>
                </div>
                <div class="card-wrp">
                    <div class="card-front">
                        <img src="<?= Asset::getAssetUrl('images/card-front.png') ?>">
                    </div>
                </div>
                <div class="card-wrp">
                    <div class="card-front">
                        <img src="<?= Asset::getAssetUrl('images/card-front.png') ?>">
                    </div>
                </div>
                <div class="card-wrp">
                    <div class="card-front">
                        <img src="<?= Asset::getAssetUrl('images/card-front.png') ?>">
                    </div>
                </div>
                <div class="card-wrp">
                    <div class="card-front">
                        <img src="<?= Asset::getAssetUrl('images/card-front.png') ?>">
                    </div>
                </div>
                <div class="card-wrp">
                    <div class="card-front">
                        <img src="<?= Asset::getAssetUrl('images/card-front.png') ?>">
                    </div>
                </div>
                <div class="card-wrp">
                    <div class="card-front">
                        <img src="<?= Asset::getAssetUrl('images/card-front.png') ?>">
                    </div>
                </div>
                <div class="card-wrp">
                    <div class="card-front">
                        <img src="<?= Asset::getAssetUrl('images/card-front.png') ?>">
                    </div>
                </div>
            </div>
            <p class="leaveGroup">还剩<span class="leaveGroup-num"> 6 </span>对</p>
            <div class="mask mask-passOne none">
                <img class="panel-level1 panel-passOne" src="<?= Asset::getAssetUrl('images/panel-level1.png') ?>">
                <img class="panel-level2 panel-passOne none"
                     src="<?= Asset::getAssetUrl('images/panel-level2.png') ?>">
                <img class="panel-level3 panel-passOne none"
                     src="<?= Asset::getAssetUrl('images/panel-level3.png') ?>">
                <img class="btn-nextLevel" src="<?= Asset::getAssetUrl('images/btn-nextLevel.png') ?>">
                <img class="btn-toDraw none" src="<?= Asset::getAssetUrl('images/btn-toLottery.png') ?>">
            </div>
            <div class="mask mask-notPass none">
                <img class="panel-notPass" src="<?= Asset::getAssetUrl('images/panel-notPass.png') ?>">
                <img class="btn-giveUpChance" src="<?= Asset::getAssetUrl('images/btn-giveUpChance.png') ?>">
                <img class="btn-playAgain" src="<?= Asset::getAssetUrl('images/btn-playAgain.png') ?>">
            </div>
        </div>
        <div class="swiper-slide p3">
            <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
            <div class="turntable-panel">
                <div class="top">
                    <div class="pri1 pri"><img class="active" src="<?= Asset::getAssetUrl('images/prize2.png') ?>">
                    </div>
                    <div class="pri2 pri"><img src="<?= Asset::getAssetUrl('images/prize3.png') ?>"></div>
                    <div class="pri3 pri"><img src="<?= Asset::getAssetUrl('images/prize1.png') ?>"></div>
                </div>
                <div class="middle">
                    <div class="pri8 pri"><img src="<?= Asset::getAssetUrl('images/prize4.png') ?>"></div>
                    <div class="pri"></div>
                    <div class="pri4 pri"><img src="<?= Asset::getAssetUrl('images/prize4.png') ?>"></div>
                </div>
                <div class="bottom">
                    <div class="pri7 pri"><img src="<?= Asset::getAssetUrl('images/prize1.png') ?>"></div>
                    <div class="pri6 pri"><img src="<?= Asset::getAssetUrl('images/prize3.png') ?>"></div>
                    <div class="pri5 pri"><img src="<?= Asset::getAssetUrl('images/prize6.png') ?>"></div>
                </div>
            </div>
            <img class="btn-lottery" src="<?= Asset::getAssetUrl('images/btn-lottery.png') ?>">

            <!--中奖-->
            <div class="mask mask-win none">
                <img class="panel-win" src="<?= Asset::getAssetUrl('images/panel-win.png') ?>">
                <img class="btn-toForm" src="<?= Asset::getAssetUrl('images/btn-toForm.png') ?>">
                <img class="prize-img" src="">
                <p class="prize-name">500g同仁堂阿胶一盒</p>
            </div>
            <!--未中奖-->
            <div class="mask mask-notWin none">
                <img class="panel-notWin" src="<?= Asset::getAssetUrl('images/panel-noWin.png') ?>">
                <img class="btn-giveUpChance" src="<?= Asset::getAssetUrl('images/btn-giveUpChance.png') ?>">
                <img class="btn-reStart" src="<?= Asset::getAssetUrl('images/btn-reStart.png') ?>">
            </div>
            <!--form-->
            <div class="mask-form mask none">
                <img class="panel-form" src="<?= Asset::getAssetUrl('images/panel-form.png') ?>">
                <img class="btn-submit" src="<?= Asset::getAssetUrl('images/btn-submit.png') ?>">
                <form>
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                    <input type="text" name="username" placeholder="姓名">
                    <input type="number" name="phone" placeholder="手机号">
                    <textarea name="address" placeholder="快递可送达地址"></textarea>
                </form>
            </div>
            <div class="mask-submitOk mask none">
                <img class="panel-submitOk" src="<?= Asset::getAssetUrl('images/panel-submitOk.png') ?>">
                <img class="code" src="<?= Asset::getAssetUrl('images/code.png') ?>">
                <img class="close" src="<?= Asset::getAssetUrl('images/icon-close.png') ?>">
            </div>
            <div class="mask-code mask none">
                <img class="panel-giveUp" src="<?= Asset::getAssetUrl('images/panel-giveUp.png') ?>">
                <img class="code" src="<?= Asset::getAssetUrl('images/code.png') ?>">
                <img class="close" src="<?= Asset::getAssetUrl('images/icon-close.png') ?>">
            </div>

        </div>
        <div class="swiper-slide p4">
            <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
            <img class="p4-1" src="<?= Asset::getAssetUrl('images/p4.png') ?>">
            <img class="btn-ejiao" src="<?= Asset::getAssetUrl('images/btn-ejiao.png') ?>">
            <img class="btn-share" src="<?= Asset::getAssetUrl('images/btn-share.png') ?>">

            <div class="mask mask-ejiao none">
                <img class="panel-ejiao" src="<?= Asset::getAssetUrl('images/panel-ejiao.png') ?>">
                <img class="code" src="<?= Asset::getAssetUrl('images/code.png') ?>">
                <img class="close" src="<?= Asset::getAssetUrl('images/icon-close.png') ?>">
            </div>
            <div class="mask mask-share none">
                <img src="<?= Asset::getAssetUrl('images/icon_share.png') ?>">
            </div>
        </div>
    </div>
</div>


