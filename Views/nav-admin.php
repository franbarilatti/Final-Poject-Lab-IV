<!-- NAVBAR -->

<nav class="navbar navbar-dark sticky-top" style="background-color: #095373;">
     <div class="container-fluid d-flex">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
               <span class="navbar-toggler-icon"></span>
          </button>
          <div>
               <span class="text-light">Admin</span>
          <a class="navbar-brand" href="<?php echo FRONT_ROOT?>Admin"><i class="fas fa-user-cog"></i></a>
          </div>
          
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
               <ul class="navbar-nav">
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo FRONT_ROOT ?>Admin">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Administrar Administradores</a>
                         <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Admin/ShowRegisterAdmin">Añadir Administrador</a></li>
                              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Admin/ShowList">Listar Administradoes</a></li>
                         </ul>
                    </li>
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Administrar Empresas</a>
                         <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Business/ShowAddView">Añadir Empresas</a></li>
                              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Business/ShowListViewAdmin">Listar Empresas</a></li>
                         </ul>
                    </li>
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Administrar Estudiantes</a>
                         <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Admin/UpdateDataBaseStudent">Actualizar Base de Datos</a></li>
                              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Student/ShowAddView">Agregar Alumno</a></li>
                              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Student/ShowListView">Listar Alumnos</a></li>
                         </ul>
                    </li>
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Administrar Carreras</a>
                         <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Admin/UpdateDataBaseCareer">Actualizar Base de Datos</a></li>
                         </ul>
                    </li>
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Administrar Puestos de Trabajo</a>
                         <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Admin/UpdateDataBaseJobPosition">Actualizar Base de Datos</a></li>
                         </ul>
                    </li>
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Administrar Ofertas de Trabajo</a>
                         <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Admin/UpdateDataBaseJobPosition">Añadir oferta de trabajo</a></li>
                              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>JobOffer/ShowListView">Listar ofertas de trabajo</a></li>
                         </ul>
                    </li>
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Administrar Postulaciones</a>
                         <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Admin/UpdateDataBaseStudent">Actualizar Base de Datos</a></li>
                              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Student/ShowAddView">Agregar Alumno</a></li>
                              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Student/ShowListView">Listar Alumnos</a></li>
                         </ul>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="<?php echo FRONT_ROOT ?>index.php">Logout</a>
                    </li>
               </ul>
          </div>
     </div>
</nav>

<!-- HEADER -->
<header class="py-3 mb-4 border-bottom">
     <div class="container d-flex flex-wrap justify-content-center">
          <a class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto" href="<?php echo VIEWS_PATH?>admin-main.php"">
               <img src="<?php echo IMG_PATH ?>logo.png" style="max-height: 60px;">
          </a>
     </div>
</header>