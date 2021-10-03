<?php 
    namespace Views;
	require_once "../Config/Autoload.php";
	require_once "../Config/Config.php";
    require_once("header.php");
    use Config\Autoload as Autoload;
    Autoload::Start();
?>

<form action="business-add.php" method="POST">
    <button type="submit" class="btn btn-success">agregar Empresa</button>
</form>