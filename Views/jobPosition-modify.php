<?php
     require_once(VIEWS_PATH."nav-admin.php");
?>
<head>
     <title>Modificar Oferta de trabajo</title>
</head>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar Nueva Oferta</h2>
               <form action="<?php echo FRONT_ROOT ?>JobPosition/Modify" method="post" class="bg-light-alpha p-5">
                    <div class="col">                         
                         <div class="col-lg-4">
                              
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Titulo</label>
                                   <input type="hidden" name="jobPositionId" value="<?php echo $finded->getJobPositionId(); ?>">
                                   <input type="hidden" name="businessId" value="<?php echo $finded->getBusinessId();?>">
                                   <input type="text" name="title" placeholder="<?php echo $finded->getTitle(); ?>" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Descripcion del Puesto</label>
                                   <textarea name="description" cols="30" rows="10" class="form-control" placeholder="<?php echo $finded->getDescription(); ?>"></textarea>
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
                    <a href="<?php echo FRONT_ROOT ?>Admin">Volver al Main</a>
                    <br>
                    <a href="<?php echo FRONT_ROOT ?>Business/ShowListViewAdmin">Volver al listado</a>
               </form>
          </div>
     </section>
</main