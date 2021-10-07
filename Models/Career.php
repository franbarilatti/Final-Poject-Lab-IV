<?php
    namespace Models;

    class Career{
        private $careerId; 
        private $description;
        private $active;

        public function __construct($careerId,$description,$active)
        {
                $this->careerId = $careerId;
                $this->description = $description;
                $this->active = $active;
        }

        ////////// GETTERS METHODS //////////
        
                
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