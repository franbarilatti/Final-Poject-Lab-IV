<?php
      if(!isset($_SESSION['userLogged'])){
            header("location:". FRONT_ROOT."Home");
       }
      require_once(VIEWS_PATH."nav-student");

?>