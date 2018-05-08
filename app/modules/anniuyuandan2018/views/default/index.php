<?php
use app\modules\anniuyuandan2018\Asset;
use yii\helpers\Url;

$url = Url::home();
$this->render('/layouts/_jsapi-share');
?>
    <input type="hidden" value="<?= $url . $this->context->module->id; ?>" id="data-module">
    <input type="hidden" value="<?= $is_end; ?>" id="is_end">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide home">
                <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
                <ul id="scene">
                    <li class="layer" data-depth="0.1">
                        <img class="m1 transition" src="<?= Asset::getAssetUrl('images/m-back.png') ?>"></li>
                    </li>
                    <li class="layer" data-depth="0.1">
                        <img class="m2 transition" src="<?= Asset::getAssetUrl('images/m.png') ?>"></li>
                    </li>
                    <li class="layer" data-depth="0.1">
                        <img class="m3 transition" src="<?= Asset::getAssetUrl('images/m-front-l.png') ?>"></li>
                    </li>
                    <li class="layer" data-depth="0.1">
                        <img class="m4 transition" src="<?= Asset::getAssetUrl('images/m-front-r.png') ?>"></li>
                    </li>
                    <li class="layer" data-depth="0.1">
                        <img class="wave1 wave transition" src="<?= Asset::getAssetUrl('images/wave.png') ?>"></li>
                    </li>
                    <li class="layer" data-depth="0.12">
                        <img class="wave2 wave transition" src="<?= Asset::getAssetUrl('images/wave.png') ?>"></li>
                    </li>
                    <li class="layer" data-depth="0.12">
                        <img class="spindrift1 transition" src="<?= Asset::getAssetUrl('images/spindrift1.png') ?>">
                    </li>
                    </li>
                    <li class="layer" data-depth="0.13">
                        <img class="wave3 wave transition" src="<?= Asset::getAssetUrl('images/wave.png') ?>"></li>
                    </li>
                    <li class="layer" data-depth="0.12">
                        <img class="spindrift2 transition" src="<?= Asset::getAssetUrl('images/spindrift2.png') ?>">
                    </li>
                    </li>
                    <li class="layer" data-depth="0.1">
                        <img class="wave4 wave transition" src="<?= Asset::getAssetUrl('images/wave.png') ?>"></li>
                    </li>
                    <li class="layer" data-depth="0.13">
                        <img class="wave5 wave transition" src="<?= Asset::getAssetUrl('images/wave.png') ?>"></li>
                    </li>
                    <li class="layer" data-depth="0.12">
                        <img class="spindrift3 transition" src="<?= Asset::getAssetUrl('images/spindrift1.png') ?>">
                    </li>
                    </li>
                    <li class="layer" data-depth="0.12">
                        <img class="spindrift4 transition" src="<?= Asset::getAssetUrl('images/spindrift2.png') ?>">
                    </li>
                    </li>
                    <li class="layer" data-depth="0.13">
                        <img class="wave6 wave transition" src="<?= Asset::getAssetUrl('images/wave.png') ?>"></li>
                    </li>
                    <li class="layer" data-depth="0.1">
                        <img class="wave7 wave transition" src="<?= Asset::getAssetUrl('images/wave.png') ?>"></li>
                    </li>
                    <li class="layer" data-depth="0.12">
                        <img class="spindrift5 transition" src="<?= Asset::getAssetUrl('images/spindrift1.png') ?>">
                    </li>
                    </li>
                    <li class="layer" data-depth="0.1">
                        <img class="wave8 wave transition" src="<?= Asset::getAssetUrl('images/wave.png') ?>"></li>
                    </li>
                    <li class="layer" data-depth="0.1">
                        <img class="wave9 wave transition" src="<?= Asset::getAssetUrl('images/wave.png') ?>"></li>
                    </li>

                    <li class="layer" data-depth="0">
                        <img class="light1 light transition" src="<?= Asset::getAssetUrl('images/light.png') ?>"></li>
                    <li class="layer" data-depth="0">
                        <img class="light2 light transition" src="<?= Asset::getAssetUrl('images/light.png') ?>"></li>
                    <li class="layer" data-depth="0.12">
                        <img class="clould-left" src="
                <?= Asset::getAssetUrl('images/clould-left.png') ?>"></li>
                    <li class="layer" data-depth="0.1">
                        <img class="clould-right" src="
                <?= Asset::getAssetUrl('images/clould-right.png') ?>"></li>
                    <li class="layer" data-depth="0.1">
                        <img class="tree-left" src="
                <?= Asset::getAssetUrl('images/tree-left.png') ?>"></li>
                    <li class="layer" data-depth="0.1">
                        <img class="tree-right" src="
                <?= Asset::getAssetUrl('images/tree-right.png') ?>"></li>
                    <li class="layer" data-depth="0.1">
                        <img class="clould" src="
                <?= Asset::getAssetUrl('images/clould.png') ?>">
                    </li>
                </ul>

                <div class="s1 text-yellow text-ppt">辛苦一年了！别忘记——</div>
                <p class="text-l2 solgan1 text-red solgan text-ganlan">善待自己<span class="text-m"> 更要</span></p>
                <p class="text-l1 solgan2 text-red solgan text-ganlan">关爱家人</p>

                <!--半透明遮罩-->
                <div class="mask"></div>

                <!--红包-->
                <div class="packet">
                    <img class="packet-clould1" src="<?= Asset::getAssetUrl('images/packet-clould1.png') ?>">
                    <img class="mark" src="<?= Asset::getAssetUrl('images/mark.png') ?>">
                    <img class="red-packet" src="<?= Asset::getAssetUrl('images/red-packet.png') ?>">
                    <div class="packet-header">
                        <img class="packet-header-front" src="<?= Asset::getAssetUrl('images/packet-header1.png') ?>">
                        <img class="packet-header-back" src="<?= Asset::getAssetUrl('images/packet-header2.png') ?>">
                    </div>
                    <img class="icon-up shaking" src="<?= Asset::getAssetUrl('images/icon-up.png') ?>">
                    <p class="text-ganlan text-yellow s2 text-center">送元气加油包啦!</p>
                    <p class="text-ppt text-yellow s3 text-center">上滑看看</p>
                    <img class="packet-clould2" src="<?= Asset::getAssetUrl('images/packet-clould2.png') ?>">
                    <p class="text-ganlan text-yellow s4 text-center btn-toDraw" style="display: none">点击抽取<br>元气加油包</p>
                    <p class="text-lightYellow chanceNum" style="display: none">每人每天有<b>3</b>次抽奖机会</p>
                </div>

                <!--转盘-->
                <div class="turntable">
                    <img class="turntablePanle" src="<?= Asset::getAssetUrl('images/turntable.png') ?>">
                    <img class="turntable-icon" src="<?= Asset::getAssetUrl('images/turntable-icon.png') ?>">
                    <img class="btn-draw" src="<?= Asset::getAssetUrl('images/btn-draw.png') ?>">
                </div>

                <!--抽奖结果-->
                <div class="prize">
                    <img class="p1" src="<?= Asset::getAssetUrl('images/prize01.png') ?>">
                    <!--中奖-->
                    <div class="win" style="display: none">
                        <img class="prizebg01" src="<?= Asset::getAssetUrl('images/prize02.png') ?>">
                        <ul class=" text-ppt text-lightYellow">
                            <li>扫</li>
                            <li>码</li>
                            <li>打</li>
                            <li>开</li>
                            <li>领</li>
                            <li>取</li>
                            <li>通</li>
                            <li>道</li>
                        </ul>
                        <img class="code1" src="<?= Asset::getAssetUrl('images/code01.png') ?>">
                        <div class="prizeContent">
                            <h1 class="text-lightYellow text-m text-ppt">恭喜您获得</h1>
                            <p class="text-lightYellow text-l2 text-ganlan"><span class="prizeNum">1</span>元红包</p>
                        </div>
                        <img class="btn-close"
                             src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
                    </div>
                    <div class="noWin">
                        <img class="prizebg02" src="<?= Asset::getAssetUrl('images/prize03.png') ?>">
                        <ul class=" text-ppt text-lightYellow">
                            <li>扫</li>
                            <li>码</li>
                            <li>持</li>
                            <li>续</li>
                            <li>关</li>
                            <li>注</li>
                            <li>活</li>
                            <li>动</li>
                        </ul>
                        <img class="code1" src="<?= Asset::getAssetUrl('images/code01.png') ?>">
                        <div class="prizeContent transition" data-index="1">
                            <p class="text-lightYellow text-ppt text-center">给2018的你</p>
                            <p class="text-ganlan text-lightYellow text-center">
                                一年365天，中间不过酸甜苦辣咸五种滋味。新的一年里，只希望你甜蜜的日子更多一些~</p>
                        </div>
                        <div class="prizeContent transition" data-index="2">
                            <p class="text-lightYellow text-ppt text-center">给2018的你</p>
                            <p class="text-ganlan text-lightYellow text-center">
                                总有人要赢，那为什么不能是你？只要你一直努力，最坏的结果也不过是大器晚成。</p>
                        </div>
                        <div class="prizeContent transition" data-index="3">
                            <p class="text-lightYellow text-ppt text-center">给2018的你</p>
                            <p class="text-ganlan text-lightYellow text-center">人生只有一次，一定要做听从自己的内心，做真正让自己快乐的事 ​。
                            </p>
                        </div>
                        <div class="prizeContent transition" data-index="4">
                            <p class="text-lightYellow text-ppt text-center">给2018的你</p>
                            <p class="text-ganlan text-lightYellow text-center">做一个特别简单的人，不期待突如其来的好运，只希望所有的努力终有回报。
                            </p>
                        </div>
                        <img class="btn-close"
                             src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
                    </div>
                </div>
                <?php if ($is_end): ?>
                    <!--活动结束页面-->
                    <div class="event-end">
                        <img class="code" src="<?= Asset::getAssetUrl('images/code02.png') ?>">
                        <ul class=" text-ppt text-lightYellow">
                            <li>了</li>
                            <li>解</li>
                            <li>安</li>
                            <li>宫</li>
                            <li>牛</li>
                            <li>黄</li>
                            <li>丸</li>
                        </ul>
                        <p class="text-lightYellow chanceNum">活动已结束 感谢参与!</p>
                        <img class="btn-close"
                             src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
                    </div>
                <?php endif; ?>
            </div>
            <div class="swiper-slide backcover">
                <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
                <div class="text">
                    <p class="text-center text-lightYellow text-m text-ppt">新的一年继续努力</p>
                    <p class="text-center text-lightYellow text-m text-ppt">—</p>
                    <p class="text-center text-lightYellow text-m text-ppt">北京同仁堂安宫牛黄丸</p>
                    <p class="text-center text-lightYellow text-m text-ppt">为您和家人的健康</p>
                    <p class="text-center text-lightYellow text-m text-ppt">保驾护航</p>
                    <p class="text-center text-lightYellow text-m text-ganlan" style="margin-top: 20px">2018，继续加油！</p>
                </div>
                <img class="btn-anniu" src="<?= Asset::getAssetUrl('images/btn-anniu.png') ?>">
                <img class="btn-share" src="<?= Asset::getAssetUrl('images/btn-share.png') ?>">
                <img class="mask-share transition" src="<?= Asset::getAssetUrl('images/mask-share.png') ?>"
                     style="display: none">
            </div>
            <div class="swiper-slide codeWrapper">
                <div class="sign1">
                    <ul class=" text-ppt text-lightYellow noChance transition">
                        <li>今</li>
                        <li>日</li>
                        <li>机</li>
                        <li>会</li>
                        <li>已</li>
                        <li>用</li>
                        <li>尽</li>
                    </ul>
                    <ul class=" text-ppt text-lightYellow">
                        <li>扫</li>
                        <li>码</li>
                        <li>持</li>
                        <li>续</li>
                        <li>关</li>
                        <li>注</li>
                        <li>活</li>
                        <li>动</li>
                    </ul>
                </div>
                <div class="sign2">
                    <ul class=" text-ppt text-lightYellow">
                        <li>了</li>
                        <li>解</li>
                        <li>安</li>
                        <li>宫</li>
                        <li>牛</li>
                        <li>黄</li>
                        <li>丸</li>
                    </ul>
                </div>
                <img class="code" src="<?= Asset::getAssetUrl('images/code02.png') ?>">
                <p class="text-lightYellow chanceNum">每人每天有<b>3</b>次抽奖机会</p>
                <img class="btn-close"
                     src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
            </div>
        </div>
    </div>

<?php
