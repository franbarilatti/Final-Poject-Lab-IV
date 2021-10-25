<?php
    namespace Models;

use tidy;

class JobPosition{
        private $jobPositionId;
        private $careerId;
        private $description;
        private $active;

        public function __construct($jobPositionId,$careerId,$description, $active) {
                $this->jobPositionId = $jobPositionId;
                $this->careerId = $careerId;
                $this->description = $description;
                $this->active = $active;
        }

        ////////// GETTERS METHODS //////////
        public function getJobPositionId()
        {
                return $this->jobPositionId;
        }

        public function getCareerId()
        {
                return $this->careerId;
        }

        
        public function getDescription()
        {
                return $this->description;
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

        public function setCareerId($careerId)
        {
                $this->careerId = $careerId;

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