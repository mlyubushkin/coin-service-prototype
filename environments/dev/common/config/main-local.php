<?php
return [
	'components' => [
		'db' => [
			'class' => \yii\db\Connection::class,
			'dsn' => 'pgsql:host=localhost;dbname=coin',
			'username' => 'coin',
			'password' => '',
			'charset' => 'utf8',
			'schemaMap' => [
				'pgsql' => [
					'class' => \yii\db\pgsql\Schema::class,
					'defaultSchema' => 'public',
				]
			],
			'enableQueryCache' => false,
		],
		'mailer' => [
			'class' => \yii\swiftmailer\Mailer::class,
			'viewPath' => '@common/mail',
			'useFileTransport' => true,
		],
	],
];
