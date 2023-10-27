<?php 
    require_once "models/User.php";

    class Users{        
        public function __construct(){}

        // Carga de vistas de página principal de productos
        public function main(){  
            require_once "views/layouts/bootstrap.php";
            require_once "views/modules/users/index.view.php";
        }

        // Registrarse
        public function registerUser(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/layouts/bootstrap.php";
                require_once "views/modules/users/register.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = new User;
                $user->setIdUser($_POST['idUser']);
                $user->setEmailUser($_POST['emailUser']);
                $user->setPasswordUser($_POST['passwordUser']);
                $user->registerUser();            
                header("Location:?c=Dashboard");
            }
        }

        // Iniciar Sesión
        public function login(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/layouts/bootstrap.php";
                require_once "views/modules/users/login.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = new User(
                    $_POST['idUser'],
                    $_POST['emailUser'],
                    $_POST['passwordUser']
                );
                $user->login();            
                header("Location:?c=Dashboard");
            }
        }
    }
?>