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

			try {

				// setName is just the label appended for the $rule
				// assert will check if the $_POST['field_name'] (sent through $request) passes the $rule
				$rule->setName(ucfirst($field_name))->assert($request->getParam($field_name));

			} catch (NestedValidationException $e) {

				// Add the exception message of the $rule to $errors array
				$this->errors[$field_name] = $e->getMessages();

			}

		}

		// return the Validator obj
		return $this;

	}

}
