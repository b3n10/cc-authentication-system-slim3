<?php

// Defined in composer.json
//
// "autoload": {
// 	"psr-4": {
// 		"App\\": "app"
// 	}
// }
//
// App\:	name of application (extra '\' is needed to escape \)
// app:		dir of App
//
// then run `composer dump-autoload` and  namespace will be included in autoload function

// namespace useful for creating instance of class
// no need to add full path of class
// e.g. $obj = new \App\Controllers\ClassName;
namespace App\Controllers;

// inherit from base Controller
class HomeController extends Controller {

	public function index($request, $response) {

		// view is inaccessible or undefined property in HomeController
		// so it will call magic method __get (defined in base Controller) passing view as param
		// and so view will be the Twig obj which has the render method
		return $this->view->render($response, 'home.twig');

	}

}
