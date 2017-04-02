<?php

class Router
{
	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/Config/routes.php';
		$this->routes = include ($routesPath);
	}



	/*метод getURI возвращает строку,которая приходит закпросом на сайт 
	 */
	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI']))
		{
			$uri = trim($_SERVER['REQUEST_URI'], '/');
			return $uri;
		}
	}
	public function run()
	{
		//получить строку запроса 
		$uri = $this->getURI();
		
		// проверка наличия такого запроса в routes.php
		foreach ($this->routes as $uriPattern => $path) 
		{
			
		

		// проверка наличия такого запроса в routes.php
		if (preg_match("~$uriPattern~", $uri))
		{
			//подключает внутрений путь из внешнего согласно правилу в routes.php
			$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
			//echo $internalRoute;


		// если есть совпадение определить такой контроллер
		// и action отрабатывает запрос
		$segments = explode('/', $internalRoute);
		
		 $controllerName = array_shift($segments).'Controller';
		 $controllerName = ucfirst($controllerName);
		 $actionName = 'action'.ucfirst(array_shift($segments));
		 //echo '<br>';
		 //echo $controllerName;
		 //echo '<br>';
		 //echo $actionName;

		 $parameters = $segments;
		 //echo '<br>';
		 //print_r($parameters);
		 
		 



		// подключить файл класса-контроллера 
		 $controllerFile = ROOT.'/Controllers/'.$controllerName.'.php';
		 if(file_exists($controllerFile))
		 {
		 	require_once($controllerFile);
		 }

		// создать обЪект, вызвать метод 
		 $controllerObject = new $controllerName;
		 $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
		 if($result !=null)
		 {
		 	break;
		 } 
		}
		}	
	}
}