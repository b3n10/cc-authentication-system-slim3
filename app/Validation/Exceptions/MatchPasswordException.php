<?php

namespace App\Validation\Exceptions;

// include ValidationException class
use Respect\Validation\Exceptions\ValidationException;

class MatchPasswordException extends ValidationException {

	// template for default error message
	public static $defaultTemplates = [
		self::MODE_DEFAULT => [
			self::STANDARD => 'Password doesn\'t match!'
		]
	];

}
