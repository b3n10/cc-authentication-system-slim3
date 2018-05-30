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

// create 'view' index in $container
$container['view'] = function($container) {

	// define path to render 'view'
	// create $view as Twig obj
	$view = new \Slim\Views\Twig('../resources/views', [
		'cache'	=>	false // turn off caching of view
	]);

	// add twig extension
	$view->addExtension(new \Slim\Views\TwigExtension(
		$container->router,						// generate URL for links within views using $container
		$container->request->getUri()	// current 'request' of the page
	));

	// return the Twig obj
	return $view;
};

// require routes file
require_once '../app/routes.php';
