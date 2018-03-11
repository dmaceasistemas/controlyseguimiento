<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Control y Seguimiento de Labores Diarias','language'=>'es',
        

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
                'charset'=>'UTF-8',
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to set up database
		    'db'=>array(
                      'connectionString'=>'pgsql:host=172.16.2.88; port=5432;dbname=db_control_seguimiento',                      
		      'username'=>'demeter_sa',
		      'password'=>'d3m3t3r@54',
                      //'charset'=>'UTF-8',
		),
        	'db1'=>array(
                      //'charset'=>'UTF-8',
                      'class'=>'CDbConnection',
                      'connectionString'=>'pgsql:host=172.16.0.21;port= 5432;dbname=db_ares',                      
                      'username'=>'ares_sa',
                      'password'=>'4r35@54',
                      
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@cvapedrocamejo.gob.ve',
	),
);
