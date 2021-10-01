<?php
    namespace Models;

    use Models\User as User;

    class Admin extends User{
        private $adminId;

        public function __construct()
        {
            
        }

        ////////// GETTERS METHODS //////////

        public function getAdminId()
        {
                return $this->adminId;
        }

        ////////// SETTERS METHODS //////////

        
    }


?>