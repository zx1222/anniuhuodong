<?php

namespace app\modules\chongqing;

/**
 * zhuanpan module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\chongqing\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->layout = 'main.php';
        parent::init();

        // custom initialization code goes here
    }
}
