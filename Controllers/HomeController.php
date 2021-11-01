<?php
    namespace Controllers;

    class HomeController
    {
        public function Index()
        {
            $title="My job Login";
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."ingress.php");
        }        
    }
?>