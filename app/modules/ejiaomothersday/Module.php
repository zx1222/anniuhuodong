<?php

namespace app\modules\ejiaomothersday;

/**
 * zhuanpan module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\ejiaomothersday\controllers';

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
