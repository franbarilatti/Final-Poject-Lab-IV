<main class="py-5">
     <section id="listado" class="mb-5">
     <h2 class="mb-4">Agregar Oferta</h2>

          <div class="jobPositionList">                
               <table class="table table-hover bg-light-alpha table-fixed">
                    <tbody>
                    <?php
                              foreach($jobPositionList as $jobPosition)
                              {
                                   ?>
                                        <tr>
                                             <td><input type="radio" name="jobPosition" value="<?php echo $jobPosition->getJobPositionId()?>"></td>
                                             <td><?php echo $jobPosition->getDescription();?></td>
                                             <input type="hidden" name="carrerId" value="<?php echo$jobPosition->getCareerId(); ?>">
                                        </tr>
                                        
                                   <?php
                                   
                              }
                         ?>
                         <button type="submit" class="btn btn-primary">submit</button>
                         </tr>
                    </tbody>
                    
               </table>
          </div>

     </section>
</main>