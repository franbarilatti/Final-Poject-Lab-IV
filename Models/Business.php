<?php
    namespace Models;



    class Business{
        private $businessId;
        private $businessName;
        private $employesQuantity;
        private $postulationList;
        private $businessInfo;
        private $jobPositionList;

        public function __construct(){
                $this->postulationList = null;
                $this->jobPositionList = null;
        }         
    
        ////////// GETTERS METHODS //////////
        
        public function getBusinessId()
        {
                return $this->businessId;
        }

        public function getBusinessName()
        {
                return $this->businessName;
        }


        public function getEmployesQuantity()
        {
                return $this->employesQuantity;
        }


        public function getPostulationList()
        {
                return $this->postulationList;
        }


        public function getBusinessInfo()
        {
                return $this->businessInfo;
        }


        public function getJobPositionList()
        {
                return $this->jobPositionList;
        }

        ////////// SETTERS METHODS //////////

        public function setBusinessId($businessId)
        {
                $this->businessId = $businessId;

                return $this;
        }
 
        public function setBusinessName($businessName)
        {
                $this->businessName = $businessName;

                return $this;
        }


        public function setEmployesQuantity($employesQuantity)
        {
                $this->employesQuantity = $employesQuantity;

                return $this;
        }


        public function setPostulationList($postulationList)
        {
                $this->postulationList = $postulationList;

                return $this;
        }

 
        public function setBusinessInfo($businessInfo)
        {
                $this->businessInfo = $businessInfo;

                return $this;
        }

 
        public function setJobPositionList($jobPositionList)
        {
                $this->jobPositionList = $jobPositionList;

                return $this;
        }
 
        
    }
?>