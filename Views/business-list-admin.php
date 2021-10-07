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
                         <th>Id Empresa</th>
                         <th>Nombre</th>
                         <th>Cantidad Emplados</th>
                         <th>Informacion Empresa</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($businessList as $business)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $business->getBusinessId(); ?></td>
                                             <td>
                                                  <a href="<?php echo FRONT_ROOT ?>Business/ShowProfile"><?php echo $business->getBusinessName(); ?></a></td>
                                             <td><?php echo $business->getEmployesQuantity(); ?></td>
                                             <td><?php echo $business->getBusinessInfo(); ?></td>
                                             <td>
                                                  <div class="dropdown">
                                                       <button class="btn btn-primary" type="button" id="dropdownoptions" data-toggle= "dropdown" aria-extended= "true">
                                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                             <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                       </svg>
                                                       </button>
                                                       <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownoptions">
                                                            <li role="presentation"><a href= "<?php echo FRONT_ROOT?>Business/DeleteBusiness?$id=<?php echo $business->getBusinessId(); ?>">Eliminar</a></li>
                                                            <li role="presentation"><a href= "<?php echo FRONT_ROOT?>Business/ShowModifyView?$id=<?php echo $business->getBusinessId();?>&$businessName=<?php echo $business->getBusinessName();?>&$employesQuantity=<?php echo $business->getEmployesQuantity();?>&$businessInfo=<?php echo $business->getBusinessInfo();?>">Modificar</a></li>
                                                            <li role="presentation"> <a href="<?php echo FRONT_ROOT?>JobPosition/ShowAddView?$id=<?php echo $business->getBusinessId();?>">Agregar Nuevo Puesto</a></li>
                                                       </ul>
                                                  </div>
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
