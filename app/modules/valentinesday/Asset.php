<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\valentinesday;

use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Asset extends AssetBundle
{
    public $css = [
        'css/animate.min.css',
        'css/font-awesome.min.css',
        'css/swiper.css',
        'css/sweetalert.css',
        'css/webuploader.css',
        'css/index.css'
    ];
    public $js = [
//        'js/jquery-1.11.3.js',
        'js/swiper.js',
        'js/swiper.animate1.0.2.min.js',
        'js/sweetalert.min.js',
        'js/webuploader.min.js',
        'js/index.js',
        'js/common.js',

    ];
    public $depends = [
        'yii\web\JqueryAsset',
//        'yii\bootstrap\BootstrapAsset',
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
