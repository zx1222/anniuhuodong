<?php

return [
    'params' => require(dirname(__DIR__) . '/etc/params.' . YII_ENV . '.php'),
    'components' => [

        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=aojiaodajie',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8mb4',
            'tablePrefix' => 'tbl_',
            'enableSchemaCache' => YII_ENV !== 'dev',
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache',
        ],

        'mail' => [
            'transport' => [
                'host' => 'smtp.exmail.qq.com',     # smtp 发件地址
                'username' => 'service@miinno.com',  # smtp 发件用户名
                'password' => '',       # smtp 发件人的密码
                'port' => 965,                      # smtp 端口
                'encryption' => 'ssl',                    # smtp 协议
            ],
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => [
                    'service@miinno.com' => 'Miinno',
                ],  # smtp 发件用户名(须与mail.transport.username一致)
            ],
        ],
        'wechat' => [
            'class' => 'callmez\wechat\sdk\MpWechat',
            'appId' => 'wxeda58a5a23c2f2d7',
            'appSecret' => '76c970ce9a09a8306d02bec978e7128d',
//            'appId' => 'wxb0e3247774dc4f1c',
//            'appSecret' => '8b9f9c69b4dcd18b4313f4360dfbe42c',
            'token' => 'anniu',
            'encodingAesKey' => 'Q85QGeYlYuMpkgLwa7VwBmOwwoPLXnUL2dDlXCfY3vy'
        ],

        'useranniuyuandan' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\modules\anniuyuandan\models\User',
            'enableAutoLogin' => true,
            'enableSession' => true,
            'identityCookie' => ['name' => '__user_anniuyuandan_identity', 'httpOnly' => true],
            'idParam' => '__user_anniuyuandan_identity'

        ],
        'userejiaoyuandan' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\modules\ejiaoyuandan\models\User',
            'enableAutoLogin' => true,
            'enableSession' => true,
            'identityCookie' => ['name' => '__user_ejiaoyuandan_identity', 'httpOnly' => true],
            'idParam' => '__user_ejiaoyuandan_identity'

        ],

    ],

    'modules'=>[
        'adminanniuyuandan' => [
            'class' => 'app\modules\adminanniuyuandan\Module',
        ],
        'anniuyuandan' => [
            'class' => 'app\modules\anniuyuandan\Module',
        ],

        'adminejiaoyuandan' => [
            'class' => 'app\modules\adminejiaoyuandan\Module',
        ],
        'ejiaoyuandan' => [
            'class' => 'app\modules\ejiaoyuandan\Module',
        ],
        'anniujianya' => [
            'class' => 'app\modules\anniujianya\Module',
        ],
        'ejiaonewyear' => [
            'class' => 'app\modules\ejiaonewyear\Module',
        ],
        'valentinesday' => [
            'class' => 'app\modules\valentinesday\Module',
        ],
        'ejiaomothersday' => [
            'class' => 'app\modules\ejiaomothersday\Module',
        ],
        'fathersday' => [
            'class' => 'app\modules\fathersday\Module',
        ],
    ]
];