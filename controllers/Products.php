<?php 
    require_once "models/Product.php";

    class Products{        
        public function __construct(){}
        public function main(){
            // Mostrar Lista de Categorías
            // $products = new Product;
            // $products = $products->readProduct();     

            require_once "views/layouts/header.view.php";
            require_once "views/modules/products/products.view.php";
        }

        // Crear Producto
        public function createProduct(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/layouts/header.view.php";
                require_once "views/modules/products/create.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $product = new Product;
                $product->setProductName($_POST['nameProduct']);
                $product->setIdCategory($_POST['idCategory']);
                $product->setProductDescription($_POST['descriptionProduct']);
                $product->setProductPrice($_POST['priceProduct']);
                $product->createProduct();            
                header("Location:?c=Products");
            }
        }
    }
?>