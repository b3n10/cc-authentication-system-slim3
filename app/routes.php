<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

// if URI is accessed then invoke 'Controller:method'
// only setName once for the URI

// 'HomeController' here is a property of $container obj
// so it will run the function for $container['HomeController']
// which returns a HomeController obj
// then run the index method when requested URI ('/') is accessed
$app->get('/', 'HomeController:index')->setName('home');

// no need to add URI for group method
// only useful on grouping certain routes
// but adding a Middleware is important to access routes

// if user is signed in
$app->group('', function() {

	/* routes for signup page */
	// get method is when URI is accessed
	// post method is when form is submitted
	$this->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
	$this->post('/auth/signup', 'AuthController:postSignUp');

	/* routes for signin page */
	$this->get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');
	$this->post('/auth/signin', 'AuthController:postSignIn');

})->add(new GuestMiddleware($container));


// if user is not signed in
$app->group('', function() {

	/* route for signout page */
	$this->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');

	/* routes for password change page */
	$this->get('/auth/password/change', 'PasswordController:getChangePassword')->setName('auth.password.change');
	$this->post('/auth/password/change', 'PasswordController:postChangePassword');

})->add(new AuthMiddleware($container));
