<?php

namespace App\Controllers\Auth;

use App\Models\User as u;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class PasswordController extends Controller {

	public function getChangePassword($request, $response) {
		$this->view->render($response, 'auth/password/change.twig');
	}

	public function postChangePassword($request, $response) {

	}

}
