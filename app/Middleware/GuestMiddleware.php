<?php

namespace App\Middleware;

class GuestMiddleware extends Middleware {

	public function __invoke($request ,$response, $next_callable_middleware) {

		if ($this->container->auth->check()) {
			$this->container->flash->addMessage('error', 'Invalid privilege to access page!');
			return $response->withRedirect($this->container->router->pathFor('home'));
		}

		// invoke $next_callable_middleware passing $request and $response
		$response = $next_callable_middleware($request, $response);

		return  $response;

	}

}
