<?php 
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;
    use Controllers\HomeController as HomeController;
    use DAO\UserDAO;
    use EmptyIterator;
    use Exception;

class SessionController{

    public function Login($email,$password){
        $userRepository = new UserDAO();
        echo "mail del post= $email <br>";
        echo " contra del post= $password<br>";
        try{
            $user = $userRepository->searchByEmail($email);
<<<<<<< HEAD
            $passValidation = $user->getPassword();
           $roleValidation = $user->getRole();
           echo "mail del user= ".$user->getEmail() ."<br>";
           echo "contra del user= ".$user->getPassword() ."<br>";
            if($passValidation == $password){
                switch ($roleValidation) {
                    case 'admin':
                        require_once(VIEWS_PATH."admin-main.php");
                        break;
                    case 'student':
                        echo "hola";
                        require_once(VIEWS_PATH."studentMain.php");
                        break;
                    case 'business':
                        require_once(VIEWS_PATH."business-main.php");
                        break;
                    default:
                        # code...
                        break;
                }
            }else{
                $homeController = new HomeController();
                $homeController->Index("mail o contraseña incorrectas");
            }
=======
            var_dump($user);
             $passValidation = $user->getPassword();
             $roleValidation = $user->getRole();
             if($passValidation === $password){
                 switch ($roleValidation) {
                     case 'admin':
                         require_once(VIEWS_PATH."admin-main.php");
                         break;
                     case 'student':
                         require_once(VIEWS_PATH."studentMain.php");
                         break;
                     default:
                         echo "Entrando al default";
                         break;
                 }
             }else{
                 $homeController = new HomeController();
                 $homeController->Index("mail o contraseña incorrectas");
             }
>>>>>>> origin/main

        }
        catch(Exception $ex){
           throw $ex;
        }
    }
}


        ////////////////// FUNCTIONAL METHODS //////////////////

        


        // public function Login($email){
            
        //     $studenRepo = new StudentDAO();
        //     $studentList = $studenRepo->GetAll();
        //         $i = 0;
        //         if($email == "admin@admin.com"){

        //             //require_once(VIEWS_PATH."admin-main.php");
        //            header("location:".FRONT_ROOT."Admin");
        //         }
        //         while($i < count($studentList) && ($studentList[$i]->getEmail() != $email )){
        //             $i++;
        //         }
        //         if($i< count($studentList)){
        //             $std = new Student($studentList[$i]->getStudentId(),
        //                                    $studentList[$i]->getCareerId(),
        //                                    $studentList[$i]->getFirstName(),
        //                                    $studentList[$i]->getLastName(),
        //                                    $studentList[$i]->getDni(),
        //                                    $studentList[$i]->getFileNumber(),
        //                                    $studentList[$i]->getGender(),
        //                                    $studentList[$i]->getBirthDate(),
        //                                    $studentList[$i]->getEmail(),
        //                                    $studentList[$i]->getPhoneNumber(),
        //                                    $studentList[$i]->getActive());
        //             $_SESSION["student"]=$std;
        //             header("location:".FRONT_ROOT."Student");
        //         }else{
        //             $homeController = new HomeController();
        //             $homeController->Index("mail o contraseña incorrectas");
        //         }
        // }

        // public function Logout(){
        //     header("location: ../index.php");
        // }   


?>