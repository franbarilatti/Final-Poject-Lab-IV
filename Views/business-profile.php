<?php

    use Config\Autoload as Autoload;
    require_once("Config/Autoload.php");
    
    Autoload::Start();
    
    use Models\Business as Business;

    $business = $_SESSION['business'];

?>

<main>
    <div>
        <h1> <?php echo $business->getBusinessName(); ?> </h1>
    </div>



</main>
