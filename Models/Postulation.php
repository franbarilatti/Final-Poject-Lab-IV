<?php
    namespace Models;

    class Postulation{

        private $postulationId;
        private $studentId;
        private $businessId;
        private $jobPositionId;
        private $active;

        public function __construct($postulationId, $studentId, $businessId, $jobPositionId, $active)
        {
                $this->postulationId =$postulationId;
                $this->studentId =$studentId;
                $this->businessId =$businessId;
                $this->jobPositionId =$jobPositionId;
                $this->active =$active;
        }


        ////////// GETTERS METHODS //////////

        
        public function getPostulationId()
        {
                return $this->postulationId;
        }

        
        public function getStudentId()
        {
                return $this->studentId;
        }

        
        public function getBusinessId()
        {
                return $this->businessId;
        }

         
        public function getJobPositionId()
        {
                return $this->jobPositionId;
        }

        public function getActive()
        {
                return $this->active;
        }

        ////////// GETTERS METHODS //////////
        
        public function setPostulationId($postulationId)
        {
                $this->postulationId = $postulationId;

                return $this;
        }

        
        
        public function setStudentId($studentId)
        {
                $this->student = $studentId;

                return $this;
        }

        
        
        public function setBusinessId($businessId)
        {
                $this->business = $businessId;

                return $this;
        }

        

        public function setJobPositionId($jobPositionId)
        {
                $this->jobPosition = $jobPositionId;

                return $this;
        }

       
        public function setActive($active)
        {
                $this->active = $active;

                return $this;
        }
    } 

?>