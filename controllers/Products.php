<?php 
    require_once "models/Product.php";

    class Products{        
        public function __construct(){}

        // Carga de vistas de página principal de productos
        public function main(){  
            require_once "views/layouts/bootstrap.php";
            require_once "views/index.view.php";
        }

        // Crear Producto
        public function createProduct(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/layouts/bootstrap.php";
                require_once "views/create.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $product = new Product;
                $product->setIdProduct($_POST['idProduct']);
                $product->setNameProduct($_POST['nameProduct']);
                $product->setPriceProduct($_POST['priceProduct']);
                $product->createProduct();            
                header("Location:?c=Products&a=readProduct");
            }
        }

        // Consultar Productos
        public function readProduct(){
            $products = new Product;
            $products = $products->readProduct();            
            require_once "views/layouts/bootstrap.php";
            require_once "views/read.view.php";
        }

        // Actualizar producto
        public function updateProduct(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $product = new Product;
                $product = $product->getProductById($_GET['idProduct']);
                require_once "views/layouts/bootstrap.php";
                require_once "views/edit.view.php";              
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $product = new Product(
                    $_POST['idProduct'],
                    $_POST['nameProduct'],
                    $_POST['priceProduct']
                );                
                $product->updateProduct();
                header("Location: ?c=Products&a=readProduct");
            }
        }

        // Eliminar Producto
        public function deleteProduct(){
            $product = new Product;
            $product->deleteProduct($_GET['idProduct']);
            header('Location:?c=Products&a=readProduct');
        }
    }
?>