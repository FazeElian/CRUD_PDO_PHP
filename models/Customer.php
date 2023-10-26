<?php
    class Customer{
        private $dbh;
        private $idCustomer;
        private $nameCustomer;
        private $descriptionCustomer;

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

        public function __construct3($idCustomer, $nameCustomer, $descriptionCustomer){
            $this->idCustomer = $idCustomer;
            $this->nameCustomer = $nameCustomer;
            $this->descriptionCustomer = $descriptionCustomer;
        }    

        // Métodos SET y GET
            // ID
            public function setIdCustomer($idCustomer){
                $this->idCustomer = $idCustomer;
            }

            public function getIdCustomer(){
                return $this->idCustomer;
            }

            // Nombre
            public function setNameCustomer($nameCustomer){
                $this->nameCustomer = $nameCustomer;               
            }

            public function getNameCustomer(){
                return $this->nameCustomer;
            }

            // Descripción
            public function setDescriptionCustomer($descriptionCustomer){
                $this->descriptionCustomer = $descriptionCustomer;
            }

            public function getDescriptionCustomer(){
                return $this->descriptionCustomer;
            }

        // Funcionalidades de Cliente
            // Crear Cliente
            public function createCustomer(){
                try {
                    $sql = 'INSERT INTO CUSTOMERS VALUES (:idCustomer, :nameCustomer, :descriptionCustomer)';
                    $stmt = $this->dbh->prepare($sql);                
                    $stmt->bindValue('idCustomer', $this->getIdCustomer());
                    $stmt->bindValue('nameCustomer', $this->getNameCustomer());
                    $stmt->bindValue('descriptionCustomer', $this->getDescriptionCustomer());
                    $stmt->execute();
                } catch (Exception $e) {
                    die($e->getMessage());
                }  
            }

            // Consultar clientes
            public function readCustomer(){
                try {
                    $customerList = [];
                    $sql = 'SELECT * FROM CUSTOMERS';
                    $stmt = $this->dbh->query($sql);
                    foreach ($stmt->fetchAll() as $customer) {                    
                        $customerObj = new Customer;
                        $customerObj->setIdcustomer($customer['idCustomer']);
                        $customerObj->setNamecustomer($customer['nameCustomer']);
                        $customerObj->setDescriptionCustomer($customer['descriptionCustomer']);
                        array_push($customerList, $customerObj);
                    }
                    return $customerList;
                } catch (Exception $e) {
                    die($e->getMessage());
                }                
            }

            // Obtener el Id de Cliente
            public function getCustomerById($idCustomer){
                try {
                    $sql = "SELECT * FROM CUSTOMERS WHERE idCustomer=:idCustomer";
                    $stmt = $this->dbh->prepare($sql);
                    $stmt->bindValue('idCustomer', $idCustomer);
                    $stmt->execute();
                    $customerDb = $stmt->fetch();
                    $customer = new Customer(
                        $customerDb['idCustomer'],
                        $customerDb['nameCustomer'],
                        $customerDb['descriptionCustomer']
                    );
                    return $customer;
                } catch (Exception $e) {
                    die($e->getMessage());
                }                
            }

            // Actualizar Cliente
            public function updateCustomer(){
                try {                
                    $sql = 'UPDATE CUSTOMERS SET
                                idCustomer = :idCustomer,
                                nameCustomer = :nameCustomer,
                                descriptionCustomer = :descriptionCustomer
                            WHERE idCustomer = :idCustomer';
                    $stmt = $this->dbh->prepare($sql);
                    $stmt->bindValue('idCustomer', $this->getIdCustomer());
                    $stmt->bindValue('nameCustomer', $this->getNameCustomer());
                    $stmt->bindValue('descriptionCustomer', $this->getDescriptionCustomer());
                    $stmt->execute();
                } catch (Exception $e) {
                    die($e->getMessage());
                }                
            }

            // Eliminar Cliente
            public function deleteCustomer($idCustomer){
                try {
                    $sql = 'DELETE FROM CUSTOMERS WHERE idCustomer = :idCustomer';
                    $stmt = $this->dbh->prepare($sql);
                    $stmt->bindValue('idCustomer', $idCustomer);
                    $stmt->execute();
                } catch (Exception $e) {
                    die($e->getMessage());
                }                    
            }
    }
?>