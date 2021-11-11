<?php    
    namespace Controllers;
    use DAO\PostulationDAO as PostulationDAO;
    use Models\Postulation as Postulation;
    use Exception;
    use Models\JobOffer as JobOffer;
    use DAO\JobOfferDAO as JobOfferDAO;
    use Models\Alert as Alert;
    class PostulationController
    {
        private $postulationDAO;
        private $alert;

        public function __construct()
        {
            $this->postulationDAO = new PostulationDAO();
            $this->alert = new Alert("","");
        }

        ////////////////// VIEWS METHODS //////////////////

    
        public function ShowListView()
        {
            $postulationList = $this->postulationDAO->GetAll();
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."student-list.php");
        }

        public function ShowPostulatiobByStudent($studentId){
            $title = "Mis postulaciones";
            $postulationList = $this->postulationDAO->FilterByStudent($studentId);
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."student-postulation.php");
        }
        
        public function PostulatedList($jobOfferId){
            $postulationList = $this->postulationDAO->FilterByJobOffer($jobOfferId);
            require_once(VIEWS_PATH."postulated-student-list.php");
        }

        ////////////////// FUNCTIONAL METHODS //////////////////

        public function Add($businessId, $jobPositionId)
        {
            $studentId = $_SESSION["studentId"];
            try{
                $postulation = new Postulation($studentId,$businessId,$jobPositionId,true);
                if(! $this->CheckPostulations($studentId)){
                    $this->postulationDAO->Add($postulation);
                    $this->alert->setType("success");
                    $this->alert->setMessage("Se ha postulado con exito");
                    
                }else{
                    
                }
            }catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage("No se ha podido postular");
                
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
                echo $postulationList[$i]->getStudentId() . "<br>";
                $i++;
            }
            if($i<count($postulationList)){
                return true;
            }else{
                return false;
            }
        }

        public function Index(){
            $title = "Lista de Postulaciones";
            $this->ShowListView();
        }
    }
?>