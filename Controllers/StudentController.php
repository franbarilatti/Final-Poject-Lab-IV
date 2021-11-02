<?php

namespace Controllers;

use DAO\CareerAPI;
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
    private $careerAPI;
    private $studentAPI;
    private $userDAO;
    private $alert;

    public function __construct()
    {
        $this->studentDAO = new StudentDAO();
        $this->careerAPI = new CareerAPI();
        $this->userDAO = new UserDAO();
        $this->studentAPI = new StudentAPI;
        $this->alert = new Alert("", "");
    }


    ////////////////// VIEWS METHODS //////////////////

    public function ShowAddView($validUser)
    {
        require_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH . "student-add.php");
    }

    public function RegisterView(Alert $alert = null)
    {
        require_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH . "user-add.php");
    }

    public function RegisterForm()
    {
        $email = $_SESSION["email"];
        $student = $this->SearchInAPIByEmail($email);
        $career = $this->careerAPI->SearchById($student->getCareerId());
        require_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH . "student-register.php");
    }

    public function ShowListView()
    {
        try {
            $title = "Lista de alumnos";
            $studentList = $this->studentAPI->GetAll();
            require_once(VIEWS_PATH . "header.php");
            require_once(VIEWS_PATH . "student-list.php");
        } catch (Exception $ex) {
            $this->alert->setType("danger");
            $this->alert->setMessage($ex->getMessage());
        }
    }

    public function ShowStudentMain()
    {
        require_once(VIEWS_PATH . "nav-student.php");
        require_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH . "studentMain.php");
    }

    ////////////////// FUNCTIONAL METHODS //////////////////


    public function SearchInAPIByEmail($email)
    {
        return $this->studentAPI->SearchByEmail($email);
    }



    public function Index()
    {
        $this->ShowStudentMain();
    }
}
