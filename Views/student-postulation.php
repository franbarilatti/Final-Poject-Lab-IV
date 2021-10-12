<?php 
    namespace Views;
    use DAO\jobPositionDAO as jobPositionDAO;
    $jobPositionDao = new jobPositionDAO();
    $jobPositionList = $jobPositionDao->GetAll(); 
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
                              foreach($postulationList as $postulation)
                              {
                                
                                  foreach($jobPositionList as $jobPosition){

                                      if($postulation->getJobPositionId() == $jobPosition->getJobPositionId()){
                                   ?>
                                        <tr>
                                             <td><?php echo $jobPosition->getTitle();?></td>
                                             <td><?php echo $jobPosition->getDescription(); ?></td>
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