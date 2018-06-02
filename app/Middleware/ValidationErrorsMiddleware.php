<?php

namespace App\Middleware;

class ValidationErrorsMiddleware extends Middleware {

	// magic method __invoke is called when ValidationErrorsMiddleware is instantiated
	public function __invoke($request ,$response, $next_callable_middleware) {

		// attach $_SESSION['errors'] to global as errors passed to views (*.twig)
		$this->container->view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);

		// session not needed so remove it
		unset($_SESSION['errors']);

		// invoke $next_callable_middleware passing $request and $response
		$response = $next_callable_middleware($request, $response);

		return  $response;

	}

}
