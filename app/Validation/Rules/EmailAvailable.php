<?php

namespace App\Validation\Rules;

// Reminder: every custom rule needs an exception for Validator class to handle errors
// this class requires to have EmailAvailableException class

// include AbstractRule class
use Respect\Validation\Rules\AbstractRule;

// include Users class which extends Illuminate for db
use App\Models\User as u;

class EmailAvailable extends AbstractRule {

	// purpose is to return true or false for checking
	public function validate($input) {

		// check if $input matches selected 'email'
		// 0: no match, so return true
		// otherwise false
		return u::where('email', $input)->count() === 0;

	}

}
