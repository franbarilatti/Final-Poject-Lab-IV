<?php
    if(!isset($_SESSION['userLogged'])){
        header("location:". FRONT_ROOT."Home");
    }
    if($_SESSION['userLogged']->getRole() == "student"){
        require_once(VIEWS_PATH."nav-student.php");
    }elseif($_SESSION['userLogged']->getRole() == "admin"){
        require_once(VIEWS_PATH."nav-admin.php");
    }else{
        require_once(VIEWS_PATH."nav-business.php");
    }
?>
<main>
<form class="was-validated">
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="firstName" class="form-label">Razon Social:</label>
            <input type="text" class="form-control mb- lg" placeholder="<?php echo $business->getBusinessName() ?>" value="<?php echo $business->getBusinessName() ?>" readonly>

        </div>
        <div class="col-3">
            <label for="LastName" class="form-label">Cantidad de empleados:</label>
            <input type="text" class="form-control mb-5 lg" placeholder="<?php echo $business->getEmployesQuantity() ?>" value="<?php echo $business->getEmployesQuantity() ?>" readonly>

        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="dni" class="form-label">Dirección:</label>
            <input type="text" class="form-control mb-5 lg" placeholder="<?php echo $business->getAdress() ?>" value="<?php echo $business->getAdress() ?>" readonly>

        </div>
        <div class="col-3">
            <label for="fileNumber" class="form-label">Informacion de la empresa:</label>
            <input type="text" class="form-control mb-5 lg" placeholder="<?php echo $business->getBusinessInfo() ?>" value="<?php echo $business->getBusinessInfo() ?>" readonly>

        </div>
    </div>


</main>
