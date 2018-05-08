<?php

namespace trt\stores;

/**
 * news module definition class
 */
class Admin extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'trt\stores\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public static function menu()
    {
        return [
            [
                'label' => '门店管理',
                'icon' => 'th-list',
                'items' => [
                    ['label' => '公司', 'icon' => 'home', 'url' => ['/stores/company']],
                    ['label' => '门店', 'icon' => 'sitemap', 'url' => ['/stores/store']],
                ]
            ]
        ];
    }
}
