<?php

namespace App\Validation;

// include exception class
use Respect\Validation\Exceptions\NestedValidationException;

class Validator {

	protected $errors;

	public function validate($request, array $rules) {

		// loop the $rules array
		// which has the $field_name and $rule
		foreach ($rules as $field_name => $rule) {
	}

}
