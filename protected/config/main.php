<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'StatusMine',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array('statusmine',
		// uncomment the following to enable the Gii tool
//		'gii'=>array(
//			'class'=>'system.gii.GiiModule',
//			'username'=>'dev',
//			'password'=>'yiidev',
//		),
	),
	
	'defaultController' => 'statusmine',
	
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // конфиг редмайна. на продуктиве, естественно, свой.
        'redmineConfig'=>array(
            'enabled' => true,
            //'proxy' => '192.168.0.254:3128',
            'protocol' => 'https',
            'port' => '443',
            'url' => 'redmine.fabricasaitov.ru',
            'rootLogin' => 'root',
            'rootPassword' => '********'
        ),  
    ),	

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'/<controller:\w+>/<id:\d+>'=>'<controller>',
				'/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
			'showScriptName'=>false,
		),
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=statusmine',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),
);
