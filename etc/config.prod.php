<?php

return [
    'defaultRoute' => 'anniuyuandan',

    'params' => require(dirname(__DIR__) . '/etc/params.' . YII_ENV . '.php'),
    'components' => [

        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=rm-2ze3x8irju9p2kxs3.mysql.rds.aliyuncs.com:3306;dbname=ejiaonewyear',
            'username' => 'ejiaonewyear',
            'password' => 'vueKy2huyJs7myra',
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

    ],

    'modules'=>[
        'adminanniuyuandan' => [
            'class' => 'app\modules\adminanniuyuandan\Module',
        ],
        'anniuyuandan' => [
            'class' => 'app\modules\anniuyuandan\Module',
        ],
    ]
];