<?php
// start session
session_start();

// require all dependecies installed via composer
require_once '../vendor/autoload.php';

// create instance of Slim
$app = new \Slim\App();
