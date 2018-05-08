<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 16/6/15
 * Time: 上午5:27
 */
use yii\helpers\Html;

//\X::result($model);
use app\modules\fathersday\Asset;
$uploadPathHash = substr(strtolower(md5($model->openid)), 0, 2);
$uploadPathT = '@uploadsUrl/' . 't/' . $uploadPathHash . '/';
?>

<div class="exhibition-content-main">
    <div class="exhibition-content-header">
        <div>
            <?= Html::img($model->wx_avatar, ['class' => '', 'alt' => '']) ?>

            <p><?= $model->wx_username ?></p>
        </div>
        <div>
            <p>编号： <span><?= $model->id ?></span></p>
        </div>
    </div>
    <div class="exhibition-content-photo">
        <div>
            <?= Html::a(Html::img(Yii::getAlias($uploadPathT . $model->old_photo), ['class' => '', 'alt' => '']),\yii\helpers\Url::to(['/fathersday/default/photo', 'id' => $model->id]) )?>
        </div>
        <div>
            <?= Html::a(Html::img(Yii::getAlias($uploadPathT. $model->new_photo), ['class' => '', 'alt' => '']),\yii\helpers\Url::to(['/fathersday/default/photo', 'id' => $model->id]) )?>
        </div>
    </div>
    <div class="exhibition-content-text">
        <p><?= $model->desc ?></p>
    </div>
    <div class="exhibition-content-footer">
        <div>
            <span class="heart"><?= $model->vote ?></span>
        </div>
        <span  class="voteHandler">
            <?= Html::a('', ['/fathersday/default/photo', 'id' => $model->id], ['class' => 'a-btn']) ?>
        </span>

    </div>
</div>