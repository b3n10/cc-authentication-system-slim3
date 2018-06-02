<?php
// Middleware: the code the runs before and after your Slim application;
// it manipulates the Request and Response objects

namespace App\Middleware;

class Middleware {

	protected $container;

	public function __construct($container) {

		$this->container = $container;

	}

}
