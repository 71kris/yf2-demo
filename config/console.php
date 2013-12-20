<?php
return array(
	'id' => 'basic-console',
	'basePath' => dirname(__DIR__),
	'preload' => array('log'),
	'controllerPath' => dirname(__DIR__) . '/commands',
	'controllerNamespace' => 'app\commands',
	'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
	'components' => array(
		'cache' => array(
			'class' => 'yii\caching\FileCache',
		),
		// Database
		'db' => array(
			'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=localhost;dbname=yf2',
			'username' => 'yf2',
			'password' => 'yf2',
			'charset' => 'utf8'
		),

		'log' => array(
			'targets' => array(
				array(
					'class' => 'yii\log\FileTarget',
					'levels' => array('error', 'warning'),
				),
			),
		),
	),
	'params' => array(),
);