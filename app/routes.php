<?php

// 'HomeController' here is a property of $container obj
// so it will run the function for $container['HomeController']
// which returns a HomeController obj
// then run the index method to the requested URI ('/home')
$app->get('/home', 'HomeController:index')->setName('home');

// only setName once for the URI
// if URI is accessed
$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');

// if form is submitted
$app->post('/auth/signup', 'AuthController:postSignUp');
