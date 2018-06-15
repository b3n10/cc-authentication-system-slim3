<?php

use App\Middleware\AuthMiddleware;

// 'HomeController' here is a property of $container obj
// so it will run the function for $container['HomeController']
// which returns a HomeController obj
// then run the index method to the requested URI ('/home')
$app->get('/home', 'HomeController:index')->setName('home');

/* routes for signup page */
// only setName once for the URI
// if URI is accessed
$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');

// if form is submitted
$app->post('/auth/signup', 'AuthController:postSignUp');

/* routes for signin page */
$app->get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');
$app->post('/auth/signin', 'AuthController:postSignIn');

$app->group('', function() {
	/* route for signout page */
	$this->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');
	/* routes for password change page */
	$this->get('/auth/password/change', 'PasswordController:getChangePassword')->setName('auth.password.change');
	$this->post('/auth/password/change', 'PasswordController:postChangePassword');
})->add(new AuthMiddleware($container));

