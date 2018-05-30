<?php
// start session
session_start();

// require all dependecies installed via composer
require_once '../vendor/autoload.php';

// create instance of Slim
$app = new \Slim\App([

	// set display errors
	'settings'	=>	[
		'displayErrorDetails'	=>	true
	],

	// add db config
	'db'				=>	[
		'driver'		=>	'mysql',
		'host'			=>	'localhost',
		'database'	=>	'authentication_system',
		'username'	=>	'root',
		'password'	=>	'jairah',
		'charset'		=>	'utf8',
		'collation'	=>	'utf8_unicode_ci',
		'prefix'		=>	''
	]

]);

// create container
$container = $app->getContainer();

// create 'view' property in $container which is a callback
$container['view'] = function($container) {

	// create instance of Twig obj as $view
	// define path to render 'view'
	$view = new \Slim\Views\Twig('../resources/views', [

		// turn off caching of view
		'cache'	=>	false

	]);

	// add twig extension
	$view->addExtension(new \Slim\Views\TwigExtension(

		// this will generate URL for links within views using $container obj
		$container->router,

		// current 'request' of the page
		$container->request->getUri()

	));

	// return the Twig obj
	return $view;

};

// create 'HomeController' property
// callback function is to instantiate a HomeController obj
$container['HomeController'] = function($container) {

	// pass $container on HomeController obj
	return new \App\Controllers\HomeController($container);

};

// require routes file
require_once '../app/routes.php';
