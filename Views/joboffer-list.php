<?php 
     namespace Views;
     use Models\Alert as Alert;
     var_dump($jobOfferList);
     if ($alert == null) {
         $alert = new Alert(" ", " ");
     }
?>

<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Empresas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Id Oferta</th>
                         <th>Titulo</th>
                         <th>Descripcion</th>
                         <th>Vencimiento</th>
                    </thead>
                    <tbody>
                         <?php
                              if($jobOfferList){
                                   foreach($jobOfferList as $jobOffer){
                                        ?>
                                             <tr>
                                                  <td><?php echo $jobOffer->getJobOfferId(); ?></td>
                                                  
                                                  <td><?php echo $jobOffer->getTitle(); ?></td>
                                                  <td><?php echo $jobOffer->getDescription(); ?></td>
                                                  <td><?php echo $jobOffer->getExpiryDate()?></td>
                                                  <td>
                                                       <div class="dropdown">
                                                       <button class="btn btn-primary " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                       </svg>
                                                       </button>
                                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuButton1">
                                                                 <li role="presentation"><a href= "<?php echo FRONT_ROOT?>JobOffer/Delete?$jobOfferId=<?php echo $jobOffer->getJobOfferId(); ?>">Eliminar</a></li>
                                                            </ul>
                                                       </div>
                                                  </td>
                                             </tr>
                                        <?php
                                   }
                              }
                         ?>
                         </tr>
                    </tbody>
                    
               </table>
          </div>

     </section>
</main>
