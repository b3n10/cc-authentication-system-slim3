<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;

class AuthController extends Controller {

	public function getSignUp($request, $response) {

		// add dir 'auth' before twig file
		$this->view->render($response, 'auth/signup.twig');

	}

}


