<?php 
    namespace Views;
	require_once "../Config/Autoload.php";
	require_once "../Config/Config.php";
    require_once "../Models/Student.php";
    require_once("header.php"); 
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
    <form action="" method="get">



    </form>
</body>
</html>