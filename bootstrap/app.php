<?php
// start session
session_start();

// require all dependecies installed via composer
require_once '../vendor/autoload.php';

// create instance of Slim
$app = new \Slim\App([

	'settings'	=>	[

		// display errors
		'displayErrorDetails'	=>	true,

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
		],

	]

]);

// create container
$container = $app->getContainer();

// create instance of Capsule Manager as $capsule obj
$capsule = new \Illuminate\Database\Capsule\Manager;

// add connection using db config in settings
$capsule->addConnection($container['settings']['db']);

$capsule->setAsGlobal();

$capsule->bootEloquent();

// create 'db' property
$container['db'] = function($container) use ($capsule) {

	return $capsule;

};

// create 'view' property in $container which is a anonymous
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
// anonymous function is to instantiate a HomeController obj
$container['HomeController'] = function($container) {

	// pass $container on HomeController obj
	return new \App\Controllers\HomeController($container);

};

// Add 'AuthController' property
$container['AuthController'] = function($container) {

	// pass $container on HomeController obj
	return new \App\Controllers\Auth\AuthController($container);

};

// Add 'validator' property
$container['validator'] = function() {
	return new \App\Validation\Validator;
};

// attach slim/csrf to $container
$container['csrf'] = function() {
	return new \Slim\Csrf\Guard;
};

// add Middleware instances to all routes
// and pass $container because base class Middleware requires it on it's constructor
$app->add(new \App\Middleware\ValidationErrorsMiddleware($container));
$app->add(new \App\Middleware\SubmittedInputMiddleware($container));

// add CsrfMiddleware to all routes
$app->add(new \App\Middleware\CsrfMiddleware($container));

// add slim/csrf to all routes
$app->add($container->csrf);

// include Validator class
use Respect\Validation\Validator as v;

// load classes of validation rules by passing the path
v::with('App\\Validation\\Rules');

// require routes file
require_once '../app/routes.php';
