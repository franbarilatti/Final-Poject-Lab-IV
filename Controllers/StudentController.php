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

        public function Add($careerId,$firstName,$lastName,$dni,$fileNumber,$gender,$birthDate,$email,$phoneNumber,$active)
        {

            $studentList = $this->studentDAO->GetAll();
            $lastStudent = array_pop($studentList);
            $studentId = $lastStudent->getStudentId() + 1;
            $student = new Student($studentId,$careerId,$firstName,$lastName,$dni,$fileNumber,$gender,$birthDate,$email,$phoneNumber,$active);
            $this->studentDAO->Add($student);

            $this->ShowAddView();
        }
    }
?>