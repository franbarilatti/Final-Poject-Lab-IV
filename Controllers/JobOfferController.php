<?php 
    namespace Controllers;

    use Models\JobOffer as JobOffer;
    use Models\Business as Business;
    use Models\Student as Student;

    use DAO\JobOfferDAO as JobOfferDAO;
    use DAO\JobPositionDAO as JobPositionDAO;
use Exception;
use Models\Alert;

class JobOfferController{

        private $alert;
        private $jobOfferDAO;

        public function __construct()
        {
            $this->alert = new Alert("","");
            $this->jobOfferDAO = new JobOfferDAO();
        }

        ////////// VIEWS FUNCTION ///////// 

        public function AddView(){

        }


        ////////// FUNCTIONAL FUNCTION /////////
        public function Add($businessId,$careerId,$jobPositionId,$jobOfferId,$title,$description,$postingDate,$expiryDate){
            
            $jobOffer = new JobOffer($businessId,$careerId,$jobPositionId,$jobOfferId,$title,$description,$postingDate,$expiryDate);

            try{

                


            }catch(Exception $ex){

            }


        }

        public function Modify(){

        }

    }


?>