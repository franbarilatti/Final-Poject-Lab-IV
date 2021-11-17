<?php
     if(!isset($_SESSION['userLogged'])){
          header("location:". FRONT_ROOT."Home");
     }elseif($_SESSION['userLogged']->getRole() == "student"){
        require_once(VIEWS_PATH."nav-student.php");
    }elseif($_SESSION['userLogged']->getRole() == "admin"){
        require_once(VIEWS_PATH."nav-admin.php");
    }else{
        require_once(VIEWS_PATH."nav-business.php");
    }
?>

<head>
     <title>Modificar Empresa</title>
</head>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Modificar <?php echo $business->getBusinessName();?></h2>
               <form action="<?php echo FRONT_ROOT ?>Business/Modify" method="post" class="bg-light-alpha p-5">
                    <div class="col">                         
                         <div class="col-lg-4">
                              
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="businessName">Nombre</label>
                                   <input type="hidden" name="businessId" value="<?php echo $business->getBusinessId() ?>">
                                   <input type="text" name="businessName" value="<?php echo $business->getBusinessName();?>" class="form-control" >
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="adress">Direccion</label>
                                   <input type="text" name="adress" value= "<?php echo $business->getAdress() ?>" min= "1" class="form-control" >
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="employesQuantity">Cantidad de empleados</label>
                                   <input type="number" name="employesQuantity" value= "<?php echo $business->getEmployesQuantity() ?>" min= "1" class="form-control" >
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
     </section>
</main