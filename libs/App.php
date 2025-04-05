<?php
	namespace libs;
	class App
	{
		public function cargarPaginas(){
			

			if(!isset($_GET['url'])){
				require_once 'views/home_view.php';
				exit();
			}
			$url = $_GET['url'];
			$url = explode('/', $url);
			
			$controllerName = ucfirst($url[0]).'Controller';
			$methodName = isset($url[1]) ? $url[1] : 'index';
			$params = array_slice($url, 2);

			if(class_exists("controllers\\".$controllerName)){
				$controller = "controllers\\".$controllerName;
				$controllerInstance = new $controller();

				if(method_exists($controllerInstance, $methodName)){
					echo call_user_func_array([$controllerInstance, $methodName],$params);
				}else{
					echo "Metodo no encotrado: $methodName";
				}
			}else{
				echo "Controlador no encontrado: $controllerName";
			}
		}
	}