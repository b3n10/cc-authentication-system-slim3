<?php

// main rule in controllers is not to invoke a php method
// instead create a method from a different class with the php method in it
// then create another method inside controller invoking the method from different class

namespace App\Controllers\Auth;

// include base class Controller
use App\Controllers\Controller;

// include User class
use App\Models\User;

// inclue Validator class
use Respect\Validation\Validator as v;

class AuthController extends Controller {

	/* signin page */
	public function getSignIn($request, $response) {

		// add dir 'auth' before twig file
		return $this->view->render($response, 'auth/signin.twig');

	}

	public function postSignIn($request, $response) {

		$auth = $this->auth->attempt(
			$request->getParam('email'),
			$request->getParam('password')
		);

		if (!$auth) {
			// if fail, redirect to sign in page with errors
			return $response->withRedirect($this->router->pathFor('auth.signin'));
		}

		// if success, redirect to home page
		return $response->withRedirect($this->router->pathFor('home'));

	}


	/* signup page */
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
			// emailAvailable:	will look a class with same name in v::with('path') from bootstrap.php and run validate method
			'name'			=>	v::notEmpty()->alpha(),
			'email'			=>	v::noWhitespace()->notEmpty()->email()->emailAvailable(),
			'password'	=>	v::noWhitespace()->notEmpty()
		]);

		if ($validation->failed()) {
			// if errors, redirect to sign up page
			return $response->withRedirect($this->router->pathFor('auth.signup'));
		}

		// inset to db
		$user = User::create([
			'name'			=>	$request->getParam('name'),
			'email'			=>	$request->getParam('email'),
			'password'	=>	password_hash($request->getParam('password'), PASSWORD_DEFAULT)
		]);

		// sigin just like postSignIn
		$this->auth->attempt(
			$user->email,
			$request->getParam('password')
		);

		// redirect to the URI using the name of it's 'router
		return $response->withRedirect($this->router->pathFor('home'));

	}

	/* signout page */
	public function getSignOut($request, $response) {

		$this->auth->logout();

		// redirect to homepage
		return $response->withRedirect($this->router->pathFor('home'));

	}

}


