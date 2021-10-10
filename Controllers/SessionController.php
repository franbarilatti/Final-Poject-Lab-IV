<?php 
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;
    use Controllers\HomeController as HomeController;
use EmptyIterator;

class SessionController{


        public function Login($email){
            
            $studenRepo = new StudentDAO();
            $studentList = $studenRepo->GetAll();
                $i = 0;
                if($email == "admin@admin.com"){

                    //require_once(VIEWS_PATH."admin-main.php");
                   header("location:".FRONT_ROOT."Admin");
                }
                while($i < count($studentList) && ($studentList[$i]->getEmail() != $email )){
                    $i++;
                }
                if($i< count($studentList)){
                    $std = new Student($studentList[$i]->getStudentId(),
                                           $studentList[$i]->getCareerId(),
                                           $studentList[$i]->getFirstName(),
                                           $studentList[$i]->getLastName(),
                                           $studentList[$i]->getDni(),
                                           $studentList[$i]->getFileNumber(),
                                           $studentList[$i]->getGender(),
                                           $studentList[$i]->getBirthDate(),
                                           $studentList[$i]->getEmail(),
                                           $studentList[$i]->getPhoneNumber(),
                                           $studentList[$i]->getActive());
                    $_SESSION["student"]=$std;
                    header("location:".FRONT_ROOT."Student");
                }else{
                    $homeController = new HomeController();
                    $homeController->Index("mail o contraseña incorrectas");
                }
        }

        public function Logout(){
            header("location: ../index.php");
        }   
    }

?>