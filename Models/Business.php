<?php
    namespace Models;



    class Business{
        private $userId;
        private $businessId;
        private $businessName;
        private $employesQuantity;
        private $adress;
        private $businessInfo;
        private $active;
        
        

        public function __construct($userId,$businessId,$businessName,$employesQuantity,$businessInfo,$adress,$active)
        {
                $this->userId = $userId;
                $this->businessId =$businessId;
                $this->businessName = $businessName;
                $this->employesQuantity = $employesQuantity;
                $this->businessInfo = $businessInfo;
                $this->adress = $adress;
                $this->active = $active;
        }         
    
        ////////// GETTERS METHODS //////////
        
        public function getBusinessId()
        {
                return $this->businessId;
        }

        public function getUserId()
        {
                return $this->userId;
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

        public function getAdress()
        {
                return $this->adress;
        }

        public function getActive()
        {
                return $this->active;
        }

        ////////// SETTERS METHODS //////////

        public function setBusinessId($businessId)
        {
                $this->businessId = $businessId;

                return $this;
        }

        public function setUserId($userId)
        {
                $this->userId = $userId;

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

        public function setAdress($adress)
        {
                $this->adress = $adress;

                return $this;
        }
        
        public function setActive($active)
        {
                $this->active = $active;

                return $this;
        }
 
        
    }
?>