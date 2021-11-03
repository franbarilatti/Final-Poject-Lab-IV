<?php
    namespace Models;

    class Postulation{

        private $postulationId;
        private $studentId;
        private $businessId;
        private $jobOfferId;
        private $active;

        public function __construct( $studentId, $businessId, $jobOfferId, $active)
        {
                $this->studentId =$studentId;
                $this->businessId =$businessId;
                $this->jobOfferId =$jobOfferId;
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

         
        public function getJobOfferId()
        {
                return $this->jobOfferId;
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

        

        public function setJobOfferId($jobOfferId)
        {
                $this->jobOfferId = $jobOfferId;

                return $this;
        }

       
        public function setActive($active)
        {
                $this->active = $active;

                return $this;
        }
    } 

?>