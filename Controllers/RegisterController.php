<?php  

    namespace Controllers;

use DAO\StudentAPI;
use DAO\UserDAO;
use Exception;
use Models\Alert;


class RegisterController{

        private $userDAO;
        private $userController;
        private $studentController;
        private $alert;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
            $this->userController = new UserController();
            $this->studentController = new StudentController();
            $this->alert = new Alert("","");
        }


        public function Register($email, $password, $role){
            $studentApi = new StudentAPI();
            $studentList = $studentApi->GetAll();
            try{
                $validUser = $this->userDAO->SearchByEmail($email);
                if($validUser !=null){
                    $this->alert->setType("danger");
                    $this->alert->setMessage("Email ya registrado");
                }elseif(!$this->CheckEmailWhitAPI($email)){
                    $this->alert->setType("danger");
                    $this->alert->setMessage("El correo no pertenece a un alumno de la UTN");
                }else{
                    $this->userController->Add($email, $password, $role);
                    $this->alert->setType("success");
                    $this->alert->setMessage("Email registrado correctamente");
                }

            }catch(Exception $ex){
                $this->alert->settype("danger");
                $this->alert->setMessage($ex->getMessage());
                $this->userController->ShowUserAddView($this->alert) ;
            }finally{
                $this->userController->ShowUserAddView($this->alert) ;
            }
        }

        public function CheckEmailWhitAPI($email){
            if($this->studentController->SearchInAPIByEmail($email)){
                return true;
            }else{
                return false;
            }
        }

        public function Index(){
            $title = "Nuevo Usuario";
            $alert = $this->alert;
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."user-add.php");
        }
    }



?>
