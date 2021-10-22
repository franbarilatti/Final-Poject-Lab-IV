<?php 
    namespace Controllers;

    use DAO\UserDAO  as UserDAO;
    use Models\User as User;
    use Models\Alert as Alert;
    use Exception;

    class UserController{

        private $userDAO;
        private $alert;

        public function __construct(){
            $this->userDAO = new UserDAO();
            $this->alert = new Alert();
        }

        public function UserAdd($role){
            require_once(VIEWS_PATH."user-add.php");
        }

        public function Index(){
            require_once(VIEWS_PATH."header.php");
        }


    }
?>