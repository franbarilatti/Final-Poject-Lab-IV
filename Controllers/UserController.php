<?php 
    namespace Controllers;

    use DAO\UserDAO  as UserDAO;
    use Models\User as User;
    use Models\Alert as Alert;
    use DAO\StudentAPI as StudentAPI;
    use Models\Student as Student;
    use Models\Email as Email;
    use Exception;

    class UserController{

        private $userDAO;
        private $studentAPI;
        private $studentController;

        public function __construct(){
            $this->userDAO = new UserDAO();
            $this->studentAPI = new StudentAPI();
            $this->studentController = new StudentController();
        }

        public function ShowUserAddView(Alert $alert= null){
            //echo var_dump($alert);
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."user-add.php");
        }


        
        public function Add($email,$password, $validation,$userId, $role,){
            $alert = new Alert("","");
            
            if($password == $validation){
                

                if(!$this->userDAO->isInDataBase($email)){
                    $user = new User($userId, $email, $password, $role);

                    try{
                        $user = new User($userId, $email, $password, $role);
                        $this->userDAO->Add($user);
                        $alert->setType("success");
                        $alert->setMessage("Su usuario creado correctamente");
                        header("location:".FRONT_ROOT."index.php");
                    }catch(Exception $ex){
                        $alert->setType("danger");
                        $alert->setMessage($ex->getMessage());
                    }  
                }else{
                    $alert->setType("danger");
                    $alert->setMessage("El email ingresado ya se encuentra registrado. Por favor intente con otro");
                    $this->ShowUserAddView($alert);
                }
                
            }else{
                $alert->setType("danger");
                $alert->setMessage("Las contraseñas no coinciden");
                $this->studentController->RegisterForm($alert);
            }
            

        }
        
        public function Index(){
            require_once(VIEWS_PATH."header.php");
        }


    }
