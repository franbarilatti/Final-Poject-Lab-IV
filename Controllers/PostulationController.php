<?php    
    namespace Controllers;
    use DAO\PostulationDAO as PostulationDAO;
    use Models\Postulation as Postulation;
    use DAO\StudentDAO as StudentDAO;
    use Exception;
    use Models\JobOffer as JobOffer;
    use DAO\JobOfferDAO as JobOfferDAO;
use DAO\StudentAPI;
use Models\Alert as Alert;
    class PostulationController
    {
        private $postulationDAO;
        private $studentDAO;
        private $alert;

        public function __construct()
        {
            $this->postulationDAO = new PostulationDAO();
            $this->studentDAO = new StudentAPI;
            $this->alert = new Alert("","");
        }

        ////////////////// VIEWS METHODS //////////////////

    
        public function ShowListView()
        {
            $postulationList = $this->postulationDAO->GetAll();
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."student-list.php");
        }

        public function ShowPostulatiobByStudent($userId,Alert $alert=null){
            $title = "Mis postulaciones";
            
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."nav-student.php");
            $postulationList = $this->postulationDAO->FilterByUserId($userId);
            require_once(VIEWS_PATH."student-postulation.php");
        }
        
        public function PostulatedList($jobOfferId,Alert $alert=null){
            
            $postulationList = $this->postulationDAO->FilterByJobOffer($jobOfferId);
            $studentList = $this->studentDAO->GetAll();
            require_once(VIEWS_PATH."nav-admin.php");
            require_once(VIEWS_PATH."postulated-student-list.php");
        }

        ////////////////// FUNCTIONAL METHODS //////////////////

        public function Add($businessId, $jobPositionId)
        {
            $studentId = $_SESSION["studentId"];
            $userId= $_SESSION['userLogged']->getUserId();
            echo $userId;
            try{
                $postulation = new Postulation("DeFAULT",$userId,$studentId,$businessId,$jobPositionId,true);
                if(!$this->CheckPostulations($studentId)){
                   
                    $this->postulationDAO->Add($postulation);
                    $this->alert->setType("success");
                    $this->alert->setMessage("Se ha postulado con exito");
                    $this->postulationDAO->GreetingsMail();
                }
            }catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage("No se ha podido postular");
                echo $ex;
                
            }finally{
                $_SESSION["alertType"] = $this->alert->getType();
                $_SESSION["alertMessage"] = $this->alert->getMessage();
                header("location:".FRONT_ROOT."Student");
            }
    
        }

        public function CheckPostulations($studentId){
        
            $postulationList = $this->postulationDAO->GetAll();        
            $i=0;
            while($i<count($postulationList) && $postulationList[$i]->getStudentId() != $studentId){
                $i++;
            }
            if($i<count($postulationList)){
                return true;
            }else{
                return false;
            }
        }

        public function Delete($id,$userId){
            try{
                $this->postulationDAO->Delete($id);
                $this->alert->setType("success");
                $this->alert->setMessage("Se ha dado de baja su postulacion.");

                $this->ShowPostulatiobByStudent($userId,$this->alert);
            }catch(Exception $ex){
                throw $ex;
            }
        }

        public function DeleteAdmin($id,$jobOfferId){
            try{
                $this->postulationDAO->Delete($id);
                $this->postulationDAO->Deregister();
                $this->alert->setType("success");
                $this->alert->setMessage("Postulacion dada de baja sactifactoriamente.");

                $this->PostulatedList($jobOfferId,$this->alert);
            }catch(Exception $ex){
                throw $ex;
            }
        }

        public function Index(){
            $title = "Lista de Postulaciones";
            $this->ShowListView();
        }
    }
?>