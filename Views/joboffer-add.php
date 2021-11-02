<?php
     use Models\Alert as Alert;
     require_once "nav-admin.php";
     if($alert==null){
          $alert= new Alert("","");
     }
?>

<main class="py-5">
     <section id="listado" class="mb-5">
     <h2 class="mb-4">Agregar Oferta</h2>
          
     <div class="alert alert-<?php echo $alert->getType() ?>"><?php echo $alert->getMessage() ?></div>
               <div class="jobPositionList">   
                    <form action="<?php echo FRONT_ROOT?>JobOffer/Add" method="post">   
                         <input type="hidden" name="businessId" value="<?php echo $businessId?>">
                         <div>
                              <label for="">Titulo de la oferta</label><br>
                              <input type="text" name="title" placeholder="Ingrese el titulo " required>
                         </div>          
                         <table class="table table-hover bg-light-alpha table-fixed">
                              <tbody>
                              <?php
                                        foreach($jobPositionList as $jobPosition)
                                        {
                                             ?>
                                                  <tr>
                                                       <td><input type="radio" name="jobPositionId" value="<?php echo $jobPosition->getJobPositionId()?>"></td>
                                                       <td><?php echo $jobPosition->getDescription();?></td>
                                                       <td><input type="hidden" name="careerId"  value="<?php echo $jobPosition->getCareerId();?>"></td>
                                                       
                                                  </tr>
                                             <?php
                                        }
                                   ?>
                                   </tr>
                              </tbody>
                         </table>
                         <div>
                              <label >Fecha de inicio</label> <br>
                              <input type="date" name="postingDate" value="<?php date("d-m-Y");?>" >
                         </div>
                         <div>
                              <label for="">Fecha de expiracion</label> <br>
                              <input type="date" name="expiryDate" required>
                         </div>
                         <div>
                              <label> description</label> <br>
                              <textarea name="description" id="" cols="30" rows="10"></textarea required>
                         </div>
                         <button type="submit" class="btn btn-primary">Agregar oferta</button>
                    </form>
               </div>
     </section>
</main>