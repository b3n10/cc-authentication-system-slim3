<?php

namespace App\Controllers\Auth;

// include base class Controller
use App\Controllers\Controller;

// include User class
use App\Models\User;

// inclue Validator class
use Respect\Validation\Validator as v;

class AuthController extends Controller {

	public function getSignUp($request, $response) {

		// add dir 'auth' before twig file
		return $this->view->render($response, 'auth/signup.twig');

	}

	public function postSignUp($request, $response) {

		// validate the inputs
		// then pass the Validator obj to $validation
		// which will have the failed method
		$validation = $this->validator->validate($request, [
			'name'			=>	v::notEmpty()->alpha(),
			'email'			=>	v::noWhitespace()->notEmpty(),
			'password'	=>	v::noWhitespace()->notEmpty()
		]);

		if ($validation->failed()) {
			// redirect to sign up page
			return $response->withRedirect($this->router->pathFor('auth.signup'));
		}

		// inset to db
		User::create([
			'name'			=>	$request->getParam('name'),
			'email'			=>	$request->getParam('email'),
			'password'	=>	password_hash($request->getParam('password'), PASSWORD_DEFAULT)
		]);

		// redirect to the URI using the name of it's 'router
		return $response->withRedirect($this->router->pathFor('home'));

	}

}


