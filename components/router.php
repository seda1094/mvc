<?php 
class Router
{
	private $routes;
	public function __construct() //!! _ _ 
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}


		// 1. Get link query(request string)
		// 2. Check routes 
		// 3. Get the ctrl and action by link
		// 4. Connect file to class ctrl
		// 5. Create object ,, call method

	//get request string
	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
			// return substr($_SERVER['REQUEST_URI'], strlen('/mvc/'));
			// $uri = trim($_SERVER['REQUEST_URI'], '/mvc/');
			return trim($_SERVER['REQUEST_URI'], '/mvc/');

		}
		// echo $uri;
	}


	public function run()
	{
		// echo "Class router method run";
		// print_r($this->routes);
		$uri = $this->getURI();
		// echo $uri;

		foreach ($this->routes as $uriPattern => $path) 
		{
			if (preg_match("~$uriPattern~", $uri)) {
				//internal route
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

				// echo "+";
				//explude get / symbol and creating array with dividing words 
				$segments = explode('/', $internalRoute);
				//array shift "taking" the first ellemnt of array and cut from this array 
				$controllerName = array_shift($segments)."Controller";
				// echo $controllerName;
				// we must have controllername with "capitalize" type
				$controllerName = ucfirst($controllerName);
				// echo $controllerName;

				$actionName = 'action'.ucfirst(array_shift($segments));
				//last parameters in array must be in  parameters array
				$parameters = $segments;
				// echo $actionName;	
				$controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
				echo '<br>controller name:' . $controllerName;
				echo '<br>action name:' . $actionName;
				echo '<pre>';
				print_r($parameters);
				echo '</pre>';



				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}


				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				
				if ($result != null) {
					break;
				}
			}
		}

	}

}








 ?>