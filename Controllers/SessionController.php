<?php 
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;

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
                    $student->setFirstName($studentList[$i]->getFirstName());
                    $student->setLastName($studentList[$i]->getLastName());
                    $student->setDni($studentList[$i]->getDni());
                    $student->setGender($studentList[$i]->getGender());
                    $_SESSION["student"] = $student;
                    var_dump($_SESSION["student"]);
                }
            }
        }
    }


?>