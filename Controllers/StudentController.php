<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use DAO\UserDAO;
    use DAO\StudentAPI as StudentAPI;
    use Exception;
    use Models\Alert;
    use Models\Student as Student;
    use Models\User;

class StudentController
    {
        private $studentDAO;
        private $studentAPI;
        private $userDAO;
        private $alert;

        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
            $this->userDAO = new UserDAO();
            $this->studentAPI = new StudentAPI;
            $this->alert = new Alert("","");
        }


        ////////////////// VIEWS METHODS //////////////////

        public function ShowAddView($validUser)
        {
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowListView()
        {
            try{
                $title = "Lista de alumnos";
                $studentList = $this->studentDAO->GetAll();
                require_once (VIEWS_PATH."header.php");
                require_once(VIEWS_PATH."student-list.php");
            }
            catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage($ex->getMessage());
            }
        }

        public function ShowStudentMain($std){
            $student= $std;
            require_once(VIEWS_PATH."nav-student.php");
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."studentMain.php");
        }

        ////////////////// FUNCTIONAL METHODS //////////////////

        public function Add($userId,$email,$password,$role,$studentId,$careerId,$firstName,$lastName,$dni,$filenumber,$gender,$birthDate,$phoneNumber,$active)
        {
            try{                
                $user = new User($userId,$email,$password,$role);
                $this->userDAO->Add($user);

                $lastUser = $this->userDAO->LastRegister();

                $validUser = $this->userDAO->SearchByEmail($email);

                if(!isset($validUser)){
                    $student = new Student($lastUser->getUserId(),$studentId,$careerId,$firstName,$lastName,$dni,$filenumber,$gender,$birthDate,$phoneNumber,$active);
                    $this->studentDAO->Add($student);
                    
                    $this->alert->setType("success");
                    $this->alert->setMessage("Empresa agregada con exito! Espere validacion de un Administrador");
                }
            }
            catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage($ex->getMessage());
            }
            finally{
                $this->ShowAddView($user);
            }
        }

        public function SearchInAPIByEmail($email){
            return $this->studentAPI->SearchByEmail($email);
        }

        public function Index(){
            //$std = $_SESSION["student"];
            //$title = $std->getFirstName();
            require_once (VIEWS_PATH."nav-student.php");
            require_once(VIEWS_PATH."header.php");
            $this->ShowStudentMain($std);
        }
    }
?>