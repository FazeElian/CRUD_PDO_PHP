<?php
    class User{
        // 1ra Parte: Modelo de acuerdo a la POO
        private $dbh;
        private $rolCode = null;        
        private $rolName;
        private $userCode;
        private $userId;
        private $userName;
        private $userLastName;
        private $userEmail;
        private $userPhone;
        private $userPass;        
        private $userStatus;        
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
        public function __construct2($userEmail,$userPass){
            $this->userEmail = $userEmail;
            $this->userPass = $userPass;
        }        
        public function __construct9($rolCode,$userCode,$userId,$userName,$userLastName,$userEmail,$userPhone,$userPass,$userStatus){
            $this->rolCode = $rolCode;
            $this->userCode = $userCode;
            $this->userId = $userId;
            $this->userName = $userName;
            $this->userLastName = $userLastName;
            $this->userEmail = $userEmail;
            $this->userPhone = $userPhone;
            $this->userPass = $userPass;
            $this->userStatus = $userStatus;
        }
        # Código Rol
        public function setRolCode($rolCode){
            $this->rolCode = $rolCode;
        }
        public function getRolCode(){
            return $this->rolCode;
        }
        # Nombre Rol
        public function setRolName($rolName){
            $this->rolName = $rolName;
        }
        public function getRolName(){
            return $this->rolName;
        }
        # Código Usuario
        public function setUserCode($userCode){
            $this->userCode = $userCode;
        }
        public function getUserCode(){
            return $this->userCode;
        }
        # Identificación Usuario
        public function setUserId($userId){
            $this->userId = $userId;
        }
        public function getUserId(){
            return $this->userId;
        }
        # Nombre Usuario
        public function setUserName($userName){
            $this->userName = $userName;
        }
        public function getUserName(){
            return $this->userName;
        }
        # Apellido Usuario
        public function setUserLastName($userLastName){
            $this->userLastName = $userLastName;
        }
        public function getUserLastName(){
            return $this->userLastName;
        }
        # Email Usuario
        public function setUserEmail($userEmail){
            $this->userEmail = $userEmail;
        }
        public function getUserEmail(){
            return $this->userEmail;
        }
        # Teléfono Usuario
        public function setUserPhone($userPhone){
            $this->userPhone = $userPhone;
        }
        public function getUserPhone(){
            return $this->userPhone;
        }
        # PassWord Usuario
        public function setUserPass($userPass){
            $this->userPass = $userPass;
        }
        public function getUserPass(){
            return $this->userPass;
        }
        # Estado Usuario
        public function setUserStatus($userStatus){
            $this->userStatus = $userStatus;
        }
        public function getUserStatus(){
            return $this->userStatus;
        }

        // 2da Parte: Modelo Negocio (Acceso a Datos -> DB)
        
        # CU01 - Iniciar Sesión
        public function login(){
            try {
                $sql = 'SELECT * FROM USERS                    
                        WHERE user_email = :userEmail AND user_pass = :userPass';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userEmail', $this->getUserEmail());
                $stmt->bindValue('userPass', sha1($this->getUserPass()));
                $stmt->execute();
                $userDb = $stmt->fetch();
                if ($userDb) {
                    $user = new User(                    
                        $userDb['rol_code'],
                        $userDb['user_code'],
                        $userDb['user_id'],
                        $userDb['user_name'],
                        $userDb['user_lastname'],
                        $userDb['user_email'],
                        $userDb['user_phone'],
                        $userDb['user_pass'],
                        $userDb['user_status']
                    );
                    return $user;
                } else {
                    return false;
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU02 - Crear Rol        
        public function createRol(){
            try {
                $sql = 'INSERT INTO ROLES VALUES (:rolCode,:rolName)';
                $stmt = $this->dbh->prepare($sql);                
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('rolName', $this->getRolName());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU03 - Consultar Roles
        public function readRol(){
            try {
                $rolList = [];
                $sql = 'SELECT * FROM ROLES';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $rol) {                    
                    $rolObj = new User;
                    $rolObj->setRolCode($rol['rol_code']);
                    $rolObj->setRolName($rol['rol_name']);
                    array_push($rolList, $rolObj);
                }
                return $rolList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU04 - Obtener el código del Rol
        public function getRolByCode($rolCode){
            try {
                $sql = "SELECT * FROM ROLES WHERE rol_code=:rolCode";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $rolCode);
                $stmt->execute();
                $rolDb = $stmt->fetch();
                $rol = new User;
                $rol->setRolCode($rolDb['rol_code']);
                $rol->setRolName($rolDb['rol_name']);
                return $rol;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU05 - Actualizar Rol
        public function updateRol(){
            try {                
                $sql = 'UPDATE ROLES SET
                            rol_code = :rolCode,
                            rol_name = :rolName
                        WHERE rol_code = :rolCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('rolName', $this->getRolName());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU06 - Eliminar Rol
        public function deleteRol($rolCode){
            try {
                $sql = 'DELETE FROM ROLES WHERE rol_code = :rolCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $rolCode);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }            
        }
        # CU07 - Crear Usuario
        public function createUser(){
            try {
                $sql = 'INSERT INTO USERS VALUES (
                        :rolCode,
                        :userCode,
                        :userId,
                        :userName,
                        :userLastName,
                        :userEmail,
                        :userPhone,
                        sha1(:userPass),
                        :userStatus
                        )';
                $stmt = $this->dbh->prepare($sql);                
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('userCode', $this->getUserCode());
                $stmt->bindValue('userId', $this->getUserId());
                $stmt->bindValue('userName', $this->getUserName());
                $stmt->bindValue('userLastName', $this->getUserLastName());
                $stmt->bindValue('userEmail', $this->getUserEmail());
                $stmt->bindValue('userPhone', $this->getUserPhone());
                $stmt->bindValue('userPass', $this->getUserPass());
                $stmt->bindValue('userStatus', $this->getUserStatus());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU08 - Consultar Usuarios
        public function readUser(){
            try {
                $userList = [];
                $sql = 'SELECT * FROM USERS';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $user) {
                    $userList[] = new User(
                        $user['rol_code'],
                        $user['user_code'],                        
                        $user['user_id'],                        
                        $user['user_name'],                        
                        $user['user_lastname'],                        
                        $user['user_email'],                        
                        $user['user_phone'],                        
                        $user['user_pass'],                        
                        $user['user_status']                       
                    );
                }
                return $userList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU09 - Obtener el código del Rol
        public function getUserByCode($userCode){
            try {
                $sql = "SELECT * FROM USERS WHERE user_code=:userCode";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $userCode);
                $stmt->execute();
                $userDb = $stmt->fetch();
                $user = new User(                    
                    $userDb['rol_code'],
                    $userDb['user_code'],                        
                    $userDb['user_id'],                        
                    $userDb['user_name'],                        
                    $userDb['user_lastname'],                        
                    $userDb['user_email'],                        
                    $userDb['user_phone'],                        
                    $userDb['user_pass'],                        
                    $userDb['user_status']                       
                );
                return $user;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU10 - Actualizar usuario
        public function updateUser(){
            try {                
                $sql = 'UPDATE USERS SET
                            rol_code = :rolCode,
                            user_code = :userCode,                            
                            user_id = :userId,                            
                            user_name = :userName,                            
                            user_lastname = :userLastName,                            
                            user_email = :userEmail,                            
                            user_phone = :userPhone,                            
                            user_pass = :userPass,                            
                            user_status = :userStatus                            
                        WHERE user_code = :userCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('userCode', $this->getUserCode());
                $stmt->bindValue('userId', $this->getUserId());
                $stmt->bindValue('userName', $this->getUserName());
                $stmt->bindValue('userLastName', $this->getUserLastName());
                $stmt->bindValue('userEmail', $this->getUserEmail());
                $stmt->bindValue('userPhone', $this->getUserPhone());
                $stmt->bindValue('userPass', $this->getUserPass());
                $stmt->bindValue('userStatus', $this->getUserStatus());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU11 - Eliminar usuario
        public function deleteUser($userCode){
            try {
                $sql = 'DELETE FROM USERS WHERE user_code = :userCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $userCode);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }            
        }
        # CU12 - Cerrar Sesión
    }
?>