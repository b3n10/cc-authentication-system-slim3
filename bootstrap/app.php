<?php
// start session
session_start();

// require all dependecies installed via composer
require_once '../vendor/autoload.php';

// create instance of Slim
// set display errors
$app = new \Slim\App([
	'settings'	=>	[
		'displayErrorDetails'	=>	true
	]
]);

// create container
$container = $app->getContainer();

// create 'view' index in $container and add a callback
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

// require routes file
require_once '../app/routes.php';
