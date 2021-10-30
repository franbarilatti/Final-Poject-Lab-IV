<form action="<?php echo FRONT_ROOT?>Student/Add" method="get">
    <div class="container">
        <div class="row">
            <div class="col">
            <div class="mb-3 mt-3">
                <input type="hidden" value="<?php echo $user->getUserId()?>" name="userId">
                <input type="hidden" value="DEFAULT" name="studentId">
                <label for="firstName" class="form-label">Nombre:</label>
                <input type="text" class="form-control" value="<?php echo $student->getFirstName()?>" placeholder="<?php echo $student->getFirstName()?>" name="firstName" readonly>
            </div>
            </div>
            <div class="col">
            <div class="mb-3 mt-3">
                <label for="lastName" class="form-label">Apellido:</label>
                <input type="text" class="form-control" value="<?php echo $student->getLastName()?>" placeholder="<?php echo $student->getLastName()?>" name="lastName" readonly>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
            <div class="mb-3 mt-3">
                <label for="dni" class="form-label">DNI:</label>
                <input type="number" class="form-control" value="<?php echo $student->getDni()?>" placeholder="<?php echo $student->getDni()?>" name="dni" readonly>
            </div>
            </div>
            <div class="col">
            <div class="mb-3 mt-3">
                <label for="fileNumber" class="form-label">Matricula:</label>
                <input type="number" class="form-control" value="<?php echo $student->getFileNumber()?>" placeholder="<?php echo $student->getFileNumber()?>" name="fileNumber" readonly>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
            <div class="mb-3 mt-3">
                <label for="gender" class="form-label">Genero:</label>
                <input type="text" class="form-control" value="<?php echo $student->getGender()?>" placeholder="<?php echo $student->getGender()?>" name="gender" readonly>
            </div>
            </div>
            <div class="col">
            <div class="mb-3 mt-3">
                <label for="birthDate" class="form-label">Fecha de Nacimiento:</label>
                <input type="datetime" class="form-control" value="<?php echo $student->getBirthDate()?>" placeholder="<?php echo $student->getBirthDate()?>" name="birthDate" readonly>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
            <div class="mb-3 mt-3">
                <label for="gender" class="form-label">Email:</label>
                <input type="email" class="form-control" value="<?php echo $student->getEmail()?>" placeholder="<?php echo $student->getEmail()?>" name="email" readonly>
            </div>
            </div>
            <div class="col">
            <div class="mb-3 mt-3">
                <label for="birthDate" class="form-label">Ingrese Una Constraseña:</label>
                <input type="text" class="form-control" placeholder="Contraseña" name="password">
            </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>