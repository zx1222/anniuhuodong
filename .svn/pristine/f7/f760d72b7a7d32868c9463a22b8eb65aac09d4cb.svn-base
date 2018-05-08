<?php
use app\modules\valentinesday\Asset;

$this->title = '七夕情人节';
use yii\helpers\Url;

$this->render('/layouts/_jsapi-share', ['model' => $model]);
!empty($model->id) ? $url = Url::toRoute(['default/vote', 'id' => $model->id], true) : $url = ''
?>

<div class="photo-container">
    <img class="logo" src="<?= Asset::getAssetUrl('images/logo.png') ?>">
    <?php if ($model->status == 0): ?>

        <!--上传待审核-->
        <div class="not-audit">
            <img class="detail-txt" src="<?= Asset::getAssetUrl('images/detail-txt.png') ?>">


            <div class="photo-wrapper">
                <img class="photo" src="<?= Yii::getAlias('@uploadsUrl/' . $model->photo) ?>">
            </div>

            <div class="info">
                <div class="r">
                    <p>选手编号:<span class="userNumber"><?= $model->id ?></span></p>
                    <p>当前得票:<span class="poll"><?= $model->vote ?></span></p>
                </div>
                <div class="r">
                    <p>爱的宣言:</p>
                </div>
                <p class="manifesto"><?= $model->declaration ?></p>
            </div>
            <div class="under-review">
                <img class="audit-txt" src="<?= Asset::getAssetUrl('images/audit-txt.png') ?>">
                <a href="<?= Url::toRoute(['default/exhibition']) ?>"><img class="btn-all-l"
                                                                           src="<?= Asset::getAssetUrl('images/btn-all-l.png') ?>"></a>
            </div>
        </div>

    <?php elseif ($model->status == 1): ?>
        <!--上传已审核-->
        <div class="reviewed">
            <img class="detail-txt" src="<?= Asset::getAssetUrl('images/detail-txt.png') ?>">

            <div class="photo-wrapper">
                <img class="photo" src="<?= Yii::getAlias('@uploadsUrl/' . $model->photo) ?>">
            </div>
            <div class="info">
                <div class="r">
                    <p>选手编号:<span class="userNumber"><?= $model->id ?></span></p>
                    <p>当前得票:<span class="poll"></span><?= $model->vote ?></p>
                </div>
                <div class="r">
                    <p>爱的宣言:</p>
                </div>
                <p class="manifesto"><?= $model->declaration ?>
                </p>
            </div>
            <div class="approved">
                <a href="<?= Url::to(['/valentinesday/default/exhibition']) ?>"><img class="btn-all"
                                                                                     src="<?= Asset::getAssetUrl('images/btn-all.png') ?>"></a>
                <img class="btn-call" src="<?= Asset::getAssetUrl('images/btn-call.png') ?>">
                <img class="btn-vote-ta" src="<?= Asset::getAssetUrl('images/btn-vote-ta.png') ?>" style="display: none">
            </div>
            <div class="shade-share shade" style="display:none">
                <img src="<?= Asset::getAssetUrl('images/share_shade_bg.png') ?>">
                <img src="<?= Asset::getAssetUrl('images/icon_share.png') ?>">
            </div>
            <div class="shade-vote-success shade" style="display:none">
                <img src="<?= Asset::getAssetUrl('images/shade-vote-success.png') ?>">
                <a href="http://mp.weixin.qq.com/s?__biz=MzIzNTA1MzMwOA==&mid=534926917&idx=1&sn=8ae8e49ac8ed01fecea5c6361cf985ca&chksm=72fbffd6458c76c0d309c822f419294c71e9ab605a4f28f9fd67de787feb23516a1bb2ac0010&mpshare=1&scene=1&srcid=0824B1S4huVFIZ5nK4IUF3yn#rd">
                    <img class="btn-ejiao" src="<?= Asset::getAssetUrl('images/btn-ejiao.png') ?>">
                </a>
                <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
            </div>
            <div class="shade-voteonly1 shade" style="display:none">
                <img src="<?= Asset::getAssetUrl('images/shade-voteonly1.png') ?>">
                <a href="http://mp.weixin.qq.com/s?__biz=MzIzNTA1MzMwOA==&mid=534926917&idx=1&sn=8ae8e49ac8ed01fecea5c6361cf985ca&chksm=72fbffd6458c76c0d309c822f419294c71e9ab605a4f28f9fd67de787feb23516a1bb2ac0010&mpshare=1&scene=1&srcid=0824B1S4huVFIZ5nK4IUF3yn#rd">
                    <img class="btn-ejiao" src="<?= Asset::getAssetUrl('images/btn-ejiao.png') ?>">
                </a>
                <img class="btn-close" src="<?= Asset::getAssetUrl('images/btn-close.png') ?>">
            </div>
        </div>
    <?php elseif ($model->status == 2): ?>
        <!--未通过审核-->
        <div class="unaudited">
            <img class="detail-txt" src="--><?= Asset::getAssetUrl('images/detail-txt.png') ?>">
            <div class="photo-wrapper">
                <img class="photo" src="<?= Yii::getAlias('@uploadsUrl/' . $model->photo) ?>">
            </div>
            <div class="info">
                <div class="r">
                    <p>选手编号:<span class="userNumber"><?= $model->id ?></span></p>
                    <p>当前得票:<span class="poll"><?= $model->vote ?></span></p>
                </div>
                <div class="r">
                    <p>爱的宣言:</p>
                </div>
                <p class="manifesto"><?= $model->declaration ?></p>
            </div>
            <div class="under-review">
                <img class="unadited-txt" src="<?= Asset::getAssetUrl('images/unaudited-txt.png') ?>">
                <a href="<?= Url::toRoute(['default/exhibition']) ?>"><img class="btn-all-l"
                                                                           src="<?= Asset::getAssetUrl('images/btn-all-l.png') ?>"></a>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php

$js = <<<EOF
  $(".btn-vote-ta").on('click', function () {
        $.get('{$url}',function(data){
            code = data.code;
            if (code == 200){
                $(".shade-vote-success").show();
            } else if(code == 304){
              $('.shade-voteonly1').show();
            }else if(code == 403){
            }else{
    
            }
        },"json");
    });
EOF;

//$this->registerJs($js);


?>

