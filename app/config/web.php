<?php

$config = [
    'id' => 'TRT',
    'basePath' => dirname(__DIR__),
    'runtimePath' => dirname(dirname(__DIR__)) . '/runtime',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Asia/Shanghai',
    'language' => 'zh-CN',
    'bootstrap' => [
        'log',
        [
            'class' => 'app\components\Aliases',
            'aliases' => require(dirname(dirname(__DIR__)) . '/etc/aliases.' . YII_ENV . '.php'),
        ]
    ],
//    'defaultRoute' => '',
    'modules' => [],
    'components' => [
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        'assetManager' => [
            'linkAssets' => true,
            'appendTimestamp' => true,
        ],
        'urlManager' => [
            // 路由路径化
            'enablePrettyUrl' => true,
            // 隐藏入口脚本
            'showScriptName' => false,
            // 假后缀
//            'suffix' => '.html',
            //路径规则
            'rules' => [
//                "index" => "site/index",
            ],
        ],
//        'view' => [
//            'theme' => [
//                'class' => 'app\components\Theme',
//                'basePath' => '@app/themes/basic',
//                'baseUrl' => '@web',
//                'pathMap' => [
//                    '@app/views' => '@app/themes/basic',
//                    '@app/modules' => '@app/themes/basic/modules',
//                    '@app/widgets' => '@app/themes/basic/widgets',
//                ],
//            ],
//        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
//            'parsers' => [
//                'application/json' => 'yii\web\JsonParser',
//                'text/json' => 'yii\web\JsonParser',
//            ],
            'cookieValidationKey' => 'iinn',
        ],

//        'session' => [
//            'class' => 'yii\web\DbSession',
//            'sessionTable' => '{{%session}}',
//        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\ejiaomothersday\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['admin/default/login'],
        ],
        'exchange' => [
            'class' => 'app\components\exchange\Exchange',
            'instance' => 1,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mail' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                ],
            ],
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;


