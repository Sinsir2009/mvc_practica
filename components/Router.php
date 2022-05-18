<?php

class Router
{

	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);

	}

	/*
		Returns request string
	 */
	public function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])){
			$uri = trim($_SERVER['REQUEST_URI'], '/');

			// для главной страницы
			//echo $uri;
			if ($uri == "mvc_practica") {

				return $uri;
			} else {

				// убираем из запроса ненужную часть
				$muri = explode('/', $uri);
				array_shift($muri);
				$muri = implode('/', $muri);
				return $muri;
			}
		}

	}
	public function run()
	{

		// Получить строку запроса
		$uri = $this->getURI();

		// Проверить наличие такого запроса в routes.php
		foreach ($this->routes as $uriPattern => $path) {

			if (preg_match("~$uriPattern~", $uri)) {

				// получаем внутренний путь
			//	echo'<br>Где ищем (запрос, который набрал пользователь): '. $uri;
			//	echo'<br>Что ищем (совпадение из правила): '. $uriPattern;
			//	echo'<br>Кто обрабатывает: '. $path;
				$internalRoute = preg_replace("`$uriPattern`", $path, $uri);

			//	echo '<br><br>Нужно сформировать : '.$internalRoute;



				// определить какой контроллер и экшн  обрабатывает запрос
				$segments = explode('/', $internalRoute);

				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);


				$actionName = 'action'.ucfirst(array_shift($segments));

				$parameters = $segments;

				// Подключить файл класса-контроллера
				$controllerFile = ROOT . '/controllers/'.$controllerName . '.php';
				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}

				// Создать объект, вызвать метод (т.е. action)
				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				if ($result != null) {
					break;
				}
			}
		}

	}


}