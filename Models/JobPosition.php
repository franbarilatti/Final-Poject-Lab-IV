<?php
    namespace Models;

    class JobPosition{
        private $title;
        private $description;
        private $active;

        public function __construct()
        {
            
        }

        ////////// GETTERS METHODS //////////
        
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