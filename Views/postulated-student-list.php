
<?php

use Models\Postulation;

var_dump($postulationList);

?>



<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de alumnos</h2>
               <a href="<?php echo FRONT_ROOT?>Student/PrintPDF" target="blanck"> Mostrar PDF</a>
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
                         foreach($postulationList as $postulation){
                         
                              foreach($studentList as $student)
                              {
                                   foreach($postulationList as $postulation){
                                        if($student->getStudentId() == $postulation->getStudentId()){
                                   
                                   ?>
                                        <tr>
                                             <td><?php echo $student->getStudentId(); ?></td>
                                             <td><?php echo $student->getCareerId(); ?></td>
                                             <td><?php echo $student->getFirstName(); ?></td>
                                             <td><?php echo $student->getLastName(); ?></td>
                                             <td><?php echo $student->getDni(); ?></td>
                                             <td><?php echo $student->getFileNumber(); ?></td>
                                             <td><?php echo $student->getGender(); ?></td>
                                             <td><?php echo $student->getBirthDate(); ?></td>
                                             <td><?php echo $student->getEmail(); ?></td>
                                             <td><?php echo $student->getPhoneNumber(); ?></td>
                                             <td><?php echo $student->getActive(); ?></td>
                                        </tr>
                                   <?php
                                        }
                                   }
                              }
                         }
                         ?>
                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
</main>