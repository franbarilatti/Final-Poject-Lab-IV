<?php    
    namespace Controllers;
    use DAO\PostulationDAO as PostulationDAO;
    use Models\Postulation as Postulation;
    use DAO\StudentDAO as StudentDAO;
    use Exception;
    use Controllers\JobOfferController as JobOfferController;
    use DAO\JobOfferDAO as JobOfferDAO;
use DAO\StudentAPI;
use Models\Alert as Alert;
    class PostulationController
    {
        private $postulationDAO;
        private $studentDAO;
        private $alert;
        private $jobOfferController;

        public function __construct()
        {
            $this->postulationDAO = new PostulationDAO();
            $this->studentDAO = new StudentAPI;
            $this->alert = new Alert("","");
            $this->jobOfferController = new JobOfferController();
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

        public function Add($businessId, $jobOfferId)
        {
            $studentId = $_SESSION["studentId"];
            $userId= $_SESSION['userLogged']->getUserId();

            try{
                $postulation = new Postulation("DEFAULT",$userId,$studentId,$businessId,$jobOfferId,true);
                if(!$this->CheckPostulations($jobOfferId)){
                    $this->postulationDAO->Add($postulation);
                    $this->alert->setType("success");
                    $this->alert->setMessage("Se ha postulado con exito");
                    $this->postulationDAO->GreetingsMail();
                }
            
            }catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage("No se ha podido postular");
            }finally{
               
                $this->ShowPostulatiobByStudent($userId,$this->alert);

            }
    
        }

        public function CheckPostulations($jobOfferId){
        
            $postulationList = $this->postulationDAO->GetAll();        
            $i=0;
            while($i<count($postulationList) && $postulationList[$i]->getJobOfferId() != $jobOfferId){
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