<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'test',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'VwzOiHpCAxw9MGiqbzRHd3FZrC12_6hd',
            //'enableCsrfValidation'=>false,
        ],
        'assetManager' => [
            'linkAssets' => true,
            'appendTimestamp' => true,
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => 'js',   // do not publish the bundle
                    'js' => [
                        'jquery-2.1.4.min.js',
                    ]
                ],
            ],
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            //'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '/' => 'site/form',
                'form' => 'site/form',
                'form_result' => 'site/form_result',
                'db' => 'site/db',
                'db/init/' => 'site/dbinit',
                'regexp' => 'site/regexp',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],*/
        'errorHandler' => [
            //'errorAction' => 'site/error',
        ],
       /* 'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],*/
       'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    /*$config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';*/

    /*$config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';*/
}

return $config;
