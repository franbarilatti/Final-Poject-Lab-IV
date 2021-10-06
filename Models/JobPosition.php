<?php
    namespace Models;

use tidy;

class JobPosition{
        private $jobPositionId;
        private $title;
        private $description;
        private $active;

        public function __construct()
        {
            $this->jobPositionId = rand(1000000,9999999);
            $this->active = true;
        }

        ////////// GETTERS METHODS //////////
        public function getJobPositionId()
        {
                return $this->jobPositionId;
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