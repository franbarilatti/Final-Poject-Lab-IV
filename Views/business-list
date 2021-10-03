<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de alumnos</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Id de estudiante</th>
                         <th>Id de carrera</th>
                         <th>Nombre</th>
                         <th>Apellido</th>
                         <th>DNI</th>
                         <th>Numero de legajo</th>
                         <th>Genero</th>
                         <th>Fecha de nacimiento</th>
                         <th>Email</th>
                         <th>Telefono</th>
                         <th>Actividad</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($businessList as $business)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $business->getBusinessId(); ?></td>
                                             <td><?php echo $business->getBusinessName(); ?></td>
                                             <td><?php echo $business->getEmployesQuantity(); ?></td>
                                             <td><?php echo $business->getPostulationList(); ?></td>
                                             <td><?php echo $business->getBusinessInfo(); ?></td>
                                             <td><?php echo $business->getJobPositionList(); ?></td>
                                        </tr>
                                   <?php
                              }
                         ?>
                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
</main>1