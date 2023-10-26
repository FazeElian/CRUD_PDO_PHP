<?php
    class Product{
        private $dbh;
        private $idProduct;
        private $nameProduct;
        private $priceProduct;

        public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            } 
        }

        public function __construct3($idProduct, $nameProduct, $priceProduct){
            $this->idProduct = $idProduct;
            $this->nameProduct = $nameProduct;
            $this->priceProduct = $priceProduct;
        }    

        // Métodos SET y GET
            // ID
            public function setIdProduct($idProduct){
                $this->idProduct = $idProduct;
            }

            public function getIdProduct(){
                return $this->idProduct;
            }

            // Name
            public function setNameProduct($nameProduct){
                $this->nameProduct = $nameProduct;
            }

            public function getNameProduct(){
                return $this->nameProduct;
            } 
            
            // Price
            public function setPriceProduct($priceProduct){
                $this->priceProduct = $priceProduct;
            }

            public function getPriceProduct(){
                return $this->priceProduct;
            }

        // Funcionalidades de Producto
            // Crear Producto
            public function createProduct(){
                try {
                    $sql = 'INSERT INTO PRODUCTS VALUES (:idProduct, :nameProduct, :priceProduct)';
                    $stmt = $this->dbh->prepare($sql);                
                    $stmt->bindValue('idProduct', $this->getIdProduct());
                    $stmt->bindValue('nameProduct', $this->getNameProduct());
                    $stmt->bindValue('priceProduct', $this->getPriceProduct());
                    $stmt->execute();
                } catch (Exception $e) {
                    die($e->getMessage());
                }                
            }
    
            // Consultar Productos
            public function readProduct(){
                try {
                    $productList = [];
                    $sql = 'SELECT * FROM PRODUCTS';
                    $stmt = $this->dbh->query($sql);
                    foreach ($stmt->fetchAll() as $product) {                    
                        $productObj = new Product;
                        $productObj->setIdproduct($product['idProduct']);
                        $productObj->setNameproduct($product['nameProduct']);
                        $productObj->setPriceProduct($product['priceProduct']);
                        array_push($productList, $productObj);
                    }
                    return $productList;
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            // Obtener el Id de Producto
            public function getProductById($idProduct){
                try {
                    $sql = "SELECT * FROM PRODUCTS WHERE idProduct=:idProduct";
                    $stmt = $this->dbh->prepare($sql);
                    $stmt->bindValue('idProduct', $idProduct);
                    $stmt->execute();
                    $productDb = $stmt->fetch();
                    $product = new Product(
                        $productDb['idProduct'],
                        $productDb['nameProduct'],
                        $productDb['priceProduct']
                    );
                    return $product;
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            // Actualizar producto
            public function updateProduct(){
                try {                
                    $sql = 'UPDATE PRODUCTS SET
                                idProduct = :idProduct,
                                nameProduct = :nameProduct,
                                priceProduct = :priceProduct
                            WHERE idProduct = :idProduct';
                    $stmt = $this->dbh->prepare($sql);
                    $stmt->bindValue('idProduct', $this->getIdProduct());
                    $stmt->bindValue('nameProduct', $this->getNameProduct());
                    $stmt->bindValue('priceProduct', $this->getPriceProduct());
                    $stmt->execute();
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            // Eliminar Producto
            public function deleteProduct($idProduct){
                try {
                    $sql = 'DELETE FROM PRODUCTS WHERE idProduct = :idProduct';
                    $stmt = $this->dbh->prepare($sql);
                    $stmt->bindValue('idProduct', $idProduct);
                    $stmt->execute();
                } catch (Exception $e) {
                    die($e->getMessage());
                }            
            }
    }
?>