<?php
    namespace Models;

    class Alert{
        private $message;
        private $type;

        public function __construct($type, $message){
                $this->type= $type;
                $this->message= $message;
        }

        ////////// GETTERS METHODS //////////

        public function getMessage()
        {
                return $this->message;
        }

 
        public function getType()
        {
                return $this->type;
        }

        ////////// GETTERS METHODS //////////
 
        public function setMessage($message)
        {
                $this->message = $message;

                return $this;
        }

        public function setType($type)
        {
                $this->type = $type;

                return $this;
        }
    }

?>