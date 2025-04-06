<?php

namespace libs;

class App
{
	public function cargarPaginas()
	{
		$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
			strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';


		if (!isset($_GET['url'])) {
			if (!$isAjax) {
				require_once 'views/home_view.php';
			} else {
				echo json_encode(['status' => 'error', 'message' => 'Ruta no válida']);
			}
			exit();
		}

		$url = $_GET['url'];
		$url = explode('/', $url);

		$controllerName = ucfirst($url[0]) . 'Controller';
		$methodName = isset($url[1]) ? $url[1] : 'index';
		$params = array_slice($url, 2);

		if (class_exists("controllers\\" . $controllerName)) {
			$controller = "controllers\\" . $controllerName;
			$controllerInstance = new $controller();

			if (method_exists($controllerInstance, $methodName)) {
				$result = call_user_func_array([$controllerInstance, $methodName], $params);
				if (is_array($result)) {
					echo json_encode($result); // Convierte el array a JSON si es necesario
				} else {
					echo $result; // Imprime directamente si es una cadena
				}
			} else {
				echo "Metodo no encotrado: $methodName";
			}
		} else {
			echo "Controlador no encontrado: $controllerName";
		}
	}
}
