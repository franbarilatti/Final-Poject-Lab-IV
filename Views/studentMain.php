<?php 
  namespace Views;
  var_dump($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user->getFirstName()." ".$user->getLastName(); ?></title>
</head>

<body>
    
    <h1><?php echo $user->getFirstName()." ".$user->getLastName(); ?></h1>
</body>
</html>