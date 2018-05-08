<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\modules\chongqing\Asset;
use yii\web\View;

Asset::register($this);
$this->registerJsFile("http://res.wx.qq.com/open/js/jweixin-1.2.0.js", ['position' => View::POS_HEAD]);
$wxJsApiConfig = json_encode(Yii::$app->exchange->jsApiConfig(['jsApiList' => ['hideMenuItems']])) ;
$js = <<<JS

  wx.config({$wxJsApiConfig});
    wx.ready(function () {
        wx.hideOptionMenu();
    });
JS;
$this->registerJs($js);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div style="display:none">
</div>
<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>