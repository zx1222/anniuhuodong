<?php

namespace app\modules\chongqingadmin;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\chongqingadmin\controllers';

    public function init()
    {
        parent::init();
        $this->layout = 'main.php';
        // custom initialization code goes here
    }
}
