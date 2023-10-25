<?php
    class Category{
        // Encapsulamiento de variables de entradas de formulario 
        private $dbh; // Variable asignada para la conexión de la base de datos
        private $idCategory;
        private $nameCategory;

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

        public function __construct2($idCategory, $nameCategory){
            $this->idCategory = $idCategory;
            $this->nameCategory = $nameCategory;
        }

        // Métodos Set y Get de cada dato de categoría
            // Id Categoría - Set
            public function setIdCategory($idCategory){
                $this->idCategory = $idCategory;
            }

            // Id Categoría - Get
            public function getIdCategory(){
                return $this->idCategory;
            }

            // Nombre de categoría - Set
            public function setNameCategory($nameCategory){
                $this->nameCategory = $nameCategory;
            }
            
            // Nombre de categoría - Get
            public function getNameCategory(){
                return $this->nameCategory;
            }

        // Funcionalidades de CRUD para Categorías
            // Crear Categoría
            public function createCategory(){
                try {
                    // Insersión SQL
                    $sql = 'INSERT INTO PRODUCTS_CATEGORIES VALUES (:idCategory,:nameCategory)';
                    $stmt = $this->dbh->prepare($sql);  

                    // Obtención de datos de categoría por método Get de función
                    $stmt->bindValue('idCategory', $this->getIdCategory());
                    $stmt->bindValue('nameCategory', $this->getNameCategory());
                    $stmt->execute();
                } catch (Exception $e) {
                    die($e->getMessage());
                }        
            }

            // Consultar Categorías
            public function readCategory(){
                try {
                    $categoryList = []; // Creamos una variable como arreglo donde incluya la lista de todas las categorías
                    $sql = 'SELECT * FROM PRODUCTS_CATEGORIES'; // Consulta SQL
                    $stmt = $this->dbh->query($sql); // Consulta con método query incluyendo la variable con el código SQL de la consulta
                    foreach ($stmt->fetchAll() as $category) {                    
                        $categoryObj = new Category; 

                        // Consulta de cada columna por su nombre en la base de datos
                        $categoryObj->setIdCategory($category['idCategory']);
                        $categoryObj->setNameCategory($category['nameCategory']);
                        array_push($categoryList, $categoryObj);
                    }
                    return $categoryList;
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            // Obtener el código de Categoría
            public function getCategoryById($idCategory){ // Parámetro de Id de categoría dentro de la función
                try {
                    // Consulta SQL donde el idCategoría de formulario sea igual al de la columna en la tabla de la bbdd
                    $sql = "SELECT * FROM PRODUCTS_CATEGORIES WHERE idCategory=:idCategory";

                    $stmt = $this->dbh->prepare($sql);
                    $stmt->bindValue('idCategory', $idCategory);
                    $stmt->execute();
                    $categoryDb = $stmt->fetch();
                    $category = new Category;
                    
                    // Consulta de cada columna por su nombre en la base de datos
                    $category->setIdCategory($categoryDb['idCategory']);
                    $category->setNameCategory($categoryDb['nameCategory']);;
                    return $product;
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            // Actualizar Categoría
            public function updateCategory(){
                try {          
                    // Actualización de todos los datos - SQL      
                    $sql = 'UPDATE PRODUCTS_CATEGORIES SET
                                idCategory = :idCategory,
                                nameCategory = :nameCategory,
                            WHERE idCategory = :idCategory';
                    $stmt = $this->dbh->prepare($sql);
                    $stmt->bindValue('idCategory', $this->getIdCategory());
                    $stmt->bindValue('nameCategory', $this->getNameCategory());
                    $stmt->execute();
                } catch (Exception $e) {
                    die($e->getMessage());
                }  
            }

            // Eliminar Categoría
            public function deleteCategory(){
                $category = new Category;
                $category->deleteCategory($_GET['idCategory']);
                header('Location:?c=Categories'); // Redirección a Página de Categorías              
            }
    }
