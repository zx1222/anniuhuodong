<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\anniujianya;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Asset extends AssetBundle
{
    public $css = [
        'css/index.css',

    ];
    public $js = [
        'js/zepto.min.js',
        'js/swiper.min.js',
        'js/oplis.js',
    ];
    public $depends = [
    ];

    public function init()
    {
        $this->sourcePath = dirname(__FILE__) . '/assets';
        parent::init();
    }

    static public function getAssetUrl($filePath = '')
    {
        $assetUrl = \Yii::$app->assetManager->getPublishedUrl(dirname(__FILE__) . '/assets');
        if (!empty($filePath)) {
            $assetUrl = $assetUrl . DIRECTORY_SEPARATOR . $filePath;
        }
        return $assetUrl;
    }

}
