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

        public function __construct(){
            $this->userDAO = new UserDAO();
            $this->studentAPI = new StudentAPI();
        }

        public function ShowUserAddView(Alert $alert= null){
            //echo var_dump($alert);
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."user-add.php");
        }


        
        public function Add($firstName, $lastName, $dni, $filenumber, $gender, $birthDate, $email, $phoneNumber, $password, $validation, $careerId, $userId, $role, $studentId){
            $alert = new Alert("","");
                try{
                    $hashPassword = password_hash($password,PASSWORD_DEFAULT);
                    $user = new User($userId, $email, $hashPassword, $role);
                    $this->userDAO->Add($user);
                    $alert->setType("success");
                    $alert->setMessage("Su usuario creado correctamente");
                }catch(Exception $ex){
                    $alert->setType("danger");
                    $alert->setMessage($ex->getMessage());
                }finally{
                    $_SESSION["user"]= $this->studentAPI->SearchInAPIByEmail($email);
                    $_SESSION["alert"]=$alert;
                    header("location:".VIEWS_PATH."studentMain.php");
                }  
        }
        
        public function Index(){
            require_once(VIEWS_PATH."header.php");
        }


    }
?>