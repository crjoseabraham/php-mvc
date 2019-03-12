<?php
/**
 * Router Class
 * Set initial routes
 * Take URI and call desired method
 */
class Router
{
	private $routes = [
		'GET' => [],
		'POST' => []
	];

	/**
	 * Load routes.php file
	 * @param  string $file Path to file
	 * @return object       Instance of router in order to use the other methods
	 */
	public static function load(string $file)
	{
		$router = new static;

		require_once $file;

		return $router;
	}

	/**
	 * Register a GET route
	 * @param  string $uri        Full route like 'task/add-task'
	 * @param  string $controller Controller and action, e.g: Task@add-task
	 * @return void
	 */
	public function get(string $uri, string $controller) : void
	{
		$this->routes['GET'][$uri] = $controller;
	}

	/**
	 * Register a POST route
	 * @param  string $uri        Full route like 'task/add-task'
	 * @param  string $controller Controller and action, e.g: Task@add-task
	 * @return void
	 */
	public function post($uri, $controller) : void
	{
		$this->routes['POST'][$uri] = $controller;
	}

	/**
	 * Load requested URI's associated controller method
	 * @param  string $uri        Full route like 'task/add-task'
	 * @param  string $method 	  GET or POST
	 * @return void
	 */
	public function direct($uri, $method)
	{
		// Remove first part of URI which is 'php-basic-mvc'
		// Then, the string for the desired controller will be at 0 index
		array_shift($uri);

		if (empty($uri))
		{
			return $this->callAction('Index', 'get');
		}

		if (array_key_exists($uri[0], $this->routes[$method])) 
		{
			return $this->callAction(
				...explode('@', $this->routes[$method][$uri[0]])
			);
		} 
		else 
		{
			return $this->callAction(
				...explode('@', $this->routes[$method]['404'])
			);
		}
		
		throw new Exception('No route defined for this URI.');
	}

	private function callAction($controller, $action)
	{
		$controller = "Controllers\\{$controller}";
		$controller = new $controller;

		return $controller->$action();
	}
}