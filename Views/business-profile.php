<?php
    if($_SESSION['userLogged']->getRole() == "student"){
        require_once(VIEWS_PATH."nav-student.php");
    }else{
        require_once(VIEWS_PATH."nav-admin.php");
    }
?>
<main>
    <div>
        <h1><?php echo $business->getBusinessName();?></h1>
    </div>
    <div>
        <h3>Cantidad de empleados: <?php echo $business->getEmployesQuantity();?></h3>
        <p><?php echo $business->getBusinessInfo();?></p>
    </div>




</main>
