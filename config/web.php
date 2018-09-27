<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'language' => 'ru',
    'sourceLanguage' => 'en',
    'name' => 'Robot Fest',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [




      'urlManager' => [
          'enablePrettyUrl' => true,
          // 'enablePrettyUrl' => false,
          // 'showScriptName' => true,
          'showScriptName' => false,
          'enableStrictParsing' => true,
          //  // 'suffix' => '.html',
          'class'=>'app\components\LangUrlManager',
          'rules' => [

          '/' => 'site/index',

          "/en" => '/en/site/index',
          "/ru" => '/ru/site/index',

          'discipline' => 'discipline/index',

          "/en/discipline" => '/en/discipline/index',
          "/ru/discipline" => '/ru/discipline/index',


          // '/en/<sort:\w+>' => '/en/<sort>',
          // '/ru/<sort:\w+>' => '/ru/<sort>',
          //
          // '/en/discipline/<sort:\w+>'=> '/en/discipline<sort>',
          // '/ru/discipline/<sort:\w+>'=> '/ru/discipline<sort>',




          // '<language:\w+>/<action:\w+>/<id:\d+>'=> '/discipline/<action>/<language>',
          //
          // '<language:\w+>/<action:\w+>/<id:\d+>' => '/site/<action>/<language>',
          //
          //
          //



          '<language:\w+>/discipline/<action:\w+>/<id:\d+>/'=> '<language>/discipline/<action>',

          '/discipline/<action:\w+>/<id:\d+>/'=> 'discipline/<action>',

          'discipline/<action:\w+>'=> 'discipline/<action>',

          '<language:\w+>/<action:\w+>/<id:\d+>/' => '<language>/site/<action>',

          '/<action:\w+>/<id:\d+>/' => 'site/<action>',

          '<action:\w+>' => 'site/<action>',


          // [
          //  'class' => '\app\components\LangUrlManager',
          // ],
          ],
        ],


        'lengselect' =>[
            'class' => 'app\components\LengSelect',
        ],
        'i18n' => [
            'translations' => [
                'common*' => [
                  'sourceLanguage' => 'en',
                  'class' => 'yii\i18n\PhpMessageSource',
                  'basePath' => '@app/messages',
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'isgHB9J28hGbgGmrE0b_CtNQe47M8rzS',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] =
    [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] =
    [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
