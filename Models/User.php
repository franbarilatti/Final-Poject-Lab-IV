<?php
    namespace Models;

    abstract class User{
        private $idUser;
        private $userName;
        private $password;

        
        ////////// GETTERS METHODS ////////// 
        
 
        public function getPassword()
        {
                return $this->password;
        }
 
        public function getUserName()
        {
                return $this->userName;
        }
 
        public function getIdUser()
        {
                return $this->idUser;
        }

   
        ////////// SETTERS METHODS //////////

        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        public function setUserName($userName)
        {
                $this->userName = $userName;

                return $this;
        }

        public function setIdUser($idUser)
        {
                $this->idUser = $idUser;

                return $this;
        }

    }



?>