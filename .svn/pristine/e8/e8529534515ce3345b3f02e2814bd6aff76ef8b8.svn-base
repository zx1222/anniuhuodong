<?php

use yii\helpers\Html;

use app\modules\ejiaoaojiaodajie\Asset;
use yii\helpers\Url;

?>
<div class="media personage">
    <div class="media-left">
        <a href="#">
            <img class="media-object" src="<?= Yii::getAlias('@uploadsUrl/ejiaodajie/' . $model->old_photo) ?>"
                 alt="阿胶参选人员头像">
        </a>
    </div>
    <div class="media-body">
        <form action="">
            <ul>
                <li>编 号:<?= $model->order ?></li>
                <li>姓 名:<?= $model->username ?></li>
                <?php if(!empty($model->age)):?>
                    <li>年 龄:<?= $model->age ?></li>
                <?php endif;?>

                <li>所在门店:<?= $model->address ?></li>
            </ul>
            <div type="submit" class="pull-right vote"><?= Html::a('',['photo','id'=>$model->id],['class'=>'btn-shadow btn-block vote-link'])?></div>
        </form>

    </div>
    <div class="bg-post poll"><?= $model->vote ?></div>
</div>
<hr/>
