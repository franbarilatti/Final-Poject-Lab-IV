<?php
    namespace Models;

    class User{
        
        private $userId;
        private $email;
        private $password;
        private $role;

        public function __construct($userId,$email,$password,$role)
        {
                $this->userId = $userId;
                $this->email = $email;
                $this->password = $password;
                $this->role = $role;
        }

        ////////// GETTERS METHODS //////////
 
        public function getUserId()
        {
                return $this->userId;
        }

        public function getEmail()
        {
                return $this->email;
        }
 
        public function getPassword()
        {
                return $this->password;
        }

        public function getRole()
        {
                return $this->role;
        }

  
       

        ////////// SETTERS METHODS //////////

        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }

 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        public function setUserId($userId)
        {
                $this->userId = $userId;

                return $this;
        }
   
    }

?>