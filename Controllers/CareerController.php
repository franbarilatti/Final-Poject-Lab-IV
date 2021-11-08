<?php 
    namespace Controllers;
    use DAO\CareerDAO as CareerDAO;
use Exception;
use Models\Alert;
use Models\Career as Career;

    class CareerController{

        private $careerDAO;
        private $alert;

        public function __construct(){

            $this->careerDAO = new CareerDAO();
            $this->alert = new Alert("","");
        }

        public function ShowAddView(){
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."career-add.php");
        }

        public function ShowListView($role)
        {
            try{
                $title = "Carreras";
                $studentList = $this->studentDAO->GetAll();
                require_once (VIEWS_PATH."header.php");
                require_once(VIEWS_PATH."career-list.php");
            }
            catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage($ex->getMessage());
            }

        }

        public function Add($careerId,$description,$active){
            try{
                $career = new Career($careerId,$description,$active);
                $this->careerDAO->Add($career);

                $this->alert->setType("success");
                $this->alert->setMessage("Carrera agregada con exito");
            }
            catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage($ex->getMessage());
            }
            finally{
                require_once(VIEWS_PATH."career-add.php");
            }

        }
        














    }

?>