<?php 
  namespace Views;
  use Models\Alert as Alert;

     if ($alert == null) {
         $alert = new Alert(" ", " ");
     }else{
       $alert->setType($_SESSION["alertType"]);
       $alert->setMessage($_SESSION["alertMessage"]);
     }

     
    if($_SESSION['userLogged']->getRole() == "student"){
        require_once(VIEWS_PATH."nav-student.php");
    }elseif($_SESSION['userLogged']->getRole() == "admin"){
        require_once(VIEWS_PATH."nav-admin.php");
    }else{
        require_once(VIEWS_PATH."nav-business.php");
    }

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
    <div class="alert alert-<?php echo $alert->getType() ?>"><?php echo $alert->getMessage() ?></div>
</body>
</html>