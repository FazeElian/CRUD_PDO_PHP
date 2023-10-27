<?php
    require_once "models/User.php";

    class Login{        
        public function __construct(){
            if (!empty($_SESSION['profile'])) {
                header("Location:?c=Dashboard");
            }
        }        
        public function main(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {                
                require_once "views/layouts/bootstrap.php";            
                require_once "views/modules/users/login.view.php";            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = new User(
                    $_POST['emailUser'],
                    $_POST['passwordUser']
                );
                $user->login();            
                header("Location:?c=Dashboard");
            }
        }
    }
?>