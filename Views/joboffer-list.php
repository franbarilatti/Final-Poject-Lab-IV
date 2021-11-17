<?php

namespace Views;

use Models\Alert as Alert;

if (!isset($_SESSION['userLogged'])) {
     header("location:" . FRONT_ROOT . "Home");
}
if (isset($_SESSION['userLogged'])) {
     $userLogged = $_SESSION['userLogged'];
     switch ($userLogged->getRole()) {
          case "student":
               require_once(VIEWS_PATH . "nav-student.php");
               break;
          case "company":
               require_once(VIEWS_PATH . "nav-business.php");
               break;

          case "admin":
               require_once(VIEWS_PATH . "nav-admin.php");
               break;
     }
}

if ($alert == null) {
     $alert = new Alert(" ", " ");
}



?>

<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Ofertas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <?php
                         if ($userLogged->getRole() == "company" || $userLogged->getRole() == "admin") { ?>
                              <th>Id Oferta</th>
                         <?php
                         } ?>
                         <th>Empresa</th>
                         <th></th>

                         <th>Titulo</th>
                         <th>Descripcion</th>
                         <th>Vencimiento</th>
                    </thead>
                    <tbody>
                         <?php
                         if ($jobOfferList) {
                              foreach ($jobOfferList as $jobOffer) {
                         ?>
                                   <tr>
                                        <?php
                                        if ($userLogged->getRole() == "company" || $userLogged->getRole() == "admin") { ?>
                                             <td><?php echo $jobOffer->getJobOfferId(); ?></td>
                                        <?php
                                        } ?>
                                        <td><?php echo $jobOfferRepo->GetBusinessNameByJobOfferId($jobOffer->getBusinessId()) ?></td>
                                        <td><img src="<?php echo $jobOffer->getFlyer() ?>" width="50px" height="50" alt="Sin imagen cargada"></td>
                                        <?php
                                        if ($jobOffer->getFlyer() == "false") { ?>
                                             <td><?php echo $jobOffer->getTitle(); ?></td>
                                        <?php
                                        } else { ?>
                                             <td><a href="<?php echo $jobOffer->getFlyer() ?>"><?php echo $jobOffer->getTitle(); ?></a></td>
                                        <?php
                                        } ?>
                                        <td><?php echo $jobOffer->getDescription(); ?></td>
                                        <td><?php echo $jobOffer->getExpiryDate() ?></td>
                                        <td>
                                             <div class="dropdown">
                                                  <button class="btn btn-primary " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                       </svg>
                                                  </button>
                                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuButton1">
                                                       <?php
                                                       if ($userLogged->getRole() == "company" || $userLogged->getRole() == "admin") { ?>

                                                            <li role="presentation"><a href="<?php echo FRONT_ROOT ?>JobOffer/Delete?$jobOfferId=<?php echo $jobOffer->getJobOfferId(); ?>">Eliminar</a></li>
                                                            <li role="presentation"><a href="<?php echo FRONT_ROOT ?>JobOffer/ModifyView?$jobOfferId=<?php echo $jobOffer->getJobOfferId(); ?>">Modificar</a></li>
                                                            <li role="presentation"><a href="<?php echo FRONT_ROOT ?>Postulation/PostulatedList?$jobOfferId=<?php echo $jobOffer->getJobOfferId(); ?>">Listado de postulantes</a></li>
                                                       <?php  } else { ?>
                                                            <li role="presentation"><a href="<?php echo FRONT_ROOT ?>Postulation/Add?$businessId=<?php echo $jobOffer->getBusinessId() ?>&$jobOfferId=<?php echo $jobOffer->getJobOfferId() ?>">Postularse</a></li>
                                                       <?php  }
                                                       ?>


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
          <div class="alert alert-<?php echo $alert->getType() ?>"><?php echo $alert->getMessage() ?></div>

     </section>
</main>