<?php
     require_once (VIEWS_PATH."nav-admin.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Empresas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Id Empresa</th>
                         <th>Nombre</th>
                         <th>Cantidad Empleados</th>
                         <th>Informacion Empresa</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($businessList as $business)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $business->getBusinessId(); ?></td>
                                             <td>
                                                  <a href="<?php echo FRONT_ROOT ?>Business/ShowProfile?businessId=<?php echo $business->getBusinessId();?>"><?php echo $business->getBusinessName(); ?></a></td>
                                             <td><?php echo $business->getEmployesQuantity(); ?></td>
                                             <td><?php echo $business->getBusinessInfo(); ?></td>
                                             <td>
                                                  <div class="dropdown">
                                                  <button class="btn btn-primary " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                       <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                   </svg>
                                                  </button>
                                                       <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuButton1">
                                                            <li role="presentation"><a href= "<?php echo FRONT_ROOT?>Business/DeleteBusiness?$id=<?php echo $business->getBusinessId(); ?>">Eliminar</a></li>
                                                            <li role="presentation"><a href= "<?php echo FRONT_ROOT?>Business/ShowModifyView?$id=<?php echo $business->getBusinessId();?>">Modificar</a></li>
                                                            <li role="presentation"> <a href="<?php echo FRONT_ROOT?>JobOffer/AddView?$id=<?php echo $business->getBusinessId(); ?>">Agregar Nueva Oferta</a></li>
                                                            <li role="presentation"> <a href="<?php echo FRONT_ROOT?>JobPosition/ShowListViewAdmin?$id=<?php echo $business->getBusinessId();?>">Ver ofertas</a></li>
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

