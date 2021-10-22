<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;

    class StudentController
    {
        private $studentDAO;

        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
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

        public function Add($careerId,$firstName,$lastName,$dni,$gender,$birthDate,$email,$password,$phoneNumber)
        {
            $studentId = $this->studentDAO->GetLastId();
            $student = new Student($studentId,$careerId,$firstName,$lastName,$dni,$gender,$birthDate,$email,$password,$phoneNumber);
            $this->studentDAO->Add($student);

            $this->ShowAddView();
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