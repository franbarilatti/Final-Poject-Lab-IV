<?php
    namespace Controllers;

    use DAO\AdminDAO as AdminDAO;
    use DAO\CareerAPI;
    use DAO\JobPositionAPI;
    use DAO\StudentAPI;
    use DAO\UserDAO;
    use Exception;
use Models\Admin;
use Models\Alert;
    use Models\User;

class AdminController
    {
        private $adminDAO;
        private $userDAO;
        private $studentAPI;
        private $careerAPI;
        private $jobPositionAPI;
        private $alert;

        public function __construct()
        {
            $this->adminDAO = new AdminDAO();
            $this->userDAO = new UserDAO;
            $this->studentAPI = new StudentAPI; 
            $this->careerAPI = new CareerAPI;
            $this->jobPositionAPI = new JobPositionAPI;
            $this->alert = new Alert("","");
        }

        ////////////////// VIEWS METHODS //////////////////

        public function ShowAdminMainView(Alert $alert = null){
            $title= "Admin";
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."admin-main.php");
        }

        public function ShowRegisterAdmin(Alert $alert = null){
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."admin-register.php");
        }

        ////////////////// FUNCTIONAL METHODS //////////////////

        public function Add($adminId,$firstName,$lastName,$email,$password,$validation,$userId,$role){
            if($password == $validation){
                try{
                    if(!$this->adminDAO->isInDataBase($email)){
                        $user = new User($userId, $email, $password, $role);
                        $this->userDAO->Add($user);
                        $admin = new Admin($adminId,$firstName,$lastName,$this->userDAO->LastRegister());
                        $this->adminDAO->Add($admin);
                        $this->alert->setType("success");
                        $this->alert->setMessage("Su usuario creado correctamente");
                        $this->ShowAdminMainView($this->alert);

                    }else{
                        $this->alert->setType("danger");
                        $this->alert->setMessage("Este mail ya se encuentra registrado");
                        $this->ShowRegisterAdmin($this->alert);
                    }


                }catch(Exception $ex){
                    $this->alert->setType("danger");
                    $this->alert->setMessage($ex->getMessage());
                }

            }else{
                $this->alert->setType("danger");
                $this->alert->setMessage("Las contraseñas no coinciden");
                $this->ShowRegisterAdmin($this->alert);
            }
        }
        

        public function UpdateDataBaseStudent(){
            try{
                $this->studentAPI->UpdateDB();
                $this->alert->setType("success");
                $this->alert->setMessage("Base de datos actualizada!");
                $this->ShowAdminMainView($this->alert);
            }catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage($ex->getMessage());
            }       
        }

        public function UpdateDataBaseCareer(){
            try{
                $this->careerAPI->UpdateDB();
                $this->alert->setType("success");
                $this->alert->setMessage("Base de datos actualizada!");
                $this->ShowAdminMainView($this->alert);
            }catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage($ex->getMessage());
            }  
        }

        public function UpdateDataBaseJobPosition(){
            try{
                $this->jobPositionAPI->UpdateDB();
                $this->alert->setType("success");
                $this->alert->setMessage("Base de datos actualizada!");
                $this->ShowAdminMainView($this->alert);
            }catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage($ex->getMessage());
            }  
        }
        
        public function Index(){
            $this->ShowAdminMainView();
        }

    }

?>