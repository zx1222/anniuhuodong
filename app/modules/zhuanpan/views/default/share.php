<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 16/5/5
 * Time: 下午10:18
 */

use yii\helpers\Html;
use yii\web\View;
$this->registerJsFile('@jsUrl/jquery.touchSwipe.min.js');

$this->registerJsFile('@jsUrl/main.js');
$css=<<<CSS
 body{
   position: relative;
   overflow: auto;
 }
CSS;
$this->registerCss($css);
$this->registerJsFile("http://res.wx.qq.com/open/js/jweixin-1.0.0.js",['position'=>View::POS_HEAD]);

?>

<script type="text/javascript">
            wx.config(<?= json_encode(Yii::$app->wechat->jsApiConfig(['jsApiList' => ['hideMenuItems']])) ?>);
            wx.ready(function(){
            wx.hideOptionMenu();
            });
</script>

<div class="u-pageLoading">
    <?= Html::img('@imgUrl/load.gif',['alt'=>'loading'])?>
</div>
<div class="main-center" style="display: none;">

    <div class="share">
        <?= Html::img('@imgUrl/share-title-img.jpg',['class'=>'share-title-img','alt'=>''])?>

        <div class="share-01">
            <p class="share-title">记得母亲的生日吗？</p>

            <p class="share-text"><?= $answer[1]?></p>
        </div>
        <div class="share-02">
            <p class="share-title">对母亲庆祝过生日吗？</p>

            <p class="share-text"><?= $answer[2]?></p>
        </div>
        <div class="share-03">
            <p class="share-title">手机里有母亲的照片吗？</p>

            <p class="share-text"><?= $answer[3]?></p>
        </div>
        <div class="share-04">
            <p class="share-title">多久给母亲打个电话或网上聊天？</p>

            <p class="share-text"><?= $answer[4]?></p>
        </div>
        <div class="share-05">
            <p class="share-title">平均每次通话时长是？</p>

            <p class="share-text"><?= $answer[5]?></p>
        </div>
        <div class="share-06">
            <p class="share-title">对于妈妈主动打来的电话或发来的信息，你的态度是？</p>

            <p class="share-text"><?= $answer[6]?></p>
        </div>
        <div class="share-07">
            <p class="share-title">母亲谈起你不关心的琐事时，你会怎么做？</p>

            <p class="share-text"><?= $answer[7]?></p>
        </div>
        <div class="share-08">
            <p class="share-title">了解母亲身体状况吗？</p>

            <p class="share-text"><?= $answer[8]?></p>
        </div>
        <div class="share-09">
            <p class="share-title">母亲最近一次体检是什么时候？</p>

            <p class="share-text"><?= $answer[9]?></p>
        </div>
        <div class="share-10">
            <p class="share-title">母亲有什么病症吗？</p>

            <p class="share-text"><?= $answer[10]?></p>
        </div>
        <div class="share-11">
            <p class="share-title">母亲常服用的药物，你知道吗？</p>

            <p class="share-text"><?= $answer[11]?></p>
        </div>
        <?= Html::img('@imgUrl/page-31-img.png',['class'=>'page-31-img','alt'=>''])?>
        <?= Html::a(Html::img('@imgUrl/page-31-btn-01.png',['class'=>'page-31-btn-01','alt'=>'']),'http://app7.sindcorp.net/#st8')?>
        <?= Html::a(Html::img('@imgUrl/share-btn-img.png',['class'=>'share-btn-img','alt'=>'']), ['index']) ?>
    </div>
</div>
