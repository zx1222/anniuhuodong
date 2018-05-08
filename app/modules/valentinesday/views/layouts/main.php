<?php
use yii\helpers\Html;
use app\modules\valentinesday\Asset;
use yii\web\View;
Asset::register($this);
$this->registerJsFile("http://res.wx.qq.com/open/js/jweixin-1.0.0.js", ['position' => View::POS_HEAD]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="viewport" content="width=device-width,user-scalable=0, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-orientation" content="portrait">

    <?php $this->head() ?>
    <script>
        var _mtac = {};
        (function() {
            var mta = document.createElement("script");
            mta.src = "http://pingjs.qq.com/h5/stats.js?v2.0.4";
            mta.setAttribute("name", "MTAH5");
            mta.setAttribute("sid", "500513213");

            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(mta, s);
        })();
    </script>
</head>
<body>
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
