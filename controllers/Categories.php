<?php 
    require_once "models/Category.php";

    class Categories{        
        public function __construct(){}
        public function main(){
            // Mostrar Lista de Categorías
            $categories = new Category;
            $categories = $categories->readCategory();     

            require_once "views/layouts/header.view.php";
            require_once "views/modules/products_categories/products-categories.view.php";
        }

        // Crear categoría
        public function createCategory(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/layouts/header.view.php";
                require_once "views/modules/products_categories/create.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $category = new Category;
                $category->setNameCategory($_POST['nameCategory']);
                $category->createCategory();            
                echo "<script>alert('Categoría Creada');</script>";    
                header("Location:?c=Categories");
            }
        }

        // Actualizar Categoría
        public function updateCategory(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $category = new Category;
                $category = $category->getIdCategory($_GET['idCategory']);
                require_once "views/layouts/header.view.php";
                require_once "views/modules/products_categories/edit.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $category = new Category;
                $category->setIdCategory($_POST['idCategory']);
                $category->setNameCategory($_POST['nameCategory']);
                $category->updateCategory();
                header('Location:?c=Categories');
            }  
        }

        // Eliminar Categoría
        public function deleteCategory(){
            $category = new Category;
            $category->deleteCategory($_GET['idCategory']);
            header('Location:?c=Categories');
        }
    }
?>