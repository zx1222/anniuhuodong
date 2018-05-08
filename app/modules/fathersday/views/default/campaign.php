<?php
use app\modules\fathersday\Asset;
use yii\helpers\Html;

use yii\widgets\ActiveForm;

$this->render('/layouts/_jsapi-share');

$js = "jQuery(\"input#photoform-old_photo\").previewimage({container: \".preview-photoform-old_photo\"});";
$js .= "jQuery(\"input#photoform-new_photo\").previewimage({container: \".preview-photoform-new_photo\"});";
$this->registerJs($js);

$jss = <<<JSSS

 $("#pjaxn").on("pjax:end", function() {
 $(".upload-load").hide();
        $(".wrapper-campaign").animate({"top": 3 * -100 + "%"}, 400);
        });

JSSS;
$this->registerJs($jss);
?>
<div id="pjaxn" style="display: none">
</div>

<?php yii\widgets\Pjax::begin([
    'id' => 'pjaxn',
    'enableReplaceState' => false,
    'enablePushState' => false,]) ?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'data-pjax' => true]]); ?>


<div class="wrapper-campaign wrapper-main">
    <!-- 上传中-->
    <div class="upload-load" style="display: none">

        <?= Html::img(Asset::getAssetUrl('images/upload-load.png'), ['class' => 'upload-load-img', 'alt' => '']) ?>
        <?= Html::img(Asset::getAssetUrl('images/upload-load-ico.png'), ['class' => 'upload-load-ico', 'alt' => '']) ?>
    </div>
    <div class="page12 page">
        <div class="title-cloud bg-post">
            <!-- 右上角三块小云 -->
        </div>
        <div class="leaf-first bg-post">
            <!-- 左边树叶 -->
        </div>
        <div class="fish bg-post">
            <!-- 右上角鱼 -->
        </div>
        <div class="upload-photo bg-post">
            <!-- 上传照片示例图 -->
            <div id='' class="preview preview-photoform-old_photo">
                <?= Html::img(Asset::getAssetUrl('images/upload-photo.png'), ['id' => 'preview-old', 'alt' => '']) ?>
            </div>
            <?= $form->field($model, 'old_photo')->fileInput(['class' => 'btn-cover'])->label(false) ?>

        </div>
        <div class="upload-text bg-post">
            <!-- 上传你和父亲的照片 -->
        </div>

        <div class="upload-aircraft bg-post">
            <!-- 飞机 -->
        </div>
        <div class="page12-ok bg-post">
            <!-- 确认 -->
        </div>
    </div>
    <div class="page13 page">
        <div class="title-cloud bg-post">
            <!-- 右上角三块小云 -->
        </div>
        <div class="leaf-first bg-post">
            <!-- 左边树叶 -->
        </div>
        <div class="fish bg-post">
            <!-- 右上角鱼 -->
        </div>
        <div class="upload-photo bg-post">
            <!-- 上传照片示例图 -->

            <div id='' class="preview preview-photoform-new_photo">
                <?= Html::img(Asset::getAssetUrl('images/upload-photo.png'), ['id' => '', 'alt' => '']) ?>
            </div>
            <?= $form->field($model, 'new_photo')->fileInput(['class' => 'btn-cover'])->label(false) ?>

        </div>

        <div class="upload-text bg-post">
            <!-- 上传你和父亲的照片 -->
        </div>

        <div class="upload-aircraft bg-post">
            <!-- 飞机 -->
        </div>

        <div class="page13-ok bg-post">
            <!-- 确认 -->
        </div>

    </div>
    <div class="page14 page">
        <div class="title-cloud bg-post">
            <!-- 右上角三块小云 -->
        </div>
        <div class="leaf-first bg-post">
            <!-- 左边树叶 -->
        </div>
        <div class="fish bg-post">
            <!-- 右上角鱼 -->
        </div>
        <div class="upload-aircraft bg-post">
            <!-- 飞机 -->
        </div>

        <div class="page14-text  bg-post">
            <!-- 留言 -->

            <?= $form->field($model, 'desc')->textarea(['placeholder' => '想说的话就留在这里吧'])->label(false) ?>


        </div>
        <div class="page14-btn  bg-post">
            <?= Html::submitButton('提交', ['class' => 'btn-cover']) ?>

            <!-- 按钮 -->

        </div>
        <div class="page14-photo-1  bg-post photo-main-1 photo-main">
            <div id='' class="preview preview-photoform-old_photo">
                <?= Html::img(Asset::getAssetUrl('images/upload-photo.png'), ['id' => '', 'alt' => '']) ?>
            </div>
            <div class="bg-post photo-border"></div>
        </div>
        <div class="page14-photo-2  bg-post photo-main-2 photo-main">
            <div id='' class="preview preview-photoform-new_photo">
                <?= Html::img(Asset::getAssetUrl('images/upload-photo.png'), ['id' => '', 'alt' => '']) ?>
            </div>
            <div class="bg-post photo-border"></div>
        </div>
    </div>
    <div class="page15 page">
        <div class="page15-center bg-post">
            <!-- 中心内容 -->
        </div>
        <div class="page15-title bg-post">
            <!-- 标题大云 -->
        </div>
        <div class="title-cloud bg-post">
            <!-- 右上角三块小云 -->
        </div>
        <div class="leaf-first bg-post">
            <!-- 左边树叶 -->
        </div>
        <div class="fish bg-post">
            <!-- 右上角鱼 -->
        </div>
        <div class="aircraft bg-post">
            <!--  左 边飞机 -->
        </div>
        <div class="page15-share bg-post">
            <!--  分享按钮 -->
        </div>
        <div class="page15-close bg-post">
            <?= Html::a('', ['/fathersday/default/exhibition'], ['class' => 'a-btn']) ?>
            <!--  关闭按钮 点击弹出二维码 -->
        </div>

        <div class="page15-help page-inner" style="">
            <?= Html::img(Asset::getAssetUrl('images/page15-code.png'), ['class' => 'page15-help-code', 'alt' => '']) ?>
            <?= Html::img(Asset::getAssetUrl('images/page15-help-close.jpg'), ['class' => 'page15-help-close', 'alt' => '']) ?>
        </div>
        <div class="share-mask bg-post" style="background-color: rgba(0, 0, 0, .68);width: 100%;height: 100%;z-index: 9999;display: none">
            <!--  分享遮罩层 -->
            <?= Html::img(Asset::getAssetUrl('images/share-mask.png'), ['id' => '', 'alt' => '', 'style' => 'width:100%']) ?>
        </div>
    </div>


</div>
<?php ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>

