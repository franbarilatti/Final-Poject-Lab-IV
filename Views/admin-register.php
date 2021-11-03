<?php
      require_once(VIEWS_PATH."nav-admin.php");
?>
<div class="d-flex justify-content-center">
    <h1>Formulario de registro</h1>
</div>


<form action="<?php echo FRONT_ROOT ?>Admin/Add" class="was-validated" method="get">
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="firstName" class="form-label">firstName:</label>
            <input type="hidden" name="adminId" value="DEFAULT">
            <input type="text" class="form-control mb- lg" name="firstName" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="col-3">
            <label for="LastName" class="form-label">LastName:</label>
            <input type="text" class="form-control mb- lg" name="lastName" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="careerId" class="form-label">Email:</label>
            <input type="email" class="form-control mb-5 lg" name="email">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="password" class="form-label">password:</label>
            <input type="password" class="form-control mb-5 lg" placeholder="Enter password" name="password" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="col-3">
            <label for="validation" class="form-label">validation:</label>
            <input type="password" class="form-control mb-5 lg" placeholder="Enter password" name="validation" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>

    

    <input type="hidden" value="DEFAULT" name="userId">
    <input type="hidden" value="admin" name="role">

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

    <div class="alert alert-<?php echo $alert->getType() ?>"><?php echo $alert->getMessage() ?></div>


</form>