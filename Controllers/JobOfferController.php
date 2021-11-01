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


        ////////// FUNCTIONAL FUNCTION /////////
        public function Add($businessId,$careerId,$jobPositionId,$title,$description,$postingDate,$expiryDate){
            
            try{
                $jobOffer = new JobOffer($businessId,$careerId,$jobPositionId,$title,$description,$postingDate,$expiryDate);
                    $this->jobOfferDAO->Add($jobOffer);
                    $this->alert->setType("success");
                    $this->alert->setMessage("Oferta cargada con exito");

            }catch(Exception $ex){

            }finally{
                $this->AddView($businessId,$this->alert);
            }
        }

        public function Modify(){

        }

    }


?>