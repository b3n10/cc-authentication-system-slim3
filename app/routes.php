<?php

// 'HomeController' here is a property of $container obj
// so it will run the function for $container['HomeController']
// which returns a HomeController obj
// then run the index method to the requested URI ('/home')
$app->get('/home', 'HomeController:index');

// only setName once
$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');

$app->post('/auth/signup', 'AuthController:getSignUp');
