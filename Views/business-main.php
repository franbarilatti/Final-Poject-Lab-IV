<?php
    if($_SESSION['userLogged']->getRole() == "student"){
        require_once(VIEWS_PATH."nav-student.php");
    }elseif($_SESSION['userLogged']->getRole() == "admin"){
        require_once(VIEWS_PATH."nav-admin.php");
    }else{
        require_once(VIEWS_PATH."nav-business.php");
    }
?>
<main>
    <div>
        
    </div>
    <div>
        
    </div>




</main>
