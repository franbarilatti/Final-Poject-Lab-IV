<?php 
  namespace Views;
  echo $_SESSION["alert"];
  var_dump ($_SESSION["userLogged"]);

  $alert = $_SESSION['alert'];
  $userLogged = $_SESSION['userLogged'];

  require_once(VIEWS_PATH."nav-student");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $student->getFirstName()." ".$student->getLastName(); ?></title>
</head>

<body>
    
    <h1><?php echo $student->getFirstName()." ".$student->getLastName(); ?></h1>
</body>
</html>