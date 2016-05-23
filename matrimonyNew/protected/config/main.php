<?php
// uncomment the following to define a path alias

// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable

// CWebApplication properties can be configured here.

return array(

	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	
	'name'=>'BJM Matrimony',

	// preloading 'log' component
	'preload'=>array('log'),
	
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'anubhavjain',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	'defaultController'=>'site',

	// application components
	'components'=>array(
		'user'=>array(
			// disable cookie-based authentication
			'allowAutoLogin'=>true,
			// set user time out 60 minutes	
			//'authTimeout'=>3600,
		),
		'image'=>array(
			'class'=>'application.extensions.image.CImageComponent',
			'driver'=>'GD',
		),
		
		'session' => array (
	        //'autoStart' => true,
			'sessionName'=> 'jmmat',
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'urlSuffix'=>'.html',
			'rules'=>array(
            	'gii'=>'gii',
            	'gii/<controller:\w+>'=>'gii/<controller>',
            	'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
				//'programs/forthcomingPrograms/<leveltype>'=>'programs/forthcomingPrograms',
				//'programs/recentPrograms/<leveltype>'=>'programs/recentPrograms',
		
			/*'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			*/	
			),
		),
		// uncomment the following to use a MySQL database
		'db'=>require(dirname(__FILE__).'../../../db.php'),
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
			),
		),
	),
	
	// external params
	'params'=>require(dirname(__FILE__).'../../../settings.php'),
);