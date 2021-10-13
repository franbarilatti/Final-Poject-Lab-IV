<?php 
    require_once(VIEWS_PATH."nav-admin.php");
?>
<!-- <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <span class="navbar-text"> Lista de empresas </span>
     <ul class="navbar-nav ml-auto">
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Student"> Volver al Main</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Session/Logout" >logout</a>
          </li>
     </ul>
</nav> -->
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de ofertas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                        <th>Id de oferta</th>
                        <th>Id de Empresa</th>
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
                                            <td><?php echo $jobPosition->getJobPositionId(); ?></td>
                                            <td><?php echo $jobPosition->getBusinessId();?></td>
                                            <td><?php echo $jobPosition->getTitle();?></td>
                                            <td><?php echo $jobPosition->getDescription(); ?></td>
                                            <td>
                                                  <div class="dropdown">
                                                       <button class="btn btn-primary" type="button" id="dropdownoptions" data-toggle= "dropdown" aria-extended= "true">
                                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                             <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                       </svg>
                                                       </button>
                                                       <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownoptions">
                                                            <li role="presentation"><a href= "<?php echo FRONT_ROOT?>JobPosition/Delete?$id=<?php echo $jobPosition->getJobPositionId(); ?>">Eliminar</a></li>
                                                            <li role="presentation"><a href= "<?php echo FRONT_ROOT?>JobPosition/ShowModifyView?$id=<?php echo $jobPosition->getJobPositionId();?>">Modificar</a></li>
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