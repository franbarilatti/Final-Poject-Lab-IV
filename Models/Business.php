<?php
    namespace Models;



    class Business extends User{
        private $businessId;
        private $businessName;
        private $employesQuantity;
        private $businessInfo;

        public function __construct($businessId,$businessName,$employesQuantity,$businessInfo,$email,$password)
        {
                parent::__construct($email,$password);
                $this->businessId =$businessId;
                $this->businessName = $businessName;
                $this->employesQuantity = $employesQuantity;
                $this->businessInfo = $businessInfo;
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

        public function getBusinessInfo()
        {
                return $this->businessInfo;
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

 
        public function setBusinessInfo($businessInfo)
        {
                $this->businessInfo = $businessInfo;

                return $this;
        }


 
        
    }
?>