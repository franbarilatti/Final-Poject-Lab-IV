<?php
    namespace Models;


    class Admin{
        private $adminId;
        private $firstName;
        private $lastName;
        private $email;

        public function __construct()
        {
            
        }

        ////////// GETTERS METHODS //////////

        public function getAdminId()
        {
                return $this->adminId;
        }

        public function getFirstName()
        {
                return $this->firstName;
        }

        public function getLastName()
        {
                return $this->lastName;
        }

        public function getEmail()
        {
                return $this->email;
        }

        ////////// SETTERS METHODS //////////

        public function setAdminId($adminId)
        {
                $this->adminId = $adminId;

                return $this;
        }

        public function setFirstName($firstName)
        {
                $this->firstName = $firstName;

                return $this;
        }
        public function setLastName($lastName)
        {
                $this->lastName = $lastName;

                return $this;
        }

        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }
  
    }


?>