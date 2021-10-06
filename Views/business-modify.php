<?php
     use Models\Business as Business;
     $business = new Business();
     
?>
<head>
     <title>Modificar Empresa</title>
</head>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Modificar  <?php $business->getBusinessName();?></h2> 
               <form action="<?php echo FRONT_ROOT ?>Business/Modify?id=<?php $business->getBusinessId();?>" method="post" class="bg-light-alpha p-5">
                    <div class="col">                         
                         <div class="col-lg-4">
                              
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
                    <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
                    <a href="<?php echo FRONT_ROOT ?>Admin/ShowAdminMainView">Volver al Main</a>
               </form>
          </div>
     </section>
</main