<?php
    class Product{
        // Encapsulamiento de variables de entradas de formulario 
        private $dbh; // Variable asignada para la conexión de la base de datos
        private $idProduct;
        private $idCategorie;
        private $productName;
        private $productDescription;
        private $productPrice;

        public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_Product_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            } 
        }

        public function __construct5($idProduct, $idCategorie, $productName, $productDescription, $productPrice){
            // Referencia datos - métodos de producto
            $this->idProduct = $idProduct;
            $this->idCategorie = $idCategorie;
            $this->productName = $productName;
            $this->productDescription = $productDescription;
            $this->productPrice = $productPrice;
        }

        // Métodos Set y Get de cada dato de Producto
            // Id Producto - Set
            public function setIdProduct($idProduct){
                $this->idProduct = $idProduct;
            }

            // Id Producto Get
            public function getIdProduct(){
                return $this->idProduct;
            }

            // Id Categoría - Set
            public function setIdCategorie($idCategorie){
                $this->idCategorie = $idCategorie;
            }

            // Id Categoría Get
            public function getIdCategorie(){
                return $this->idCategorie;
            }

            // Nombre de Producto - Set
            public function setProductName($productName){
                $this->productName = $productName;
            }

            // Nombre de Producto - Get
            public function getProductName(){
                return $this->productName;
            }

            // Descripción de Producto - Set
            public function setProductDescription($productDescription){
                $this->productDescription = $productDescription;
            }

            // Descripción de Producto - Get
            public function getProductDescription(){
                return $this->productDescription;
            }

            // Precio de Producto - Set
            public function setProductPrice($productPrice){
                $this->productPrice = $productPrice;
            }

            // Precio de Producto - Get{
            public function getProductPrice(){
                return $this->productPrice;
            }

        // Funcionalidades de CRUD para Productos
            // Crear Producto
            public function createProduct(){
                try {
                    // Inserción SQL
                    $sql = 'INSERT INTO PRODUCTS VALUES (:idProduct,:idCategorie,:productName,:productDescription,:productPrice)';
                    $stmt = $this->dbh->prepare($sql);
                    
                    // Obtención de datos de producto por método Get de función
                    $stmt->bindValue('idProduct', $this->getIdProduct());
                    $stmt->bindValue('idCategorie', $this->getIdCategorie());
                    $stmt->bindValue('productName', $this->getProductName());
                    $stmt->bindValue('productDescription', $this->getProductDescription());
                    $stmt->bindValue('productPrice', $this->getProductPrice());
                    $stmt->execute();
                } catch (Exception $e) {
                    die($e->getMessage());
                } 
            }

            // Consultar Productos
            public function readProduct(){
                try {
                    $productList = []; // Creamos una variable como arreglo donde incluya la lista de todos los productos
                    $sql = 'SELECT * FROM PRODUCTS'; // Consulta SQL
                    $stmt = $this->dbh->query($sql); // Consulta con método query incluyendo la variable con el código SQL de la consulta
                    foreach ($stmt->fetchAll() as $product) {                    
                        $productObj = new Product; 

                        // Consulta de cada columna por su nombre en la base de datos
                        $productObj->setIdProduct($product['idProduct']);
                        $productObj->setIdCategorie($product['idCategorie']);
                        $productObj->setProductName($product['productName']);
                        $productObj->setProductDescription($product['productDescription']);
                        $productObj->setProductPrice($product['productPrice']);
                        array_push($productList, $productObj);
                    }
                    return $productList;
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            // Obtener el código de Producto
            public function getProductById($idProduct){ // Parámetro de Id de producto dentro de la función
                try {
                    // Consulta SQL donde el idProducto de formulario sea igual al de la columna en la tabla de la bbdd
                    $sql = "SELECT * FROM PRODUCTS WHERE idProduct=:idProduct";

                    $stmt = $this->dbh->prepare($sql);
                    $stmt->bindValue('productCode', $productCode);
                    $stmt->execute();
                    $productDb = $stmt->fetch();
                    $product = new Product;
                    
                    // Consulta de cada columna por su nombre en la base de datos
                    $product->setIdProduct($productDb['idProduct']);
                    $product->setIdCategorie($productDb['idCategorie']);
                    $product->setProductName($productDb['productName']);
                    $product->setProductDescription($productDb['productDescription']);
                    $product->setProductPrice($productDb['productPrice']);
                    return $product;
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            // Actualizar producto
            public function updateProduct(){
                try {          
                    // Actualización de todos los datos - SQL      
                    $sql = 'UPDATE PRODUCTS SET
                                idProduct = :idProduct,
                                idCategorie = :idCategorie,
                                productName = :productName,
                                productDescription = :productDescription,
                                productPrice = :productPrice,
                            WHERE idProduct = :idProduct';
                    $stmt = $this->dbh->prepare($sql);
                    $stmt->bindValue('idProduct', $this->getIdProduct());
                    $stmt->bindValue('idCategorie', $this->getIdCategorie());
                    $stmt->bindValue('productName', $this->getProductName());
                    $stmt->bindValue('productDescription', $this->getProductDescription());
                    $stmt->bindValue('productPrice', $this->getProductPrice());
                    $stmt->execute();
                } catch (Exception $e) {
                    die($e->getMessage());
                }         
            }

            // Eliminar Producto
            public function deleteProduct(){
                $product = new Product;
                $product->deleteProduct($_GET['idProduct']);
                header('Location:?c=Products'); // Redirección a Página de Productos                  
            }
    }
    