<?php 
    namespace Controllers;

    use DAO\UserDAO  as UserDAO;
    use Models\User as User;
    use Models\Alert as Alert;
    use DAO\StudentAPI as StudentAPI;
    use Models\Student as Student;
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


        
        public function Add($firstName, $lastName, $dni, $filenumber, $gender, $birthDate, $email, $phoneNumber, $password, $validation, $careerId, $userId, $role, $studentId){
            $alert = new Alert("","");
            
            if($password == $validation){
                $hashPassword = password_hash($password,PASSWORD_DEFAULT);

            if(!$this->userDAO->isInDataBase($email)){
                $user = new User($userId, $email, $hashPassword, $role);
                try{
                    $this->userDAO->Add($user);
                    $alert->setType("success");
                    $alert->setMessage("Usuario creado correctamente");
                    if($user->getRole() == "student"){
                        if($this->studentAPI->ValidateStudent($email)){
                            session_start();
                            $_SESSION['loggedUser'] = new Student($studentId,$careerId,$firstName,$lastName,$dni,$filenumber,$gender,$birthDate,$email,$phoneNumber,true);
                            header("location:".FRONT_ROOT."Student");
                        }
                    }
                }catch(Exception $ex){
                    $alert->setType("danger");
                    $alert->setMessage($ex->getMessage());
                }finally{
                    $this->ShowUserAddView($alert);
                }  
            }else{
                $alert->setType("danger");
                $alert->setMessage("El email ingresado ya se encuentra registrado. Por favor intente con otro");
                $this->ShowUserAddView($alert);
            }
            }else{
                $alert->setType("danger");
                $alert->setMessage("El email ingresado ya se encuentra registrado. Por favor intente con otro");
                $this->studentController->RegisterForm($alert);
            }
            
        }
        

        public function Index(){
            require_once(VIEWS_PATH."header.php");
        }


    }
