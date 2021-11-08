<?php
     require_once(VIEWS_PATH."nav-student.php");

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de empresas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Informacion Empresa</th>
                    </thead>
                    <tbody>
                         <?php
                         if ($businessList != null) {
                              foreach ($businessList as $business) {
                                   if($business->getActive()==true){
                         ?>
                                   <tr>
                                   <td>
                                                <a href="<?php echo FRONT_ROOT ?>Business/ShowProfile?businessId=<?php echo $business->getBusinessId();?>"><?php echo $business->getBusinessName(); ?></a></td>
                                                <td><?php echo $business->getBusinessInfo(); ?></td>
                                        
                                        
                                        <td><?php echo $business->getBusinessInfo(); ?></td>
                                       
                                        <td>
                                             <div class="dropdown">
                                                  <button class="btn btn-primary " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                       </svg>
                                                  </button>
                                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuButton1">
                                                       <li role="presentation"> <a href="<?php echo FRONT_ROOT ?>JobOffer/ShowListView">Ver ofertas</a></li>
                                                  </ul>
                                             </div>
                                        </td>
                                   </tr>
                         <?php
                                   }
                              }
                         }
                         ?>
                         </tr>
                    </tbody>
                    
               </table>
          </div>

     </section>
</main>


