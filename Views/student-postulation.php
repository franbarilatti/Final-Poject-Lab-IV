<?php 
     namespace Views;
     if(!isset($_SESSION['userLogged'])){
          header("location:". FRONT_ROOT."Home");
     }
     use DAO\JobOfferDAO as JobOfferDAO;
     $jobOfferDAO = new JobOfferDAO();
     $JobOfferList = $jobOfferDAO->GetAll();
?>




<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Mis Postulaciones</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Titulo</th>
                         <th>Descripcion</th>
                    </thead>
                    <tbody>
                         <?php
                         if($postulationList){
                              foreach($postulationList as $postulation)
                              {
                                
                                  foreach($JobOfferList as $JobOffer){

                                      if($postulation->getJobOfferId() == $JobOffer->getJobOfferId()){
                                   ?>
                                        <tr>
                                             <td><?php echo $JobOffer->getTitle();?></td>
                                             <td><?php echo $JobOffer->getDescription(); ?></td>
                                             <td>
                                                  <a href="<?php echo FRONT_ROOT?>Postulation/Delete?$id=<?php echo $postulation->getPostulationId()?>&$userId=<?php echo $userId?>" class="btn btn-primary">Dar de baja</a>
                                             </td>
                                        </tr>
                                   <?php  
                                      }
                                  }
                              }
                         }
                         ?>
                         </tr>
                    </tbody>
                    
               </table>
               <div class="alert alert-<?php echo $alert->getType() ?>"><?php echo $alert->getMessage() ?></div>
          </div>

     </section>
</main>