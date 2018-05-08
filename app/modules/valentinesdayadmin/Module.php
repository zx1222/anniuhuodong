<?php

namespace app\modules\valentinesdayadmin;

/**
 * adminfathersday module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\valentinesdayadmin\controllers';

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