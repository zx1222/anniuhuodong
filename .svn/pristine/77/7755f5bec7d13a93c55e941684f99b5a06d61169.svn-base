<?php

use app\modules\valentinesday\Asset;
use yii\helpers\Url;

?>
<a href="<?= Url::toRoute(['default/photo', 'id' => $model->id]) ?>">
    <div class="t">
        <img class="photo" src="<?= Yii::getAlias('@uploadsUrl/' . $model->photo) ?>">
    </div>

    <div class="b">
        <div class="l">
            <p class="nickname">选手昵称:<?= $model->nickname ?></p>
            <p class="number">选手编号:<?= $model->id ?></p>
        </div>
        <img class="btn-vote-s" src="<?= Asset::getAssetUrl('images/btn-vote-s.png') ?>">
    </div>

</a>
