<?php 
    namespace Controllers;

    use Models\JobOffer as JobOffer;
    use Models\Business as Business;
    use Models\Student as Student;
    use DAO\JobOfferDAO as JobOfferDAO;
    use DAO\JobPositionDAO as JobPositionDAO;
    use DAO\JobPositionAPI as JobPositionAPI;
use Exception;
use Models\Alert as Alert;

class JobOfferController{

        private $alert;
        private $jobOfferDAO;
        private $jobPositionAPI;

        public function __construct()
        {
            $this->alert = new Alert("","");
            $this->jobOfferDAO = new JobOfferDAO();
            $this->jobPositionAPI = new jobPositionAPI();
        }

        ////////// VIEWS FUNCTION ///////// 

        public function AddView($businessId,Alert $alert=null){
            $jobPositionList = $this->jobPositionAPI->GetAll();

            require_once(VIEWS_PATH."nav-admin.php");
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."joboffer-add.php");
        }
        public function ShowListView(Alert $alert=null){
            $jobOfferList = $this->jobOfferDAO->GetAll();
            if($_SESSION['userLogged']->getRole() == "admin"){
            require_once(VIEWS_PATH."nav-admin.php");
            }else{
                require_once(VIEWS_PATH."nav-student.php");
            }
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."joboffer-list.php");
        }




        ////////// FUNCTIONAL FUNCTION /////////
        public function Add($jobOfferId,$title,$description,$postingDate,$expiryDate,$businessId,$careerId,$jobPositionId){
            
            try{
                $jobOffer = new JobOffer($jobOfferId,$title,$description,$postingDate,$expiryDate,$businessId,$careerId,$jobPositionId);
                $this->jobOfferDAO->Add($jobOffer);
                $this->alert->setType("success");
                $this->alert->setMessage("Oferta cargada con exito");

            }catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage("Error al cagar la oferta");
            }finally{
                $this->AddView($businessId,$this->alert);
            }
        }
        public function Delete($jobOfferId){
            try{
                $this->jobOfferDAO->Delete($jobOfferId);
                $this->alert->setType("success");
                $this->alert->setMessage("Oferta eliminada con exito");
            }catch(Exception $ex ){
                $this->alert->setType("danger");
                $this->alert->setMessage("Error al eliminar la oferta");
            }finally{
                $this->ShowListView($this->alert);
            }
        }

        public function PrintPdf(){
            $this->jobOfferDAO->PrintPdf("pdf_generate.pdf");
        }

        public function ModifyView($jobOfferId, Alert $alert=null){
            $jobOffer = $this->jobOfferDAO->SearchById($jobOfferId);
            $jobPosition= $this->jobPositionAPI->SearchById($jobOffer[0]->getJobPositionId());
            require_once(VIEWS_PATH."nav-admin.php");
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."jobOffer-modify.php");
        }
        public function Modify($jobOfferId,$title,$description,$expiryDate){
            try{
                $this->jobOfferDAO->Modify($jobOfferId,$title,$description,$expiryDate);
                $this->alert->setType("success");
                $this->alert->setMessage("Oferta modificada con exito");
            }catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage("No se pudo modificar la oferta");
            }finally{
                $this->ModifyView($jobOfferId,$this->alert);
            }

        }

    }


?>