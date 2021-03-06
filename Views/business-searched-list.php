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
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de alumnos</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Id Empresa</th>
                         <th>Nombre</th>
                         <th>Cantidad Emplados</th>
                         <th>Informacion Empresa</th>
                    </thead>
                    <tbody>
                         <?php
                            sort($businessList['businessName']);
                              foreach($businessList as $business)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $business->getBusinessId(); ?></td>
                                             <td><?php echo $business->getBusinessName(); ?></td>
                                             <td><?php echo $business->getEmployesQuantity(); ?></td>
                                             <td><?php echo $business->getBusinessInfo(); ?></td>
                                             <td>
                                                  <div class="dropdown">
                                                       <button class="btn btn-primary" type="button" id="dropdownoptions" data-toggle= "dropdown" aria-extended= "true">
                                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                             <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                       </svg>
                                                       </button>
                                                       <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownoptions">
                                                            <li role="presentation"><a href= "<?php echo FRONT_ROOT?>Business/DeleteBusiness?$id=<?php echo $business->getBusinessId(); ?>">Eliminar</a></li>
                                                            <li role="presentation"><a href= "<?php echo FRONT_ROOT?>Business/ShowModifyView?$id=<?php echo $business->getBusinessId();?>&$businessName=<?php echo $business->getBusinessName();?>&$employesQuantity=<?php echo $business->getEmployesQuantity();?>&$businessInfo=<?php echo $business->getBusinessInfo();?>">Modificar</a></li>
                                                            <li role="presentation"> <a href="<?php echo FRONT_ROOT?>JobPosition/ShowAddView">Agregar Nuevo Puesto</a></li>
                                                       </ul>
                                                  </div>
                                             </td>
                                        </tr>
                                   <?php
                              }
                         ?>
                         </tr>
                    </tbody>
                    
               </table>
          </div>
          <a href="<?php echo FRONT_ROOT ?>Admin/ShowAdminMainView">Volver al Main</a>

     </section>
</main>