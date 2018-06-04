<?php

namespace App\Validation\Rules;

// Reminder: every custom rule needs an exception for Validator class to handle errors
// this class requires to have EmailAvailableException class

// include AbstractRule class
use Respect\Validation\Rules\AbstractRule;

class EmailAvailable extends AbstractRule {

	public function validate($input) {

		return false;

	}

}
