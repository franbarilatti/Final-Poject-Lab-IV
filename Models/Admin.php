<?php
    namespace Models;


    class Admin extends User{
        private $userId;
        private $adminId;
        private $firstName;
        private $lastName;

        public function __construct($userId,$adminId,$firstName,$lastName)
        {
        
            $this->adminId = $adminId;
            $this->userId = $userId;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
        }

        ////////// GETTERS METHODS //////////

        public function getAdminId()
        {
                return $this->adminId;
        }

        public function getUserId()
        {
                return $this->userId;
        }

        public function getFirstName()
        {
                return $this->firstName;
        }

        public function getLastName()
        {
                return $this->lastName;
        }
 

        ////////// SETTERS METHODS //////////

        public function setAdminId($adminId)
        {
                $this->adminId = $adminId;

                return $this;
        }

        public function setUserId($userId)
        {
                $this->userId = $userId;

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
 
    }
