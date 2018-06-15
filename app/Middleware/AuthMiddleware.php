<?php

namespace App\Middleware;

class AuthMiddleware extends Middleware {

	public function __invoke($request ,$response, $next_callable_middleware) {

		if (!$this->container->auth->check()) {
			$this->container->flash->addMessage('error', 'Please sign in before continuing!');
			return $response->withRedirect($this->container->router->pathFor('auth.signin'));
		}

		// invoke $next_callable_middleware passing $request and $response
		$response = $next_callable_middleware($request, $response);

		return  $response;

	}

}
