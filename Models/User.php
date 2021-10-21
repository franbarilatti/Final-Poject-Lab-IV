<?php
    namespace Models;

    abstract class User{
        
        private $email;
        private $password;

        public function __construct($email, $password)
        {

            $this->email = $email;
            $this->password = $password;
        }

        ////////// GETTERS METHODS //////////


        abstract public function getPassword();



        abstract public function getEmail();
       

        ////////// SETTERS METHODS //////////
   

        abstract public function setPassword($password);

        abstract public function setEmail($email);


    }

?>