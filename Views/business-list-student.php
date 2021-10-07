<?php
    require_once("Config/Autoload.php");
    use Config\Autoload as Autoload;

    Autoload::Start();

    use DAO\BusinessDAO as BusinessDAO;

    $repository = new BusinessDAO;

    $businessList = $repository->GetAll();

?>

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
               <h2 class="mb-4">Listado de alumnos</h2>
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
                                                <a href="<?php echo FRONT_ROOT ?>Business/ShowProfile"><?php echo $business->getBusinessName(); ?></a></td>
                                             <td><?php echo $business->getBusinessInfo(); ?></td>
                                             <td>
                                                 <a class="btn btn-primary" href="<?php echo FRONT_ROOT?>JobPosition/ShowListViewStudent?$id=<?php echo $business->getBusinessId();?>">Ofertas</a> 
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