<?php

namespace App\Middleware;

class SubmittedInputMiddleware extends Middleware {

	// magic method __invoke is called when SubmittedInputMiddleware is instantiated
	public function __invoke($request ,$response, $next_callable_middleware) {

		// attach $request->getParams to global as inputs accessible in views (*.twig)
		$this->container->view->getEnvironment()->addGlobal('inputs', isset($_SESSION['inputs']) ? $_SESSION['inputs'] : '');

		// Session is still needed to persist submitted data
		$_SESSION['inputs'] = $request->getParams();

		// invoke $next_callable_middleware passing $request and $response
		$response = $next_callable_middleware($request, $response);

		return  $response;

	}

}
