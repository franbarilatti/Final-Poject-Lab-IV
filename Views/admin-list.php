<?php
    require_once('nav-admin.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de alumnos</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Id de Usurario</th>
                         <th>Id de admin</th>
                         <th>Nombre</th>
                         <th>Apellido</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($adminList as $admin)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $admin->getUserId(); ?></td>
                                             <td><?php echo $admin->getAdminId(); ?></td>
                                             <td><?php echo $admin->getFirstName(); ?></td>
                                             <td><?php echo $admin->getLastName(); ?></td>
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