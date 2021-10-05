<?php
    require_once('nav.php');
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
                                                       <button class="btn btn-secondary" type="button" id="dropdownoptions" data-toggle= "dropdown" aria-extended= "true">opciones
                                                       <i class="bi bi-three-dots-vertical"></i>
                                                       </button>
                                                       <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownoptions">
                                                            <li role="presentation"><a href= "<?php echo FRONT_ROOT?>Business/DeleteBusiness?$id=<?php echo $business->getBusinessId(); ?>">Eliminar</a></li>
                                                            <li role="presentation"><a href= "<?php echo FRONT_ROOT?>Business/Modify?$id=<?php echo $business->getBusinessId(); ?>">Modificar</a></li>
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
     </section>
</main>
<a href= "<?php echo FRONT_ROOT?>Business/DeleteBusiness?$id=<?php echo $business->getBusinessId(); ?>">Eliminar</a> 
