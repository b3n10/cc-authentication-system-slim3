<?php

namespace App\Auth;

// include User class which has Eloquent for db access
use App\Models\User as u;

class Auth {

	public function attempt($email, $password) {

		// grab user email
		$user = u::where('email', $email)->first();

		// if no result for $user
		if (!$user) {
			return false;
		}

		if (password_verify($password, $user->password)) {

			// add userid to Sessions
			$_SESSION['userid'] = $user->id;
			return true;

		}

		// if password doesn't match
		return false;

	}

}
