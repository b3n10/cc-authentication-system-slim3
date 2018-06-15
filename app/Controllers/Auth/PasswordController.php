<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class PasswordController extends Controller {

	public function getChangePassword($request, $response) {
		$this->view->render($response, 'auth/password/change.twig');
	}

	public function postChangePassword($request, $response) {

		// matchPassword will create instance of MatchPassword class passing authenticated user's password to the constructor
		// then will invoke validate method in that class
		$validation = $this->validator->validate($request, [
			'current_password'	=>	v::noWhitespace()->notEmpty()->matchPassword($this->auth->user()->password),
			'password'					=>	v::noWhitespace()->notEmpty()
		]);

		if ($validation->failed()) {
			return $response->withRedirect($this->router->pathFor('auth.password.change'));
		}

		$this->auth->user()->setPassword($request->getParam('password'));

		$this->flash->addMessage('info', 'Password successfully changed!');

		return $response->withRedirect($this->router->pathFor('home'));

	}

}
