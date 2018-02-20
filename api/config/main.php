<?php
$params = array_merge(
	require __DIR__ . '/../../common/config/params.php',
	require __DIR__ . '/../../common/config/params-local.php',
	require __DIR__ . '/params.php',
	require __DIR__ . '/params-local.php'
);

return [
	'id' => 'coin-service-api',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'controllerNamespace' => 'api\controllers',

	'modules' => [
		'v1' => [
			'class' => \api\modules\v1\Module::class,
			'layout' => false,
		],
	],

	'components' => [
		'request' => [
			'csrfParam' => '_csrf-api',
			'parsers' => [
				'application/json' => \yii\web\JsonParser::class,
			]
		],

		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'flushInterval' => 1,
			'targets' => [
				'app' => [
					'class' => \yii\log\FileTarget::class,
					'levels' => ['error', 'warning'],
					'maxLogFiles' => 1000,
					'fileMode' => 0664,
				],
				'errors' => [
					'class' => \yii\log\FileTarget::class,
					'logFile' => '@runtime/logs/errors.log',
					'levels' => ['error', 'warning'],
					'maxLogFiles' => 100,
					'fileMode' => 0664,
					'except' => [
						'yii\web\HttpException:4*',
					],
				],
				'mails' => [
					'class' => \yii\log\FileTarget::class,
					'logFile' => '@runtime/logs/mails.log',
					'levels' => ['error', 'warning', 'info'],
					'maxLogFiles' => 100,
					'fileMode' => 0664,
					'categories' => [
						'yii\swiftmailer\*',
					],
					'logVars' => [],
				],
			],
		],

		'errorHandler' => [
			'errorAction' => 'v1/default/error',
		],

		'urlManager' => [
			'enablePrettyUrl' => true,
			'enableStrictParsing' => true,
			'showScriptName' => false,
			//'suffix' => '/',
			'normalizer' => [
				'class' => \yii\web\UrlNormalizer::class,
				'collapseSlashes' => true,
				'normalizeTrailingSlash' => true,
			],
			'rules' => [
				'/<module:v\d+>' => '<module>/default/index',

				[
					'class' => \yii\rest\UrlRule::class,
					'controller' => [
						'v1/account',
						'v1/category',
						'v1/counterparty',
						'v1/currency',
						'v1/currency-rate',
						'v1/default',
						'v1/transaction',
					],
				],
			],
		],

		'user' => [
			'identityClass' => \api\modules\v1\models\User::class,
			'enableSession' => false,
			'enableAutoLogin' => false,
		],
	],

	'params' => $params,
];
