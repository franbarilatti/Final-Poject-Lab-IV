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

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowListView()
        {
            $studentList = $this->studentDAO->GetAll();

            require_once(VIEWS_PATH."student-list.php");
        }

        public function ShowStudentMain(){
            require_once(VIEWS_PATH."studentMain.php");
        }

        public function Add($careerId,$firstName,$lastName,$dni,$fileNumber,$gender,$birthDate,$email,$phoneNumber)
        {
            $studentId = $this->studentDAO->GetLastId();
            $student = new Student($studentId,$careerId,$firstName,$lastName,$dni,$fileNumber,$gender,$birthDate,$email,$phoneNumber,true);
            $this->studentDAO->Add($student);

            $this->ShowAddView();
        }
    }
?>