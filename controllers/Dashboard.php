<?php
    class Dashboard{
        public function __construct(){}

        // Carga de vistas de página principal de Administrador
        public function main(){
            require_once "views/layouts/bootstrap.php";
            require_once "views/modules/dashboard.view.php"; 
        }
    }
?>