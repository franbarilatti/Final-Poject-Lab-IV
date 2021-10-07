
<?php
     /*require_once('header.php');
     require_once('nav.php');*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>MyJob</title>
     <style>
          .bg{
               background-image: url(Views/img/myjob.png);
               background-position: center center;

          }
          .conteiner{
               max-width: 970px;
          }
     </style>
</head>
<body>
     <div class="container w-75 bg-primary mt-5 rounded shadow">
          <div class="row aling-items-stretch">
               <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6">  
               </div>
               <div class="col bg-withe p-5 rounded-end">
          
                    <h2 class="fw-bold text-center py-5">Bienvenidos a MyJob</h2>

                    <form action="<?php echo FRONT_ROOT ?>Session/Login">
                         <div class="mb-4">
                              <label for="email" class="form-label"> Email </label>
                              <input type="email" name="email" class="form-control">
                         </div>

                         <div class="d-grid">
                              <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                         </div>

                    </form>
               </div>
               
          </div>
     </div>

</body>
</html>

