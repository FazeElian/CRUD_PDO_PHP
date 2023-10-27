<?php
    class User{
        private $dbh;
        private $idUser;
        private $emailUser;
        private $passwordUser;

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
        public function __construct3($idUser, $emailUser, $passwordUser){
            $this->idUser = $idUser;
            $this->emailUser = $emailUser;
            $this->passwordUser = $passwordUser;
        }
        
        // Métodos SET y GET
            // Id de Usuario
            public function setIdUser($idUser){
                $this->idUser = $idUser;
            }

            public function getIdUser(){
                return $this->idUser;
            }

            // Correo Electrónico
            public function setEmailUser($emailUser){
                $this->emailUser = $emailUser;
            }

            public function getEmailUser(){
                return $this->emailUser;
            }

            // Contraseña
            public function setPasswordUser($passwordUser){
                $this->passwordUser = $passwordUser;
            }

            public function getPasswordUser(){
                return $this->passwordUser;
            }

        // Funcionalidades de Usuario
            // Registrarse
            public function registerUser(){
                try {
                    $sql = 'INSERT INTO USERS VALUES (:idUser, :emailUser, :passwordUser)';
                    $stmt = $this->dbh->prepare($sql);                
                    $stmt->bindValue('idUser', $this->getIdUser());
                    $stmt->bindValue('emailUser', $this->getEmailUser());
                    $stmt->bindValue('passwordUser', $this->getPasswordUser());
                    $stmt->execute();
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            // Iniciar Sesión
            public function login(){
                try {
                    $sql = "SELECT * FROM USERS WHERE emailUser = :emailUser and
                        passwordUser = :passwordUser;";
                    $stmt = $this->dbh->prepare($sql);
                    $stmt->bindValue('emailUser', $emailUser);
                    $stmt->bindValue('passwordUser', $passwordUser);
                    $stmt->execute();
                    $userDb = $stmt->fetch();
                    if($userDb){
                        $user = new User(
                            $userDb['idUser'],
                            $userDb['emailUser'],
                            $userDb['passwordUser']
                    );

                    $wrongUser = "SELECT * FROM USERS WHERE emailUser != :emailUser and passwordUser != :passwordUser;";
                    if($sql = $wrongUser){
                        echo "Contraseña Incorrecta";
                    }
                    
                    return $user;
                    } else{
                        return false;
                    }
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
    }
?>