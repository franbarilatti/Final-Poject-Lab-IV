<?php
    namespace Models;

    class JobOffer{

        private $businessId;
        private $jobOfferId;
        private $title;
        private $description;
        private $postingDate;
        private $expiryDate;
         
        public function __construct($businessId,$jobOfferId,$title,$description,$postingDate,$expiryDate)
        {
            $this->businessId = $businessId;
            $this->jobOfferId = $jobOfferId;
            $this->title = $title;
            $this->description = $description;
            $this->postingDate = $postingDate;
            $this->expiryDate = $expiryDate;
        }


        ////////// GETTERS METHODS //////////

        public function getBusinessId()
        {
                return $this->businessId;
        }
 
        public function getJobOfferId()
        {
                return $this->jobOfferId;
        }
 
        public function getTitle()
        {
                return $this->title;
        }

        public function getDescription()
        {
                return $this->description;
        }

        public function getPostingDate()
        {
                return $this->postingDate;
        }
 
        public function getExpiryDate()
        {
                return $this->expiryDate;
        }


        ////////// SETTERS METHODS //////////

        
        public function setBusinessId($businessId)
        {
                $this->businessId = $businessId;

                return $this;
        }

        
        public function setJobOfferId($jobOfferId)
        {
                $this->jobOfferId = $jobOfferId;

                return $this;
        }

        
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        
        public function setPostingDate($postingDate)
        {
                $this->postingDate = $postingDate;

                return $this;
        }

        
        public function setExpiryDate($expiryDate)
        {
                $this->expiryDate = $expiryDate;

                return $this;
        }
    }


?>