<?php

$app->get('/home', function($request, $response) {
	// render in 'home.twig' file
	// $this is the $container
	return $this->view->render($response, 'home.twig');
});
