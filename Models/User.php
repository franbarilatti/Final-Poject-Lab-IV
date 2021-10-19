<?php
    namespace Models;

    class User{
        private $userId;
        private $email;
        private $password;

        public function __construct($userId,$email, $password)
        {
            $this->userId = $userId;
            $this->email = $email;
            $this->password = $password;
        }

        ////////// GETTERS METHODS //////////
        public function getUserId()
        {
                return $this->userId;
        }

        public function getPassword()
        {
            return $this->password;
        }


        public function getEmail()
        {
            return $this->email;
        }

        ////////// SETTERS METHODS //////////
        public function setUserId($userId)
        {
                $this->userId = $userId;

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

    }

?>