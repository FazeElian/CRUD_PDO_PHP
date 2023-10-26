<?php
    require_once "models/Customer.php";

    class Customers{
        public function __construct(){}

        // Carga de vistas de página principal de Clientes
        public function main(){
            require_once "views/layouts/bootstrap.php";
            require_once "views/modules/customers/index.view.php"; 
        }

        // Crear Cliente
        public function createCustomer(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/layouts/bootstrap.php";
                require_once "views/modules/customers/create.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $customer = new Customer;
                $customer->setIdCustomer($_POST['idCustomer']);
                $customer->setNameCustomer($_POST['nameCustomer']);
                $customer->setDescriptionCustomer($_POST['descriptionCustomer']);
                $customer->createCustomer();            
                header("Location:?c=Customers&a=readCustomer");
            }
        }

        // Consultar Clientes
        public function readCustomer(){
            $customers = new Customer;
            $customers = $customers->readCustomer();            
            require_once "views/layouts/bootstrap.php";
            require_once "views/modules/customers/read.view.php";
        }

        // Actualizar Cliente
        public function updateCustomer(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $customer = new Customer;
                $customer = $customer->getCustomerById($_GET['idCustomer']);
                require_once "views/layouts/bootstrap.php";
                require_once "views/modules/customers/edit.view.php";              
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $customer = new Customer(
                    $_POST['idCustomer'],
                    $_POST['nameCustomer'],
                    $_POST['descriptionCustomer']
                );                
                $customer->updateCustomer();
                header("Location: ?c=Customers&a=readCustomer");
            }
        }

        // Eliminar Cliente
        public function deleteCustomer(){
            $customer = new Customer;
            $customer->deleteCustomer($_GET['idCustomer']);
            header('Location:?c=Customers&a=readCustomer');      
        }
    }
?>