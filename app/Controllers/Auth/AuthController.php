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
			// notEmpty:				should not be empty
			// alpha:						should only be alphabet letters
			// noWhitespace:		no spaces/tabs
			// email:						should be valid email format
			// emailAvailable:	not a method from a class, but the name of the class itself (from v::with('path') in bootstrap.php)
			'name'			=>	v::notEmpty()->alpha(),
			'email'			=>	v::noWhitespace()->notEmpty()->email()->emailAvailable(),
			'password'	=>	v::noWhitespace()->notEmpty()
		]);

		if ($validation->failed()) {
			// if errors, redirect to sign up page
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


