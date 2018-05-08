<?php
use app\modules\ejiaonewyear\Asset;
use yii\helpers\Url;

$url = Url::home();
$this->render('/layouts/_jsapi-share');
?>
<input type="hidden" value="<?= $url . $this->context->module->id; ?>" id="data-module">
<input type="hidden" value="<?= $is_end; ?>" id="is_end">
<input type="hidden" value="<?= $is_chance; ?>" id="is_chance">
<!--首页-->
<div class="page1 page">
    <img class="btn-start" src="<?= Asset::getAssetUrl('images/btn-start.png') ?>">
    <div class="mask-end mask none">
        <img class="code" src="<?= Asset::getAssetUrl('images/code.png') ?>">
        <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
        <p>活动已经结束 感谢参与!</p>
    </div>
</div>
<!--游戏页-->
<div class="page2 page none">
    <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
    <div class="regulation">
        <img class="panel-regulation" src="<?= Asset::getAssetUrl('images/p2-1.png') ?>">
        <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
    </div>
    <img class="p22" src="<?= Asset::getAssetUrl('images/p2-2.jpg') ?>">

    <div class="dbw pab z1 lisCon" data-num='5'>
        <em></em>
        <em></em>
        <em></em>
        <em></em>
        <em></em>
        <em></em>
        <em></em>
        <em></em>
        <em></em>
        <em></em>
        <em></em>
        <em></em>
        <em></em>
        <em></em>
        <em></em>
    </div>
    <img class="p23" src="<?= Asset::getAssetUrl('images/p2-3.jpg') ?>">
    <h1 class="game_num"><span>0</span>得分</h1>
    <h1 class="countdown">20s</h1>

    <!--游戏结束未过关-->
    <div class="mask-noWin mask none">
        <img class="panel-noWin" src="<?= Asset::getAssetUrl('images/panel-noWin.png') ?>">
        <p class="result_num"></p>
        <img class="btn-yes" src="<?= Asset::getAssetUrl('images/btn-yes.png') ?>">
        <img class="btn-no" src="<?= Asset::getAssetUrl('images/btn-no.png') ?>">
    </div>

    <!--游戏结过关-->
    <div class="mask-win mask none">
        <img class="panel-win" src="<?= Asset::getAssetUrl('images/panel-win.png') ?>">
        <img class="btn-toDraw" src="<?= Asset::getAssetUrl('images/btn-toDraw.png') ?>">
        <img class="panel-noChance" src="<?= Asset::getAssetUrl('images/panel-noChance2.png') ?>">
        <p class="result_num"></p>
        <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
    </div>

    <!--游戏结束机会用尽-->
    <div class="mask-noChance mask none">
        <img class="panel-noChance" src="<?= Asset::getAssetUrl('images/panel-noChance.png') ?>">
        <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
        <img class="code" src="<?= Asset::getAssetUrl('images/code.png') ?>">
    </div>

    <!--抽奖-->
    <div class="mask-turntable mask none">
        <img class="turntable" src="<?= Asset::getAssetUrl('images/turntable.png') ?>">
        <div class="turntable-panel">
            <div class="top">
                <div class="pri1 pri active">
                    <img src="<?= Asset::getAssetUrl('images/p3-1.png') ?>">
                </div>
                <div class="pri2 pri">
                    <img src="<?= Asset::getAssetUrl('images/p3-2.png') ?>">
                </div>
                <div class="pri3 pri">
                    <img src="<?= Asset::getAssetUrl('images/p3-3.png') ?>">
                </div>
            </div>
            <div class="middle">
                <div class="pri8 pri">
                    <img src="<?= Asset::getAssetUrl('images/p3-8.png') ?>">
                </div>
                <div class="btn-draw">
                    <img src="<?= Asset::getAssetUrl('images/btn-draw.png') ?>">
                </div>
                <div class="pri4 pri">
                    <img src="<?= Asset::getAssetUrl('images/p3-4.png') ?>">
                </div>
            </div>
            <div class="bottom">
                <div class="pri7 pri">
                    <img src="<?= Asset::getAssetUrl('images/p3-7.png') ?>">
                </div>
                <div class="pri6 pri">
                    <img src="<?= Asset::getAssetUrl('images/p3-6.png') ?>">
                </div>
                <div class="pri5 pri">
                    <img src="<?= Asset::getAssetUrl('images/p3-5.png') ?>">
                </div>
            </div>
        </div>
    </div>

    <!--奖品-->
    <div class="mask-prize mask none">
        <img class="panel-prize" src="<?= Asset::getAssetUrl('images/panel-prize.png') ?>">
        <img class="btn-get" src="<?= Asset::getAssetUrl('images/btn-get.png') ?>">
        <p class="prize-name"></p>
        <img class="prize" src="">
    </div>

    <!--没奖品-->
    <div class="mask-noPrize mask none">
        <img class="panel-noPrize" src="<?= Asset::getAssetUrl('images/panel-noPrize.png') ?>">
        <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
        <img class="code" src="<?= Asset::getAssetUrl('images/code.png') ?>">
    </div>

    <!--领奖信息-->
    <div class="mask-info mask none">
        <img class="panel-info" src="<?= Asset::getAssetUrl('images/panel-info.png') ?>">
        <img class="btn-submit" src="<?= Asset::getAssetUrl('images/btn-submit.png') ?>">
        <form>
            <input type="text" name="user_name" placeholder="收件人">
            <input type="number" name="user_phone" placeholder="电话">
            <input type="text" name="user_address" placeholder="地址">
        </form>
    </div>

    <!--提交成功-->
    <div class="mask-submitok mask none">
        <img class="panel-submitok" src="<?= Asset::getAssetUrl('images/panel-submitok.png') ?>">
        <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
        <img class="code" src="<?= Asset::getAssetUrl('images/code.png') ?>">
    </div>
</div>

<!--封底-->
<div class="page3 page none">
    <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
    <img class="btn-ejiao" src="<?= Asset::getAssetUrl('images/btn-ejiao.png') ?>">
    <img class="btn-share" src="<?= Asset::getAssetUrl('images/btn-share.png') ?>">
    <div class="mask-ejiao mask none">
        <img class="code" src="<?= Asset::getAssetUrl('images/code.png') ?>">
        <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
    </div>
    <div class="mask-share mask none">
        <img class="icon-share" src="<?= Asset::getAssetUrl('images/icon_share.png') ?>">
    </div>
</div>

