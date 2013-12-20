<?php
	return array(
		'id' => 'app',

		// Preload the Debug Module
		'preload' => array(
			'debug'
		),

		'basePath' => dirname(__DIR__),
		'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),


		// Components
		'components' => array(
			'urlManager' => array(
				'class' => 'yii\web\UrlManager',
				'showScriptName' => false,
				'enablePrettyUrl' => true
			),

			// Caching
			'cache' => array(
				'class' => 'yii\caching\FileCache'
			),

			// UserIdentity
			'user' => array(
				'identityClass' => 'app\models\User',
			),

			// Logging
			'log' => array(
				'traceLevel' => 3,
				'targets' => array(
					array(
						'class' => 'yii\log\FileTarget',
						'levels' => array('error', 'warning')
					)
				)
			),

			// Database
			'db' => array(
				'class' => 'yii\db\Connection',
				'dsn' => 'mysql:host=localhost;dbname=yf2',
				'username' => 'yf2',
				'password' => 'yf2',
				'charset' => 'utf8'
			)
		),

		// Modules
		'modules' => array(
			'debug' => 'yii\debug\Module',
			'gii'   => 'yii\gii\Module'
		),

		// Extra Params if we want them
		'params' => array()
	);
