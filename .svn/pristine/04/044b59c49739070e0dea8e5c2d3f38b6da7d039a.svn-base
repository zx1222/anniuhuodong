<?php

namespace app\widgets\videojs;


use Yii;
use yii\base\Widget;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * Wrapper for Plupload
 * A multiple file upload utility using Flash, Silverlight, Google Gears, HTML5 or BrowserPlus.
 * @url http://www.plupload.com/
 * @version 1.0
 * @author Bound State Software
 */
class VideoJs extends Widget
{
    public $id;

    public $options = [];


    /**
     * @inheritdoc
     */
    public function init()
    {
        // Make sure URL is provided
        if (empty($this->id))
            throw new Exception(Yii::t('yii', '{class} must specify "id" property value.', array('{class}' => get_class($this))));


        $bundle = VideoJsAsset::register($this->view);

        $defaultOptions = [
//            'playerFlashMP3' => "{$bundle->baseUrl}/swf/StrobeMediaPlayback/StrobeMediaPlayback.swf",
        ];

        $options = ArrayHelper::merge($defaultOptions, $this->options);
        $options = Json::encode($options);


        // Generate event JavaScript
        $id = $this->id;
        $js = <<<JAVASCRIPT
projekktor('#{$id}',{$options});
JAVASCRIPT;

//        $this->view->registerJs($js);
    }
}
