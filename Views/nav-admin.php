<!-- NAVBAR -->

<nav class="navbar navbar-dark" style="background-color: #095373;">
     <div class="container-fluid d-flex justify-content-around">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
               <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="#">Logo</a>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
               <ul class="navbar-nav">
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo FRONT_ROOT ?>Admin">Inicio</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo FRONT_ROOT ?>Business?opcion=add">Añadir Emp</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo FRONT_ROOT ?>Business?opcion=list">Ver empresas</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" readonly href="<?php echo FRONT_ROOT ?>Student/ShowAddView">Agregar Alumno</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo FRONT_ROOT ?>Student/ShowListView">Listar Alumnos</a>
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
          <a class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto" href="#">
               <img src="<?php echo IMG_PATH ?>logo.png" style="max-height: 60px;">
          </a>
     </div>
</header>