<?php  

    namespace Controllers;

use DAO\BusinessDAO;
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


        public function Register($email,$role){
            $studentApi = new StudentAPI();
            $studentList = $studentApi->GetAll();
            $businesDAO = new BusinessDAO();
            $businesList = $businesDAO->GetAll();
            try{
                if($role == "student"){
                    if($this->userDAO->isInDataBase($email)){
                        $this->alert->setType("danger");
                        $this->alert->setMessage("No es posible registrar este email");
                    }elseif(!$this->CheckEmailWhitAPI($email)){
                        $this->alert->setType("danger");
                        $this->alert->setMessage("El correo no pertenece a un alumno de la UTN");
                    }elseif(!$this->studentController->SearchInAPIByEmail($email)->getActive())
                    {
                        $this->alert->setType("danger");
                        $this->alert->setMessage("El alumno no pertenece actualmente a la UTN");
                    }
                    else{
                        $this->alert->setType("success");
                        $this->alert->setMessage("Email registrado correctamente");
                    }
                }else{
                    if($this->userDAO->isInDataBase($email)){
                        $this->alert->setType("danger");
                        $this->alert->setMessage("No es posible registrar este email");
                    }else{
                        $this->alert->setType("success");
                        $this->alert->setMessage("Email registrado correctamente");
                    }
                }
                
            }catch(Exception $ex){
                $this->alert->settype("danger");
                $this->alert->setMessage($ex->getMessage());
            }finally{
                if($this->alert->getType()=="success" ){
                    $_SESSION["alert"] = $this->alert;
                    $_SESSION["email"] = $email;

                    if($role == "student"){
                        header("location:".FRONT_ROOT."Student/RegisterForm");
                    }else{
                        header("location:".FRONT_ROOT."Business/ShowAddView");
                    }
                    
                    
                }else{
                     $this->Index();
                }
            }
        }

        public function CheckEmailWhitAPI($email){
            $student = $this->studentController->SearchInAPIByEmail($email);
            if($student != null ){
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
