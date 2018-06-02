<?php

namespace App\Middleware;

class ValidationErrorsMiddleware extends Middleware {

	// magic method __invoke is called when ValidationErrorsMiddleware is instantiated
	public function __invoke($request ,$response, $next_callable_middleware) {

		// invoke $next_callable_middleware passing $request and $response
		$response = $next_callable_middleware($request, $response);

		return  $response;

	}

}
