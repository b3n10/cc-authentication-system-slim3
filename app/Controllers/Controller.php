<?php

// base controller is extended on other controllers

namespace App\Controllers;

class Controller {

	protected $container;

	// accept the $container obj
	public function __construct($container) {

		$this->container = $container;

	}

}
