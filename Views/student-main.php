<?php 
  namespace Views;
  use Models\Alert as Alert;
  use DAO\CareerAPI as CareerAPI;

  if(!isset($_SESSION['userLogged'])){
    header("location:". FRONT_ROOT."Home");
  }
     if ($alert == null) {
         $alert = new Alert(" ", " ");
     }else{
       $alert->setType($_SESSION["alertType"]);
       $alert->setMessage($_SESSION["alertMessage"]);
     }

     
    if($_SESSION['userLogged']->getRole() == "student"){
        require_once(VIEWS_PATH."nav-student.php");
    }elseif($_SESSION['userLogged']->getRole() == "admin"){
        require_once(VIEWS_PATH."nav-admin.php");
    }else{
        require_once(VIEWS_PATH."nav-business.php");
    }
    $careerApi = new CareerAPI();
    $career = $careerApi->SearchByID($student->getCareerId());
    
 ?>

<body>
    
    <h1><?php echo $student->getFirstName()." ".$student->getLastName(); ?></h1>

    <form class="was-validated">
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="firstName" class="form-label">firstName:</label>
            <input type="text" class="form-control mb- lg" placeholder="<?php echo $student->getFirstName() ?>" value="<?php echo $student->getFirstName() ?>" readonly>

        </div>
        <div class="col-3">
            <label for="LastName" class="form-label">LastName:</label>
            <input type="text" class="form-control mb-5 lg" placeholder="<?php echo $student->getLastName() ?>" value="<?php echo $student->getLastName() ?>" readonly>

        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="dni" class="form-label">dni:</label>
            <input type="text" class="form-control mb-5 lg" placeholder="<?php echo $student->getDni() ?>" value="<?php echo $student->getDni() ?>" readonly>

        </div>
        <div class="col-3">
            <label for="fileNumber" class="form-label">fileNumber:</label>
            <input type="text" class="form-control mb-5 lg" placeholder="<?php echo $student->getFileNumber() ?>" value="<?php echo $student->getFileNumber() ?>" readonly>

        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="gender" class="form-label">gender:</label>
            <input type="text" class="form-control mb-5 lg" placeholder="<?php echo $student->getGender() ?>" value="<?php echo $student->getGender() ?>" readonly>

        </div>
        <div class="col-3">
            <label for="birthDate" class="form-label">birthDate:</label>
            <input type="datatime" class="form-control mb-5 lg" placeholder="<?php echo $student->getBirthDate() ?>" value="<?php echo date("d/m/y", strtotime($student->getBirthDate())) ?>" readonly>

        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="email" class="form-label">email:</label>
            <input type="email" class="form-control mb-5 lg" placeholder="<?php echo $student->getEmail() ?>" value="<?php echo $student->getEmail() ?>" readonly>

        </div>
        <div class="col-3">
            <label for="phoneNumber" class="form-label">phoneNumber:</label>
            <input type="text" class="form-control mb-5 lg" placeholder="<?php echo $student->getPhoneNumber() ?>" value="<?php echo $student->getPhoneNumber() ?>" readonly>

        </div>
    </div>


    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="careerId" class="form-label">Carrera:</label>
            <input type="text" class="form-control mb-5 lg" placeholder="<?php echo $career->getDescription() ?>" value="<?php echo $career->getDescription() ?>" readonly>
        </div>
    </div>

</body>
