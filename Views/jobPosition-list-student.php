<?php var_dump($jobPositionList); ?>
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <span class="navbar-text"> Lista de empresas </span>
     <ul class="navbar-nav ml-auto">
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Admin/ShowAdminMainView "> Volver al Main</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Session/Logout" >logout</a>
          </li>
     </ul>
</nav>
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
                              foreach($jobPositionList as $jobPosition);
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $jobPosition->getTitle();?></td>
                                             <td><?php echo $jobPosition->getDescription(); ?></td>
                                             <td>
                                                 <a class="btn btn-primary" href="<?php echo FRONT_ROOT?>JobPosition/ShowListViewStudent?$id=<?php echo $business->getBusinessId();?>">Postularse</a> 
                                             </td>
                                        </tr>
                                   <?php
                              }
                         ?>
                         </tr>
                    </tbody>
                    
               </table>
          </div>

     </section>
</main>