<?php
     use Models\Alert as Alert;
     if(!isset($_SESSION['userLogged'])){
          header("location:". FRONT_ROOT."Home");
     }
     require_once "nav-admin.php";
     if($alert==null){
          $alert= new Alert("","");
     }
     $jobOfferModify = $jobOffer[0];
?>

<main class="py-5">
     <section id="listado" class="mb-5">
     <h2 class="mb-4">Agregar Oferta</h2>
          
     <div class="alert alert-<?php echo $alert->getType() ?>"><?php echo $alert->getMessage() ?></div>
               <div class="jobPositionList">   
                    <form action="<?php echo FRONT_ROOT?>JobOffer/Modify" method="post">   
                         <input type="hidden" name="jobOfferId" value="<?php echo $jobOfferModify->getJobOfferId()?>">
                         <div>
                              <label for="">Titulo de la oferta</label><br>
                              <input type="text" name="title" value="<?php  echo $jobOfferModify->getTitle()?>" placeholder="<?php echo $jobOfferModify->getTitle()?>" >
                         </div>   
                         
                         <div>
                              <label for="">Puesto Buscado</label><br>
                              <input type="text"  placeholder="<?php echo $jobPosition->getDescription();?> " >
                         </div> 
                         
                         <div>
                              <label >Fecha de inicio</label> <br>
                              <input type="text"  placeholder="<?php echo $jobOfferModify->getPostingDate();?>" >
                         </div>
                         <div>
                              <label for="">Fecha de expiracion</label> <br>
                              <input type="text" onfocus="(this.type='date')" name="expiryDate" value="<?php echo $jobOfferModify->getExpiryDate()?>" placeholder="<?php echo $jobOfferModify->getExpiryDate();?>">
                         </div>
                         <div>
                              <label> description</label> <br>
                              <input type="text" name="description" value="<?php echo $jobOfferModify->getDescription();?> ">
                         </div>
                         <button type="submit" col="30" raw = "25" class="btn btn-primary">Modificar</button>
                    </form>
               </div>
     </section>
</main>