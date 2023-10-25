<?php
    class Landing{
        public function __construct(){}
        public function main(){
            require_once "views/company/header.view.php";
            require_once "views/company/index.view.php";
            require_once "views/company/footer.view.php";
        }
        public function about(){
            require_once "views/company/header.view.php";            
            require_once "views/company/about.view.php";
            require_once "views/company/footer.view.php";
        }
        public function shop(){
            require_once "views/company/header.view.php";            
            require_once "views/company/shop.view.php";
            require_once "views/company/footer.view.php";
        }
        public function shopSingle(){
            require_once "views/company/header.view.php";            
            require_once "views/company/shop-single.view.php";
            require_once "views/company/footer.view.php";
        }
        public function contact(){
            require_once "views/company/header.view.php";            
            require_once "views/company/contact.view.php";
            require_once "views/company/footer.view.php";
        }
        public function prueba(){
            require_once "views/company/header.view.php";            
            require_once "views/company/prueba.view.php";
            require_once "views/company/footer.view.php";
        }
    }    
?>