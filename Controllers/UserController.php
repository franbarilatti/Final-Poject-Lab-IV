<?php 
    namespace Controllers;

    use DAO\UserDAO  as UserDAO;
    use Models\User as User;
    use Models\Alert as Alert;
    use Exception;

    class UserController{

        private $userDAO;

        public function __construct(){
            $this->userDAO = new UserDAO();
        }

        public function ShowUserAddView($role, Alert $alert= null){
            //echo var_dump($alert);
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."user-add.php");
        }


        public function Add($email, $password, $role){
                
                try{
                    $alert = new Alert("","");
                    $user = new User;
                    $user->setEmail($email);
                    $user->setPassword($password);
                    $user->setRole($role);
                    $this->userDAO->Add($user);
                }catch(Exception $ex){
                   
                    $alert->setType("danger");
                    $alert->setMessage("Error al cargar el usuario");
                }finally{
                    $this->ShowUserAddView($role,$alert);
                }
                
        }

        public function Index(){
            require_once(VIEWS_PATH."header.php");
        }


    }
?>