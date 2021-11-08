<?php

use DAO\BusinessDAO;

$businessDAO = new BusinessDAO;

    $user = $_SESSION['userLogged'];
    $business = $businessDAO->SearchByUserId($user->getUserId());
?>

<!-- NAVBAR -->

<nav class="navbar navbar-dark sticky-top" style="background-color: #095373;">
    <div class="container-fluid d-flex">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div>
            <span class="text-light">Empresa</span>
            <a class="navbar-brand" href="<?php echo FRONT_ROOT ?>Business"><i class="fas fa-building"></i></a>
        </div>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Business">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Administrar Ofertas de Trabajo</a>
                    <ul class="dropdown-menu">
                        <li role=" presentation"> <a href="<?php echo FRONT_ROOT ?>JobOffer/AddView?$id=<?php echo $business->getBusinessId(); ?>">Agregar Nueva Oferta</a></li>
                        <li role="presentation"> <a href="<?php echo FRONT_ROOT ?>JobOffer/ShowListView">Ver ofertas</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Administrar Postulaciones</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Admin/UpdateDataBaseStudent">Listar Postulaciones</a></li>
                        <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Student/ShowAddView">Agregar Alumno</a></li>
                        <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Student/ShowListView">Listar Alumnos</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Session/Logout">Logout</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- HEADER -->
<header class="py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <a class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto" href="<?php echo FRONT_ROOT ?>Student">
            <img src="<?php echo IMG_PATH ?>logo.png" style="max-height: 60px;">
        </a>
    </div>
</header>