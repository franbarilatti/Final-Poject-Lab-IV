<?php 
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;
    use Controllers\HomeController as HomeController;
use EmptyIterator;
use Models\Admin;

class SessionController{


        public function Login(){
            $email = "";
            $studenRepo = new StudentDAO();
            $studentList = $studenRepo->GetAll();
            if($_GET){
                $email = $_GET["email"];
                $i = 0;
                if($email == "admin@admin.com"){
                    /*$loggedAdmin = new Admin();
                    $_SESSION["admin"] = $loggedAdmin;*/
                    header("location:../Views/admin-main.php");
                    echo "Entra al if pero se le canta no mandarte al location";
                }
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