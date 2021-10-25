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

        public function __construct(){
            $this->userDAO = new UserDAO();
        }

        public function ShowUserAddView($role, Alert $alert= null){
            //echo var_dump($alert);
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."user-add.php");
        }


        public function Add($email, $password, $role){
            $alert = new Alert("","");
            $user = new User;
            try{
                    
                $user->setEmail($email);
                $user->setPassword($password);
                $user->setRole($role);
                $this->userDAO->Add($user);
                $alert->setType("success");
                $alert->setMessage("Usuario creado correctamente");
                }catch(Exception $ex){
                   
                    $alert->setType("danger");
                    $alert->setMessage("Error al cargar el usuario");
                }finally{
                    $this->ShowUserAddView($role,$alert);
                }
                
        }

        public function RegisterControl($email, $password, $role){
            $alert = new Alert("","");
            $studentApi = new StudentApi();
            $studentList = $studentApi->GetAll();
            $i=0;
            while ($i < count($studentList) && ($studentList[$i]->getEmail() != $email)) {
                $i++;
            }
            if($i<count($studentList)){
                $this->Add($email, $password, $role);
            }else{
                $alert->settype("danger");
                $alert->setMessage("El email ingresado no corresponde a un alumno de la UTN");
                $this-> ShowUserAddView($role, $alert) ;

            }
        }

        public function Index(){
            require_once(VIEWS_PATH."header.php");
        }


    }
?>