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