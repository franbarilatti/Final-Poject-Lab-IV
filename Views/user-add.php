<?php 
    namespace Views;
    use Models\Alert as Alert;
    if ($alert==null){
     $alert = new Alert(" "," ");
    }
?>

<body>
    <div class="container" id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h1>Registro</h1>
            <form action="<?php echo FRONT_ROOT ?>Register/Register" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name= "email" placeholder="Ingrese un email">
                </div>
                <div class="form-group">
                    <label >Constraseña:</label>
                    <input type="password" class="form-control" name= "password" placeholder="Ingrese una password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-lg">Registrarse</button>
                </div>
                <input type="hidden" name= "role"  value= "student">
            </form>
        <div class= "alert alert-<?php echo $alert->getType()?>"><?php echo $alert->getMessage()?></div>
        </div>
    </div>
</body>
