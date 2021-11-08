<?php

namespace Views;
if(!isset($_SESSION['userLogged'])){
  header("location:". FRONT_ROOT."Home");
}
  require_once(VIEWS_PATH."nav-admin.php");
  

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Admin</h1>
  <div class="alert alert-<?php echo $alert->getType() ?>">
    <?php echo $alert->getMessage()?>
  </div>
</body>

</html>