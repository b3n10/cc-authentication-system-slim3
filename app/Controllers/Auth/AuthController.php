<?php

namespace App\Controllers\AuthController;

use  App\Controllers\Controller;

class AuthController extends Controller {

	public function getSignUp($request, $response) {

		$this->view->render($response, 'signup.twig');

	}

}


