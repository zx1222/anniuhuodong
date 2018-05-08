<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\ejiaomothersday;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Asset extends AssetBundle
{
    public $css = [
        'css/swiper.min.css',
        'css/animate.min.css',
        'css/index.min.css',
    ];
    public $js = [
        'js/swiper.min.js',
        'js/swiper.animate1.0.2.min.js',
        'js/common.js',
        'js/verification.js',
        'js/index.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public function init()
    {
        $this->sourcePath = dirname(__FILE__) . '/assets';

        parent::init();
    }

    public static function getAssetUrl($filePath)
    {
        return \Yii::$app->assetManager->getPublishedUrl(dirname(__FILE__) . '/assets') . DIRECTORY_SEPARATOR . $filePath;
    }
}
