<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>MyJob</title>
     <style>
          .bg {
               background-image: url(Views/img/myjob.png);
               background-repeat: no-repeat;
               background-position: center center;

          }

          .conteiner {
               max-width: 970px;
          }
     </style>
</head>

<body>

     <!-- NAVBAR -->

     <?php
          require_once(VIEWS_PATH."nav-main.php");
     ?>

     <!-- HEADER -->
     <header class="py-3 mb-4 border-bottom">
          <div class="container d-flex flex-wrap justify-content-center">
               <a class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto" href="#">
                    <img src="<?php echo IMG_PATH ?>logo.png" style="max-height: 60px;">
               </a>
          </div>
     </header>

     <!-- LOGING -->

     <section class="vh-100">
          <div class="container py-5 h-100">
               <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                         <div class="card" style="border-radius: 1rem;">
                              <div class="row g-0">
                                   <div class="col-md-6 col-lg-5 d-none d-md-block">
                                        <img src="https://i.pinimg.com/originals/e1/93/72/e193727169c55d15375258eb6e591cb3.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                   </div>
                                   <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                        <div class="card-body p-4 p-lg-5 text-black">

                                             <form action="<?php echo FRONT_ROOT ?>Session/Login" method="post">
                                                  <div class="d-flex align-items-center mb-3 pb-1">
                                                       <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                                       <span class="h1 fw-bold mb-0">Logo</span>
                                                  </div>

                                                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Iniciar Sesion</h5>

                                                  <div class="form-outline mb-4">
                                                       <input type="email" name="email" class="form-control form-control-lg" />
                                                       <label class="form-label" for="form2Example17">Email </label>
                                                  </div>

                                                  <div class="form-outline mb-4">
                                                       <input type="password" name="password" class="form-control form-control-lg" />
                                                       <label class="form-label" for="form2Example27">Contraseña</label>
                                                  </div>

                                                  <div class="pt-1 mb-4">
                                                       <button class="btn btn-dark btn-lg btn-block" type="submit">Ingresar</button>
                                                  </div>

                                                  <a class="small text-muted" href="#!">Forgot password?</a>
                                                  <p class="mb-5 pb-lg-2" style="color: #393f81;">No tienes una cuenta? <a href="<?php echo FRONT_ROOT ?>Register" style="color: #393f81;">Crea una aqui</a></p>
                                             </form>
                                             <div class="alert alert-<?php echo $alert->getType() ?>"><?php echo $alert->getMessage() ?></div>
                                        </div>
                                   </div>

</body>