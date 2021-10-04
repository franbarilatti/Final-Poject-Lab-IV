<?php

?>
<head>
     <title>Nueva Empresa</title>
</head>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar Empresa</h2>
               <form action="<?php echo FRONT_ROOT ?>Business/Add" method="get" class="bg-light-alpha p-5">
                    <div class="col">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Id de la empresa</label>
                                   <input type="number" name="businessId" min = 1 value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="businessName" value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Cantidad de empleados</label>
                                   <input type="number" name="employesQuantity" min= 1 value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Informacion de la empresa</label>
                                   <input type="textarea" name="businessInfo" min= 1 value="" class="form-control" Required>
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main