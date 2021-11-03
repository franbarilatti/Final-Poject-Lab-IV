<?php
     require_once(VIEWS_PATH."nav-student.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de empresas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Informacion Empresa</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($businessList as $business)
                              {
                                   ?>
                                        <tr>
                                             <td>
                                                <a href="<?php echo FRONT_ROOT ?>Business/ShowProfile?businessId=<?php echo $business->getBusinessId();?>"><?php echo $business->getBusinessName(); ?></a></td>
                                             <td><?php echo $business->getBusinessInfo(); ?></td>
                                             <td>
                                                 <a class="btn btn-primary" href="<?php echo FRONT_ROOT?>JobPosition/ShowListViewStudent?$studentId=<?php echo $student->getStudentId()?>&?$businessId=<?php echo $business->getBusinessId();?>">Ver ofertas</a> 
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