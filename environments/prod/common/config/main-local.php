<?php
return [
	'components' => [
		'db' => [
			'class' => 'yii\db\Connection',
			'dsn' => 'pgsql:host=localhost;dbname=coin',
			'username' => 'coin',
			'password' => '',
			'charset' => 'utf8',
			'schemaMap' => [
				'pgsql' => [
					'class' => 'yii\db\pgsql\Schema',
					'defaultSchema' => 'public',
				]
			],
			'enableQueryCache' => true,
		],
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => '@common/mail',
		],
	],
];
