<?php

$app->get('/home', function($request, $response) {
	// render in 'home.twig' file
	return $this->view->render($response, 'home.twig');
});
