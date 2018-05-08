<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\modules\fathersday\Asset;
use yii\web\View;
Asset::register($this);
$this->registerJsFile("http://res.wx.qq.com/open/js/jweixin-1.0.0.js", ['position' => View::POS_HEAD]);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<div class="u-pageLoading">
    <?= Html::img(Asset::getAssetUrl('images/load.gif'), ['alt' => 'loading']) ?>
</div>
<?php $this->beginBody() ?>

<div style="display:none">
</div>
<div class="logo">
    <!-- logo -->
</div>

<?php if(  Yii::$app->controller->action->id =='index' && Yii::$app->user->isGuest == false &&  Yii::$app->user->identity->extra == 1){ ?>

    <div class="home-btn home-btn-3">
        <?= Html::a('', ['/fathersday/default/mine'], ['class' => 'a-btn']) ?>
        <!-- 个人中心 -->
    </div>

<?php } else if( Yii::$app->controller->action->id =='index' ){?>

<div class="home-btn home-btn-2">
    <?= Html::a('', ['/fathersday/default/exhibition'], ['class' => 'a-btn']) ?>
    <!-- 看看他人照片 -->
</div>

<?php  }else{ ?>
<div class="home-btn home-btn-1">
    <?= Html::a('', ['/fathersday'], ['class' => 'a-btn']) ?>
    <!-- 活动首页 -->
</div>
<?php };?>


<div class="main-center" style="display: none;">
<?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
