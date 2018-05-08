<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 16/5/5
 * Time: 下午10:55
 */
use yii\helpers\Html;
$this->registerJsFile('@jsUrl/jquery.touchSwipe.min.js');
$this->registerJsFile('@jsUrl/main.js');
?>

<div class="u-pageLoading">
    <?= Html::img('@imgUrl/load.gif',['alt'=>'loading'])?>
</div>
<div class="main-center" style="display: none;">
    <?= Html::img('@imgUrl/logo.png',['class'=>'logo'])?>

    <div class="award-address">
        <?= Html::img('@imgUrl/page30-text.png',['class'=>'award-address-img','alt'=>''])?>

        <form>
            <div class="form-group award-address-01">
                <input type="text" class="form-control" id="disabledTextInput1">
            </div>

            <div class="form-group award-address-02">
                <input type="text" class="form-control" id="disabledTextInput2">
            </div>

            <div class="form-group award-address-03">
                <input type="text" class="form-control" id="disabledTextInput3">
            </div>

            <!-- <button type="submit" class="btn btn-default">Submit</button> -->
            <?= Html::img('@imgUrl/page30-btn.png',['class'=>'award-address-btn','alt'=>''])?>
        </form>
    </div>
</div>

<div class="main-center" style="display: none;">
    <img src="images/logo.png" alt="" class="logo">

    <div class="award">
        <div class="award-main">
            <img src="images/page-31-img.png" alt="" class="page-31-img">
            <img src="images/page-31-btn-01.png" alt="" class="page-31-btn-01">
            <img src="images/page-31-btn-02.png" alt="" class="page-31-btn-02">
            <img src="images/page-31-btn-03.png" alt="" class="page-31-btn-03">
        </div>
    </div>
</div>

