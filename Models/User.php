<?php
    namespace Models;

    class User{
        private $email;
        private $password;

        public function __construct($email, $password)
        {
            $this->email = $email;
            $this->password = $password;
        }

        ////////// GETTERS METHODS //////////

        public function getPassword()
        {
            return $this->password;
        }


        public function getEmail()
        {
            return $this->email;
        }

        ////////// SETTERS METHODS //////////

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