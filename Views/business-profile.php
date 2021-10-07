<?php

    use Config\Autoload as Autoload;
    require_once("Config/Autoload.php");
    
    Autoload::Start();
    
    use Models\Business as Business;

    $business = $_SESSION['business'];
    echo var_dump($business);

?>

<nav >


</nav>
<main>




</main>
