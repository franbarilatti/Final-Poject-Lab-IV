<<<<<<< HEAD
<section class="vh-100" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="https://i.pinimg.com/564x/86/8a/a6/868aa646a4ca4f2b250a37dc4060ac96.jpg"
                alt="login form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="<?php echo FRONT_ROOT?>Session/Login" method= "post">
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
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">No tienes una cuenta? <a href="<?php echo FRONT_ROOT?>Register" style="color: #393f81;">Crea una aqui</a></p>
                </form>

              </div>
            </div>
=======

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
               background-repeat: no-repeat;
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
>>>>>>> origin/main
          </div>
        </div>
      </div>
    </div>
  </div>
</section>