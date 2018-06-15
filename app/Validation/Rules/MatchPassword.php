<?php

namespace App\Validation\Rules;

// Reminder: every custom rule needs an exception for Validator class to handle errors
// this class requires to have EmailAvailableException class

// include AbstractRule class
use Respect\Validation\Rules\AbstractRule;

// include Users class which extends Illuminate for db
use App\Models\User as u;

class MatchPassword extends AbstractRule {

	protected $password;

	public function __construct($password) {
		$this->password = $password;
	}

	public function validate($input) {
		return password_verify($input, $this->password);
	}

}
