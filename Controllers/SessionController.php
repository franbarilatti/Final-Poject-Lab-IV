<?php 
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;
    use Controllers\HomeController as HomeController;

     class SessionController{


        public function Login(){
            $email;
            $studenRepo = new StudentDAO();
            $studentList = $studenRepo->GetAll();
            if($_GET){
                $email = $_GET["email"];
                $i = 0;
                while($i < count($studentList) && ($studentList[$i]->getEmail() != $email )){
                    $i++;
                }
                if($i< count($studentList)){
                    $student = new Student();
                    $student->setStudentId($studentList[$i]->getStudentId());
                    $student->setCareerId($studentList[$i]->getCareerId());
                    $student->setFirstName($studentList[$i]->getFirstName());
                    $student->setLastName($studentList[$i]->getLastName());
                    $student->setDni($studentList[$i]->getDni());
                    $student->setFileNumber($studentList[$i]->getFileNumber());
                    $student->setGender($studentList[$i]->getGender());
                    $student->setBirthDate($studentList[$i]->getBirthDate());
                    $student->setEmail($studentList[$i]->getEmail());
                    $student->setPhoneNumber($studentList[$i]->getPhoneNumber());
                    $student->setActive($studentList[$i]->getActive());
                    $_SESSION["student"] = $student;

                    header("location: ../Views/studentMain.php");
                }else{
                    $homeController = new HomeController();
                    $homeController->Index("mail o contraseña incorrectas");
                }
            }
        }
    }


?>