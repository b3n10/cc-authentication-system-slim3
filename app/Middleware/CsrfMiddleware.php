<?php

namespace App\Middleware;

class CsrfMiddleware extends Middleware {

	public function __invoke($request ,$response, $next_callable_middleware) {

		// attach csrf name & value to global as hidden inputs accessible in views (*.twig)
		$this->container->view->getEnvironment()->addGlobal('csrf', [
			'fields'	=>	'
				<input type="hidden" name="' . $this->container->csrf->getTokenNameKey() . '" value="' . $this->container->csrf->getTokenName() . '">
				<input type="hidden" name="' . $this->container->csrf->getTokenValueKey() . '" value="' . $this->container->csrf->getTokenValue() . '">
			'
		]);

		// invoke $next_callable_middleware passing $request and $response
		$response = $next_callable_middleware($request, $response);

		return  $response;

	}

}
