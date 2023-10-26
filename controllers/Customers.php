<?php
    class Customers{
        public function __construct(){}

        // Carga de vistas de página principal de Clientes
        public function main(){
            require_once "views/layouts/bootstrap.php";
            require_once "views/modules/customers/index.view.php"; 
        }
    }
?>