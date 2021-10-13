
<?php 
  $studentId = $std->getStudentId();

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo FRONT_ROOT ?>Student">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo FRONT_ROOT ?>Postulation/ShowPostulatiobByStudent?studentId=<?php  echo $studentId; ?>">Ver Postulaciones</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo FRONT_ROOT?>Business/ShowListViewStudent">Ver empresas</a>
        </li>
        <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>index.php">Logout</a>
        </li> 
      </ul>
      <form class="d-flex"  action="<?php echo FRONT_ROOT ?>Business/SearchByNameStudent" method="post">
        <input class="form-control me-2" name="businessName" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>