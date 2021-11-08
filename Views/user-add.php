<?php

    namespace Views;

    use Models\Alert as Alert;

    if ($alert == null) {
        $alert = new Alert(" ", " ");
    }


    require_once(VIEWS_PATH . "nav-main.php");

 ?>

    <body>
        <div class="container" id="registration-form">
            <div class="image"></div>
            <div class="frm">
                <h1>Registro</h1>
                <form action="<?php echo FRONT_ROOT ?>Register/Register" method="post">
                    <div class="row">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Ingrese un email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="student">Estudiante</label>
                                <input type="radio" name="role" id="student" value="student">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="student">Empresa</label>
                                <input type="radio" name="role" id="student" value="business">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-warning btn-lg mt-5">Registrarse</button>
                    </div>
                </form>
                <div class="alert alert-<?php echo $alert->getType() ?>"><?php echo $alert->getMessage() ?></div>
            </div>
        </div>
    </body>