<?php
namespace App;

/**
 * Router Class
 * Set initial routes
 * Take URI and call desired method
 */
class Router
{
  private $routes = [];
  private $params = [];

  /**
   * Method used to load routes.php file
   * @param  string $file Path to file
   * @return Router       Instance of router in order to use the other methods
   */
  public static function load(string $file) : Router
  {
    $router = new static;

    require_once $file;

    return $router;
  }

  /**
   * Register a route
   * Process to convert the route (string) to a regular expression in order to have a more flexible router
   * @param  string $route      Route string, either full route or regular expression
   * @param  array  $params   This array stores 'controller' and 'action of each route (if passed)
   * @return void
   */
  public function addRoute(string $route, array $params = []) : void
  {
    // Escape forward slashes
    $route = preg_replace('/\//', '\\/', $route);

    // Convert variables e.g. {controller}
    $route = preg_replace('/\{([a-z0-9]+)\}/', '(?P<\1>[a-z0-9-]+)', $route);

    // Convert variables with custom regular expressions e.g. {id:\d+} for numbers
    $route = preg_replace('/\{([a-z0-9]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

    // Add start and end delimeter
    $route = '/^' . $route . '$/i';

    $this->routes[$route] = $params;
  }

  /**
   * This is where you set the controller and action taken from the URI (like 'posts/add')
   * ... and save those into $this->params
   * This method is called in routes.php
   * @param  string $uri        Full route like 'task/add-task'
   * @return void
   */
  public function setParams(string $uri) : void
  {
    // Store parameters for current 'controller' and 'action'
    foreach ($this->routes as $route => $params) 
    {
      if (preg_match($route, $uri, $matches)) 
      {
        
        foreach ($matches as $key => $match) 
        {
          if (is_string($key)) 
          {
            if ($key === 'controller') 
            {
              $match = ucwords($match);
            }

            $params[$key] = $match;
          }
        }

        $this->params = $params;
      }
    }
  }

  /**
   * Call requested controller->action()
   * At this point $this->params is = ['controller' => 'MyController', 'action' => 'desiredMethod', 'id' => 1]
   * So first check if such 'controller' exists and 'action' is a callable method
   * If so, then unset 'controller' and 'action', which leaves $this->params = ['id' => 1]
   * And last, the desired function is called with all the parameters (array) like 'id'... 
   * ... and this can be used or not if the method doesn't receive any arguments 
   * @return void
   */
  public function redirect() : void
  {
    $controller = $this->getNamespace() . $this->params['controller'];
    $action = $this->capitalizeAction($this->params['action']);

    if (class_exists($controller)) 
    {
      $controller = new $controller;
      unset($this->params['controller']);

      if (is_callable([$controller, $action])) 
      {
        unset($this->params['action']);
        unset($this->params['namespace']);
      }
      else
      {
        die('Page not found.');
      }
    }
    else 
    {
      header('location: ' . URLROOT);
    }

    call_user_func_array([$controller, $action], [$this->params]);
  }

  /**
   * Get the namespace for the requested controller class
   * @return string $namespace String for the complete namespace
   */
  private function getNamespace() : string
  {
    $namespace = '\\Controllers\\';

    if (array_key_exists('namespace', $this->params))
    {
      $namespace .= $this->params['namespace'] . '\\';
    }

    return $namespace;
  }

  /**
   * Camel case the 'action' string
   * If in the URL the action is something like '{controller}/add-new-task'...
   * ... change it to 'addNewTask' in order to make it match with a class method
   * @param string $action Get the 'action' from the URL
   * @return string      Camel Cased 'action' string
   */
  private function capitalizeAction(string $action) : string
  {
    $action = explode('-', $action);

    for($i=1; $i < count($action); $i++){
      $action[$i] = ucwords($action[$i]);
    }

    return implode($action);
  }
}