<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 2017/4/17
 * Time: 下午10:24
 */

namespace activity\ejiao;

class Package extends \grazio\core\package\Package
{

    public $name = 'ejiao';

    public function getWebModule()
    {
        return [
            $this->name => [
                'class' => Module::className()
            ],
        ];
    }

    public  function getAdminModule()
    {
        return [
            $this->name => [
                'class' => Admin::className()
            ],
        ];
    }

    public function getApiModule()
    {
        return false;
    }

}