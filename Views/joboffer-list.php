<?php 
     namespace Views;
     
?>

<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Lista de ofertas </h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>id de la oferta</th>
                         <th>Titulo</th>
                         <th>descripcion</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($jobOfferList as $jobOffer){
                         ?>
                         <tr>
                              <td><?php echo $jobOffer->getJobOfferId();?></td>
                              <td><?php echo $jobOffer->getTitle();?></td>
                         </tr>
                         <?php
                    }
                    ?>
                    </tbody>
                    
               </table>
          </div>

     </section>
</main>