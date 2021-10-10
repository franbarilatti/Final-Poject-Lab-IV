<?php
     require_once "header.php";
     //$idBusiness = $_SESSION['idBusiness'];
?>
<head>
     <title>Nueva Oferta de trabajo</title>
</head>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar Nueva Oferta</h2>
               <form action="<?php echo FRONT_ROOT ?>JobPosition/Add" method="post" class="bg-light-alpha p-5">
                    <div class="col">                         
                         <div class="col-lg-4">
                              
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Titulo</label>
                                   <input type="hidden" name="businessId" value="<?php echo $businessId;?>">
                                   <input type="text" name="title" value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Descripcion del Puesto</label>
                                   <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
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