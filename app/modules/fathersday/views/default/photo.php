<?php
use app\modules\fathersday\Asset;
use yii\helpers\Html;
$this->render('/layouts/_jsapi-share',['model'=>$photoModel]);
$uploadPathHash = substr(strtolower(md5($photoModel->openid)), 0, 2);
$uploadPathT = '@uploadsUrl/' . 't/' . $uploadPathHash . '/';
?>
    <div class="wrapper-vote wrapper-main">
        <div class="page22 page">
            <div class="upload-aircraft bg-post">
                <!-- 飞机 -->
            </div>
            <div class="page22-title bg-post">
                <!-- 标题 -->
            </div>
            <div class="page22-photo-1  bg-post photo-main-1 photo-main">
                <?= Html::img(Yii::getAlias($uploadPathT. $photoModel->old_photo), ['class' => 'page21-photo', 'alt' => '']) ?>
                <div class="bg-post photo-border"></div>
            </div>
            <div class="page22-photo-2  bg-post photo-main-1 photo-main">
                <?= Html::img(Yii::getAlias($uploadPathT . $photoModel->new_photo), ['class' => 'page21-photo', 'alt' => '']) ?>
                <div class="bg-post photo-border"></div>
            </div>
            <div class="page22-text bg-post">
                <p class="page22-p1"><?= $photoModel->desc; ?></p>

                <p class="page22-p2">选手编号：<span><?= $photoModel->id; ?></span></p>

                <p class="page22-p3">目前票数：<span><?= $photoModel->vote; ?></span></p>
            </div>
            <div class="vote-btn bg-post">
                <!-- 投他一票按钮 -->
                <?= Html::a('', 'javascript:;', ['class' => 'a-btn voteHandler']) ?>
            </div>
            <div class="page22-footer bg-post">
                <!-- 底部说明 -->
            </div>
            <div class="vote-a page-inner" style="display: none;">
                <!--                投票成功去抽奖-->
                <?= Html::img(Asset::getAssetUrl('images/vote-a-img.png'), ['class' => 'vote-a-img', 'alt' => '']) ?>

                <?= Html::a(Html::img(Asset::getAssetUrl('images/vote-a-btn.png'), ['class' => 'vote-a-btn', 'alt' => '']),\yii\helpers\Url::to(['/fathersday/default/lottery']) )?>
            </div>
            <div class="vote-b page-inner" style="display: none;">
                <!--                投票成功 看看她人-->
                <?= Html::img(Asset::getAssetUrl('images/vote-b-img.png'), ['class' => 'vote-a-img', 'alt' => '']) ?>
                <?= Html::a(Html::img(Asset::getAssetUrl('images/page11-understand.png'), ['class' => 'vote-b-btn', 'alt' => '']),\yii\helpers\Url::to(['/fathersday/default/exhibition']) )?>

            </div>
            <div class="exhibition-no page-inner" style="display: none;">
                <!--                已经投过票了-->
                <?= Html::img(Asset::getAssetUrl('images/exhibition-no-img.png'), ['class' => 'exhibition-no-img', 'alt' => '']) ?>
                <?= Html::img(Asset::getAssetUrl('images/page15-help-close.png'), ['class' => 'exhibition-no-ico', 'alt' => '']) ?>

            </div>
            <div class="exhibition-no3 page-inner" style="display: none;">
                <!--                每人每天最多投三次-->
                <?= Html::img(Asset::getAssetUrl('images/exhibition-no3-img.png'), ['class' => 'exhibition-no3-img', 'alt' => '']) ?>
                <?= Html::img(Asset::getAssetUrl('images/page15-help-close.png'), ['class' => 'exhibition-no3-ico', 'alt' => '']) ?>

            </div>
        </div>

    </div>
<?php
$url = \yii\helpers\Url::to(['vote', 'id' => $photoModel->id], true);
$js = <<<EOF
  $("a.voteHandler").one('click', function () {
        $.get('{$url}',function(data){
        code = data.code;
        if (code == 200){
            $('.vote-a').show();
        } else if(code == 250){
            $('.vote-b').show();
        }else if(code == 304){
            $('.exhibition-no').show();
        }else if(code == 403){
            $('.exhibition-no3').show();
        }else{

        }

        },"json");
    });
EOF;

$this->registerJs($js);


?>