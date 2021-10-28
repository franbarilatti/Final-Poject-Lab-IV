
<?php

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

     <!-- NAVBAR -->

     <div class="conteiner-fluid">
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
          <a class="navbar-brand" href="#">Myjob</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          <div>
               <form class="d-flex justify-content-center">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
               </form>
          </div>
          <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
               <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
               </ul>
               
               
           </div>
          </div>
     </nav>
     </div>
     
     <!-- LOGIN -->

     <div class="container w-75 bg-primary mt-5 rounded shadow">
          <div class="row aling-items-stretch">
               <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6"></div>
               <div class="col bg-withe p-5 rounded-end">
          
                    <h2 class="fw-bold text-center py-5">Bienvenidos a MyJob</h2>

                    <form action="<?php echo FRONT_ROOT ?>Session/Login" method= "post">
                         <div class="mb-4">
                              <label for="email" class="form-label"> Email </label>
                              <input type="email" name="email" class="form-control">
                         </div>
                         <div class="mb-4">
                              <label for="password" class="form-label"> Constraseña </label>
                              <input type="password" name="password" class="form-control">
                         </div>

                         <div class="d-grid">
                              <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                         </div>
                         <br>
                         <a class= "btn btn-primary" href="<?php echo FRONT_ROOT?>User/ShowUserAddView">Registrar usuario</a>
                    </form>
               </div>
               
          </div>
     </div>
</body>
</html>

