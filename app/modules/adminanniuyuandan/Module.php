<?php

namespace app\modules\adminanniuyuandan;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\adminanniuyuandan\controllers';

    public $defaultRoute = 'weixin-user';
    public function init()
    {
        parent::init();
        $this->layout = 'main.php';
        // custom initialization code goes here
    }
}
