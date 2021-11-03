<?php
    namespace Controllers;

    use DAO\AdminDAO as AdminDAO;
    use DAO\CareerAPI;
    use DAO\JobPositionAPI;
    use DAO\StudentAPI;
    use Exception;
    use Models\Alert;

class AdminController
    {
        private $adminDAO;
        private $studentAPI;
        private $careerAPI;
        private $jobPositionAPI;
        private $alert;

        public function __construct()
        {
            $this->adminDAO = new AdminDAO();
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

        ////////////////// FUNCTIONAL METHODS //////////////////

        public function Add()

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