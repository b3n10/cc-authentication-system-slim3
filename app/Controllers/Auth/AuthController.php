<?php

namespace App\Controllers\Auth;

// include base class Controller
use App\Controllers\Controller;

// include User class
use App\Models\User;

class AuthController extends Controller {

	public function getSignUp($request, $response) {

		// add dir 'auth' before twig file
		$this->view->render($response, 'auth/signup.twig');

	}

	public function postSignUp($request, $response) {

		// inset to db
		User::create([
			'name'			=>	$request->getParam('name'),
			'email'			=>	$request->getParam('email'),
			'password'	=>	password_hash($request->getParam('password'), PASSWORD_DEFAULT)
		]);

	}

}


