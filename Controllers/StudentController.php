<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use DAO\UserDAO;
use Exception;
use Models\Alert;
    use Models\Student as Student;
use Models\User;

class StudentController
    {
        private $studentDAO;
        private $userDAO;
        private $alert;

        public function __construct()
        {
            $this->businessDAO = new StudentDAO();
            $this->userDAO = new UserDAO();
            $this->alert = new Alert();
        }


        ////////////////// VIEWS METHODS //////////////////

        public function ShowAddView($role)
        {
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowListView()
        {
            $title = "Lista de alumnos";
            $studentList = $this->studentDAO->GetAll();
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."student-list.php");
        }

        public function ShowStudentMain($std){
            $student= $std;
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."studentMain.php");
        }

        ////////////////// FUNCTIONAL METHODS //////////////////

        public function Add($userId,$email,$password,$role,$studentId,$careerId,$firstName,$lastName,$dni,$gender,$birthDate,$phoneNumber,$active)
        {
            try{                
                $user = new User($userId,$email,$password,$role);
                $this->userDAO->Add($user);

                $lastUser = $this->userDAO->LastRegister();

                $student = new Student($lastUser->getUserId(),$studentId,$careerId,$firstName,$lastName,$dni,$gender,$birthDate,$phoneNumber,true);
                $this->studentDAO->Add($student);
                
                $this->alert->setType("success");
                $this->alert->setMessage("Empresa agregada con exito! Espere validacion de un Administrador");
            }
            catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage($ex->getMessage());
            }
            finally{
                $this->ShowAddView();
            }
        }

        public function Index(){
            $std = $_SESSION["student"];
            $title = $std->getFirstName();
            require_once (VIEWS_PATH."nav-student.php");
            require_once(VIEWS_PATH."header.php");
            $this->ShowStudentMain($std);
        }
    }
?>