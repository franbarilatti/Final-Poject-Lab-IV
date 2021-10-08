<?php
    namespace Controllers;

    use DAO\AdminDAO;

    class AdminController
    {
        private $adminDAO;

        public function __construct()
        {
            $this->adminDAO = new AdminDAO();
        }

        public function ShowAdminMainView(){
            require_once(VIEWS_PATH."admin-main.php");
        }
        
        public function Index(){
            $title= "Admin";
            require_once (VIEWS_PATH."header.php");
            $this->ShowAdminMainView();

        }

    }

?>