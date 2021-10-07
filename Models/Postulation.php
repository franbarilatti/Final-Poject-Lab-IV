<?php
    namespace Models;

    class Postulation{

        private $postulationId;
        private $student;
        private $business;
        private $jobPosition;
        private $active;

        public function __construct($postulationId,
                                    $student,
                                    $business,
                                    $jobPosition,
                                    $active)
        {
                $this->postulationId =$postulationId;
                $this->student =$student;
                $this->business =$business;
                $this->jobPosition =$jobPosition;
                $this->active =$active;
        }


        ////////// GETTERS METHODS //////////

        
        public function getPostulationId()
        {
                return $this->postulationId;
        }

        
        public function getStudent()
        {
                return $this->student;
        }

        
        public function getBusiness()
        {
                return $this->business;
        }

         
        public function getJobPosition()
        {
                return $this->jobPosition;
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

        
        
        public function setStudent($student)
        {
                $this->student = $student;

                return $this;
        }

        
        
        public function setBusiness($business)
        {
                $this->business = $business;

                return $this;
        }

        

        public function setJobPosition($jobPosition)
        {
                $this->jobPosition = $jobPosition;

                return $this;
        }

       
        public function setActive($active)
        {
                $this->active = $active;

                return $this;
        }
    } 

?>