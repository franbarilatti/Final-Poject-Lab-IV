<?php
    require_once(VIEWS_PATH."nav-student.php");
?>
<div class="d-flex justify-content-center">
    <h1>Formulario de registro</h1>
</div>


<form action="<?php echo FRONT_ROOT ?>User/Add" class="was-validated">
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="firstName" class="form-label">firstName:</label>
            <input type="text" class="form-control mb- lg" placeholder="<?php echo $student->getFirstName() ?>" value="<?php echo $student->getFirstName() ?>" readonly name="firstName">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="col-3">
            <label for="LastName" class="form-label">LastName:</label>
            <input type="text" class="form-control mb-5 lg" placeholder="<?php echo $student->getLastName() ?>" value="<?php echo $student->getLastName() ?>" readonly name="LastName">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="dni" class="form-label">dni:</label>
            <input type="text" class="form-control mb-5 lg" placeholder="<?php echo $student->getDni() ?>" value="<?php echo $student->getDni() ?>" readonly name="dni">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="col-3">
            <label for="fileNumber" class="form-label">fileNumber:</label>
            <input type="text" class="form-control mb-5 lg" placeholder="<?php echo $student->getFileNumber() ?>" value="<?php echo $student->getFileNumber() ?>" readonly name="fileNumber">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="gender" class="form-label">gender:</label>
            <input type="text" class="form-control mb-5 lg" placeholder="<?php echo $student->getGender() ?>" value="<?php echo $student->getGender() ?>" readonly name="gender">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="col-3">
            <label for="birthDate" class="form-label">birthDate:</label>
            <input type="datatime" class="form-control mb-5 lg" placeholder="<?php echo $student->getBirthDate() ?>" value="<?php echo date("d/m/y", strtotime($student->getBirthDate())) ?>" readonly name="birthDate">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="email" class="form-label">email:</label>
            <input type="email" class="form-control mb-5 lg" placeholder="<?php echo $student->getEmail() ?>" value="<?php echo $student->getEmail() ?>" readonly name="email">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="col-3">
            <label for="phoneNumber" class="form-label">phoneNumber:</label>
            <input type="text" class="form-control mb-5 lg" placeholder="<?php echo $student->getPhoneNumber() ?>" value="<?php echo $student->getPhoneNumber() ?>" readonly name="phoneNumber">
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

    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="careerId" class="form-label">Carrera:</label>
            <input type="text" class="form-control mb-5 lg" placeholder="<?php echo $career->getDescription() ?>" value="<?php echo $career->getDescription() ?>" readonly name="careerId">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>

    <input type="hidden" value="DEFAULT" name="userId">
    <input type="hidden" value="student" name="role">
    <input type="hidden" value="<?php echo $student->getStudentId() ?>" name="studentId">

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

    <div class="alert alert-<?php echo $alert->getType() ?>"><?php echo $alert->getMessage() ?></div>


</form>