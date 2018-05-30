<?php

// base controller is extended on other controllers

namespace App\Controllers;

class Controller {

	protected $container;

	// accept the $container obj
	public function __construct($container) {

		$this->container = $container;

	}

	public function __get($property) {

		// check if $property exists on $container obj
		if ($this->container->{$property}) {

			return $this->container->{$property};

		}

	}

}
