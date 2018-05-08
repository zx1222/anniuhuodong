<?php

namespace app\widgets\videojs;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Plupload script files.
 */
class VideoJsAsset extends AssetBundle
{
    public $css = [
        'dist/video-js.min.css',
        'css/style.css',
    ];
    public $js = [
        ['dist/ie8/videojs-ie8.min.js','position' => \yii\web\View::POS_HEAD, 'condition' => 'lt IE 9'],
        'dist/video.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public function init()
    {
        $this->sourcePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
    }
}