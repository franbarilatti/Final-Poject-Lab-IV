<?php
    namespace Controllers;

    use DAO\AdminDAO as AdminDAO;

    class AdminController
    {
        private $adminDAO;

        public function __construct()
        {
            $this->adminDAO = new AdminDAO;
        }

        ////////////////// VIEWS METHODS //////////////////

        public function ShowAdminMainView(){
            $title= "Admin";
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."admin-main.php");
        }

        ////////////////// FUNCTIONAL METHODS //////////////////
        
        public function Index(){
            $this->ShowAdminMainView();
        }

    }

?>