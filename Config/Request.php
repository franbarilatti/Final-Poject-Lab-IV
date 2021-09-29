<?php
    namespace Config;

    class Request{
        private $controller;
        private $method;
        private $parameters = array();

        public function __construct(){
            $url = filter_input(INPUT_POST,'url',FILTER_SANITIZE_URL);
            $url_array = explode("/",$url);
            $url_array = array_filter($url_array);

            if(empty($url_array)) $this->controller = 'Home';
            else $this->controller = array_shift($url_array);
            
            if(empty($url_array)) $this->method = 'Index';
            else $this->method = array_shift($url_array);

            $method_request = $this->getMethodRequest();

            if($method_request == 'GET'){
                unset($_GET["url"]);
                if(!empty($_GET)){
                    foreach($_GET as $key => $value){
                        array_push($this->parameters,$value);
                    }
                }
                else{
                    $this->parameters = $url_array;
                }
            }
            elseif($_POST){
                $this->parameters = $_POST;
            }

            if($_FILES){
                unset($this->parameters["button"]);

                foreach($_FILES as $file){
                    array_push($this->parameters,$file);
                }
            }

        }

        private static function getMethodRequest(){
            return $_SERVER['REQUEST_METHOD'];
        }


        /**
         * Get the value of controller
         */ 
        public function getController()
        {
                return $this->controller;
        }

        /**
         * Get the value of method
         */ 
        public function getMethod()
        {
                return $this->method;
        }

        /**
         * Get the value of parameters
         */ 
        public function getParameters()
        {
                return $this->parameters;
        }
    }

?>