<?php

namespace app\modules\ejiaoyuandan2018;

/**
 * zhuanpan module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\ejiaoyuandan2018\controllers';

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
