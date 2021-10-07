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

                   header("location:".FRONT_ROOT."Admin/ShowAdminMainView");
                }
                while($i < count($studentList) && ($studentList[$i]->getEmail() != $email )){
                    $i++;
                }
                if($i< count($studentList)){
                    $student = new Student($studentList[$i]->getStudentId(),
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
                    /*$student->setStudentId($studentList[$i]->getStudentId());
                    $student->setCareerId($studentList[$i]->getCareerId());
                    $student->setFirstName($studentList[$i]->getFirstName());
                    $student->setLastName($studentList[$i]->getLastName());
                    $student->setDni($studentList[$i]->getDni());
                    $student->setFileNumber($studentList[$i]->getFileNumber());
                    $student->setGender($studentList[$i]->getGender());
                    $student->setBirthDate($studentList[$i]->getBirthDate());
                    $student->setEmail($studentList[$i]->getEmail());
                    $student->setPhoneNumber($studentList[$i]->getPhoneNumber());
                    $student->setActive($studentList[$i]->getActive());*/
                    $_SESSION["student"] = $student;

                    header("location:".FRONT_ROOT."Student/ShowStudentMain");
                }else{
                    $homeController = new HomeController();
                    $homeController->Index("mail o contraseña incorrectas");
                }
        }

        public function Logout(){
            require_once(FRONT_ROOT."index.php");
        }   
    }

?>