<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\ejiaonewyear;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Asset extends AssetBundle
{
    public $css = [
        'css/style.min.css',
    ];
    public $js = [
        'js/index.js',
        'js/md5.js',
        'js/common.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
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
