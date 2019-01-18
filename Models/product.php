<?
class Product {
    //atributos
    public $id;
	public $refCode;
	public $name;
	public $amount;
	public $price;
 
	//constructor de la clase
	function __construct($id, $refCode, $name, $amount, $price) {
        $this->id=$id;
		$this->refCode=$refCode;
		$this->name=$name;
		$this->amount=$amount;
		$this->price=$price;
	}
 
	//función para obtener todos los productos
	public static function all(){
		$productsList =[];
		$db=Connect::getConnect();
		$sql=$db->query('SELECT * FROM products');
 
		// carga en la $productsList cada registro desde la base de datos
		foreach ($sql->fetchAll() as $product) {
			$productsList[]= new Product($product['id'],$product['refCode'],$product['name'], $product['amount'],$product['price']);
		}
		return $productsList;
	}
 
	//la función para registrar un product
	public static function save($product){
			$db=Connect::getConnect();
			$insert=$db->prepare('INSERT INTO PRODUCTS VALUES(NULL,:refCode,:name,:amount, :price)');
            $insert->bindValue('refCode',$product->refCode);
			$insert->bindValue('name',$product->name);            
			$insert->bindValue('amount',$product->amount);
			$insert->bindValue('price',$product->price);
			$insert->execute();
		}
 
	//la función para actualizar 
	public static function update($product){
		$db=Connect::getConnect();
		$update=$db->prepare('UPDATE products SET refCode=:refCode, name=:name, amount=:amount, price=:price WHERE id=:id');
		$update->bindValue('id',$product->id);
		$update->bindValue('refCode',$product->refCode);
        $update->bindValue('name',$product->name);
		$update->bindValue('amount',$product->amount);        
		$update->bindValue('price',$product->price);
		$update->execute();
	}
 
	// la función para eliminar por el id
	public static function delete($id){
		$db=Connect::getConnect();
		$delete=$db->prepare('DELETE FROM products WHERE ID=:id');
		$delete->bindValue('id',$id);
		$delete->execute();
	}
 
	//la función para obtener un producto por el id
	public static function getById($id){
		//buscar
		$db=Connect::getConnect();
		$select=$db->prepare('SELECT * FROM products WHERE ID=:id');
		$select->bindValue('id',$id);
		$select->execute();
		//asignarlo al objeto producto
		$productDb=$select->fetch();
		$product= new Product($productDb['id'],$productDb['refCode'],$productDb['name'],$productDb['amount'], $productDb['price']);
		return $product;
	}
}

?>
