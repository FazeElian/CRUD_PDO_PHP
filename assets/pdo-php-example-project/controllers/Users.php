<?php
    require_once "models/User.php";
    class Users{
        public function __construct(){}
        public function main(){
            header("Location:?c=Dashboard");
        }
        # Función del Controlador para Crear Rol
        public function createRol(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/roles/admin/header.view.php";
                require_once "views/modules/1_users/create_rol.view.php";
                require_once "views/roles/admin/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rol = new User;
                $rol->setRolName($_POST['rolName']);
                $rol->createRol();                
                header("Location:?c=Users&a=readRol");
            }
        }
        # Función del Controlador para Consultar Roles
        public function readRol(){
            $roles = new User;
            $roles = $roles->readRol();            
            require_once "views/roles/admin/header.view.php";            
            require_once "views/modules/1_users/read_rol.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
        # Función del Controlador para Actualizar Rol
        public function updateRol(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $rol = new User;
                $rol = $rol->getRolByCode($_GET['rolCode']);
                require_once "views/roles/admin/header.view.php";
                require_once "views/modules/1_users/update_rol.view.php";
                require_once "views/roles/admin/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rol = new User;
                $rol->setRolCode($_POST['rolCode']);
                $rol->setRolName($_POST['rolName']);
                $rol->updateRol();
                header('Location:?c=Users&a=readRol');
            }
        }
        # Función del Controlador para Eliminar Rol
        public function deleteRol(){            
            $rol = new User;
            $rol->deleteRol($_GET['rolCode']);
            header('Location:?c=Users&a=readRol');
        }
        # Función del Controlador para Crear Usuario
        public function createUser(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/roles/admin/header.view.php";
                require_once "views/modules/1_users/create_user.view.php";
                require_once "views/roles/admin/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($_POST['userPass'] == $_POST['userConfirmPass']) {
                    $user = new User(
                        $_POST['rolCode'],
                        $_POST['userCode'],
                        $_POST['userId'],
                        $_POST['userName'],
                        $_POST['userLastName'],
                        $_POST['userEmail'],
                        $_POST['userPhone'],
                        $_POST['userPass'],
                        $_POST['userStatus']
                    );                    
                    $user->createUser();                    
                    header("Location:?c=Users&a=readUser");
                } else {
                    require_once "views/roles/admin/header.view.php";
                    require_once "views/modules/1_users/create_user.view.php";
                    echo "La Contraseña y la Confirmación NO son iguales";
                    require_once "views/roles/admin/footer.view.php";
                }
                
            }
        }
        # Función del Controlador para Consultar Usuarios
        public function readUser(){
            $users = new User;
            $users = $users->readUser();
            require_once "views/roles/admin/header.view.php";            
            require_once "views/modules/1_users/read_user.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
        # Función del Controlador para Actualizar Usuario
        public function updateUser(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $user = new User;
                $user = $user->getUserByCode($_GET['userCode']);
                require_once "views/roles/admin/header.view.php";                
                require_once "views/modules/1_users/update_user.view.php";
                require_once "views/roles/admin/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = new User(
                    $_POST['rolCode'],
                    $_POST['userCode'],
                    $_POST['userId'],
                    $_POST['userName'],
                    $_POST['userLastName'],
                    $_POST['userEmail'],
                    $_POST['userPhone'],
                    $_POST['userPass'],
                    $_POST['userStatus']
                );
                $user->updateUser();
                header('Location:?c=Users&a=readUser');
            }
        }
        # Función del Controlador para Eliminar User
        public function deleteUser(){
            $user = new User;
            $user->deleteUser($_GET['userCode']);
            header('Location:?c=Users&a=readUser');
        }

    }

?>