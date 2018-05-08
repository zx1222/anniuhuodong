<?php

namespace app\modules\adminejiaoduilian;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\adminejiaoduilian\controllers';

    public $defaultRoute = 'weixin-user';
    public function init()
    {
        parent::init();
        $this->layout = 'main.php';
        // custom initialization code goes here
    }
}
