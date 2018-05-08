<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\chongyang;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Asset extends AssetBundle
{
    public $css = [
        'css/style.css',

    ];
    public $js = [
        'js/jquery.touchSwipe.min.js',
        'js/lottery.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        $this->sourcePath = dirname(__FILE__) . '/assets';
        parent::init();
    }

    static public function getAssetUrl($filePath)
    {
        return \Yii::$app->assetManager->getPublishedUrl(dirname(__FILE__) . '/assets') . DIRECTORY_SEPARATOR . $filePath;
    }

}
