<?php
     if(!isset($_SESSION['userLogged'])){
          header("location:". FRONT_ROOT."Home");
     }
       require_once(VIEWS_PATH."nav-student");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de ofertas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Titulo</th>
                         <th>Descripcion</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($jobPositionList as $jobPosition)
                              {
                                   if($jobPosition->getActive() == true)
                                   {
                                   ?>
                                        <tr>
                                             <td><?php echo $jobPosition->getTitle();?></td>
                                             <td><?php echo $jobPosition->getDescription(); ?></td>
                                             <td>
                                                 <a class="btn btn-primary" href="<?php echo FRONT_ROOT?>Postulation/Add?$idStudent=<?php echo $studentId;?>&$idBusiness=<?php echo $jobPosition->getBusinessId();?> &jobPositionId=<?php echo $jobPosition->getJobPositionId();?>">Postularse</a> 
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