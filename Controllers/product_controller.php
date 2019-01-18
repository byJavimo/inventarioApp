<?php

	class ProductController {	
		public function __construct(){}
 
		public function index(){
			$products= Product::all();
			require_once('Views/Product/index.php');
		}
 
		public function add(){
			require_once('Views/Product/addProduct.php');
		}
 
		//guardar
		public function save($product){
			Product::save($product);
			header('Location: ../index.php');
		}
 
		public function update($product){
			Product::update($product);
			header('Location: ../index.php');
		}
 
		public function delete($id){
			//se está de dentro del directorio Controllers y se debe salir con ../
			require_once('../Models/product.php');
			Product::delete($id);
			header('Location: ../index.php');
		}
		
		public function error(){
			require_once('Views/Product/error.php');
		} 
	}
 
 
	//obtiene los datos del producto desde la vista y redirecciona a product_controller.php
	if (isset($_POST['action'])) {
		$productController= new ProductController();
		//se añade el archivo product.php
		require_once('../Models/product.php');
		
		//se añade el archivo para la conexion
		require_once('../connect.php');
 
		if ($_POST['action']=='register') {
			$product= new Product(null,$_POST['refCode'],$_POST['name'],$_POST['amount'],$_POST['price']);
			$productController->save($product);
		}elseif ($_POST['action']=='update') {
			$product= new Product($_POST['id'],$_POST['refCode'],$_POST['name'],$_POST['amount'],$_POST['price']);
			$productController->update($product);
		}		
	}
 
	//se verifica que action esté definida
	if (isset($_GET['action'])) {
		if ($_GET['action']!='register'&$_GET['action']!='index') {
			require_once('../connect.php');
			$productController=new ProductController();
			//para eliminar
			if ($_GET['action']=='delete') {		
				$productController->delete($_GET['id']);
			}elseif ($_GET['action']=='update') {//mostrar la vista update con los datos del registro actualizar
				require_once('../Models/product.php');				
				$product=Product::getById($_GET['id']);		
				require_once('../Views/Product/update.php');
			}	
		}	
	}
?>
