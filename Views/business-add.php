<?php

use Models\Alert as Alert;

if ($alert == null) {
     $alert = new Alert(" ", " ");
}
echo $alert->getMessage();
require_once(VIEWS_PATH . "nav-admin.php");
?>

<head>
     <title>Nueva Empresa</title>
</head>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar Empresa</h2>
               <div class="row">
                    <form action="<?php echo FRONT_ROOT ?>Business/Add" method="post" class="bg-light-alpha p-5">
                         <div class="col">
                              <div class="col-lg-4">
                              </div>
                              <div class="col-lg-4">
                                   <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="hidden" name="userId" value="DEFAULT">
                                        <input type="email" name="email" class="form-control" size="50" value="<?php echo $_SESSION["email"] ?>" disabled>
                                   </div>
                              </div>
                              <div class="col-lg-4">
                                   <div class="row">
                                        <div class="col">
                                             <div class="form-group">
                                                  <label for="">Contraseña</label>
                                                  <input type="password" name="password" class="form-control" size="16" Required>

                                             </div>
                                        </div>

                                        <div class="col">
                                             <div class="form-group">
                                                  <label for="">Repetir Contraseña</label>
                                                  <input type="password" name="validation" class="form-control" size="16" Required>
                                                  <input type="hidden" name="role" value="company">
                                             </div>
                                        </div>

                                   </div>

                              </div>
                              <div class="col-lg-4">
                                   <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input type="hidden" name="businessId" value="DEFAULT">
                                        <input type="text" name="businessName" value="" class="form-control" size="50" Required>
                                   </div>
                              </div>
                              <div class="col-lg-4">
                                   <div class="form-group">
                                        <label for="">Cantidad de empleados</label>
                                        <input type="number" name="employesQuantity" min=1 value="" class="form-control" Required>
                                   </div>
                              </div>
                              <div class="col-lg-4">
                                   <div class="form-group">
                                        <label for="">Informacion de la empresa</label>
                                        <textarea name="businessInfo" cols="30" rows="10"></textarea>
                                   </div>
                              </div>
                         </div>
                         <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
                         <a href="<?php echo FRONT_ROOT ?>Admin">Volver al Main</a>
                    </form>
               </div>

          </div>
     </section>
</main