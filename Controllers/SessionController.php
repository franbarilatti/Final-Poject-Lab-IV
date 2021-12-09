<?php 
    namespace Controllers;

    use DAO\StudentAPI as StudentAPI;
    use Models\Student as Student;
    use Controllers\HomeController as HomeController;
use DAO\BusinessDAO;
use DAO\UserDAO;
    use EmptyIterator;
    use Exception;
    use Models\Alert as Alert;

class SessionController{

    public function ShowLogin(Alert $alert = null){
        require_once(VIEWS_PATH."ingress.php");
    }

    public function Login($email,$password){
        $alert = new Alert("",""); 
        $userRepository = new UserDAO();
        $studenRepo = new StudentAPI;
        $student = $studenRepo->SearchByEmail($email);
        $businessRepo = new BusinessDAO;
        $homeController = new HomeController();
        try{
            $user = $userRepository->searchByEmail($email);
            if(!empty($user)){
                $roleValidation = $user->getRole();
                if($password == $user->getPassword()){
                    $_SESSION['userLogged'] = $user;
                    switch ($roleValidation) {
                        case 'admin':
                            header("location:".FRONT_ROOT."Admin");
                            break;
                        case 'student':
                            
                            $_SESSION["studentId"] = $student->getStudentId();
                            $_SESSION['std'] = $student;
                            
                            header("location:".FRONT_ROOT."Student");
                        case 'company':
                            $business = $businessRepo->SearchByUserId($user->getUserId());
                            if($business->getActive()){
                                header("location:".FRONT_ROOT."Business");
                            }else{
                                $alert->setType("danger");
                                $alert->setMessage("El estado de la empresa se encuentra inactivo");
                                $this->ShowLogin($alert);
                            }
            
                            break;
                        default:
                            echo "Entrando al default";
                            break;
                    }
                }else{
                $alert->setType("danger");
                $alert->setMessage("Email o contraseña incorrectas");
                $this->ShowLogin($alert);
                }
            }else{
                $alert->setType("danger");
                $alert->setMessage("Email o contraseña incorrectas");
                $this->ShowLogin($alert);
            }
        }catch(Exception $ex){
            throw $ex;
        }
    }

    public function Logout(){
            session_destroy();
             header("location:".FRONT_ROOT."index.php");
         }  
}

    


    
