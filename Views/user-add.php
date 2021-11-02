<?php

namespace Views;

use Models\Alert as Alert;

if ($alert == null) {
    $alert = new Alert(" ", " ");
}
?>

<body>
    <div class="container" id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h1>Registro</h1>
            <p>Para ameo a donde vas? Ante tengo que sabe si estas habilitado pa entra'. Pone tu mail pa sabe si so' estudiante o no kpo</p>
            <form action="<?php echo FRONT_ROOT ?>Student/RegisterForm" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingrese un email">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-lg mt-5">Registrarse</button>
                </div>
            </form>
            <div class="alert alert-<?php echo $alert->getType() ?>"><?php echo $alert->getMessage() ?></div>
        </div>
    </div>
</body>