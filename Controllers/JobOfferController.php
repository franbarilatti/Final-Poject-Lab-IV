<?php 
    namespace Controllers;

    use Models\JobOffer as JobOffer;
    use Models\Business as Business;
    use Models\Student as Student;
    use DAO\JobOfferDAO as JobOfferDAO;
    use DAO\JobPositionDAO as JobPositionDAO;
<<<<<<< HEAD
    use DAO\JobPositionAPI as JobPositionAPI;
    use Models\Alert as Alert;
=======
use Exception;
use Models\Alert;
>>>>>>> origin/main

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

        public function AddView(){
            $jobPositionList = $this->jobPositionAPI->GetAll();
            require_once(VIEWS_PATH."nav-student.php");
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."joboffer-add.php");
        }


        ////////// FUNCTIONAL FUNCTION /////////
        public function Add($businessId,$careerId,$jobPositionId,$jobOfferId,$title,$description,$postingDate,$expiryDate){
            
            $jobOffer = new JobOffer($businessId,$careerId,$jobPositionId,$jobOfferId,$title,$description,$postingDate,$expiryDate);
            try{

                


<<<<<<< HEAD
            }catch(Exeption $ex){
=======
            }catch(Exception $ex){
>>>>>>> origin/main

            }
        }

        public function Modify(){

        }

    }


?>