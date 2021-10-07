<?php
    namespace Models;

use tidy;

class JobPosition{
        private $jobPositionId;
        private $businessId;
        private $title;
        private $description;
        private $active;

        public function __construct($jobPositionId,
                                    $businessId,
                                    $title,
                                    $description,
                                    $active)
        {
                $this->jobPositionId = $jobPositionId;
                $this->businessId = $businessId;
                $this->title = $title;
                $this->description = $description;
                $this->active = $active;
        }

        ////////// GETTERS METHODS //////////
        public function getJobPositionId()
        {
                return $this->jobPositionId;
        }

        public function getBusinessId()
        {
                return $this->businessId;
        }
        
        public function getDescription()
        {
                return $this->description;
        }

        
        public function getTitle()
        {
                return $this->title;
        }

         
        public function getActive()
        {
                return $this->active;
        }

        ////////// SETTERS METHODS //////////

        public function setJobPositionId($jobPositionId)
        {
                $this->jobPositionId = $jobPositionId;

                return $this;
        }

        public function setBusinessId($businessId)
        {
                $this->businessId = $businessId;

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

        
        public function setActive($active)
        {
                $this->active = $active;

                return $this;
        } 
        
    }
?>