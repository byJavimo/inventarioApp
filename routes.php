
<?php
 
	//función que llama al controlador y su respectiva acción, que son pasados como parámetros
	function call($controller, $action){
		//importa el controlador desde la carpeta Controllers
		require_once('Controllers/' . $controller . '_controller.php');
		//crea el controlador
		switch($controller){
            case 'product':
                // require_once('Models/product.php');
				$controller= new ProductController();
				break; 
 
		}
		//llama a la acción del controlador
		$controller->{$action }();
	}
 
	//array con los controladores y sus respectivas acciones
	$controllers= array(
						'product'=>['index','add']
						);
	//verifica que el controlador enviado desde index.php esté dentro del arreglo controllers
	if (array_key_exists($controller, $controllers)) {
		//verifica que el arreglo controllers con la clave que es la variable controller del index exista la acción
		if (in_array($action, $controllers[$controller])) {
			//llama  la función call y le pasa el controlador a llamar y la acción (método) que está dentro del controlador
			call($controller, $action);
		}else{
			call('product', 'error');
		}
	}else{// le pasa el nombre del controlador y la pagina de error
		call('product', 'error');
	}
?>