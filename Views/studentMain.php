<?php 
    namespace Views;
    require_once("header.php");
    use Config\Autoload as Autoload;

    Autoload::Start();

    use Models\Student as Student;

    session_start();
    $student = new Student();
    $student = $_SESSION["student"];
    var_dump($student);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $student->getFirstName();?></title>
</head>
<body>
    <h1>PERFIL DE <?php echo $student->getFirstName(); ?> </h1>
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">  
    <ul>
        <li class= "nav-item">
            <a href="<?php FRONT_ROOT ?>Home/Index">Inicio</a>
        </li>
        <li>
            <a href="<?php FRONT_ROOT ?>Business/ShowListView">Ver empresas</a>
        </li>
        <li>
            <a href="">Ver Postulaciones</a>
        </li>
    </ul>
    </div>
    <div class="dropdown">
        <a href="d-flex align-items-center text-white text-decoration-none dropdown-toggle">Perfil</a>
    </div>

</body>
</html>