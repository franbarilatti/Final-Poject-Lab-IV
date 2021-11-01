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

    public function RegisterForm($email,Alert $alert = null)
    {
        $student = $this->SearchInAPIByEmail($email);
        $user = $this->userDAO->SearchByEmail($email);
        $career = $this->careerAPI->SearchById($student->getCareerId());
        echo "Id del estudiante:  " . $student->getStudentId();
        require_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH . "student-register.php");
    }

    public function ShowListView()
    {
        try {
            $title = "Lista de alumnos";
            $studentList = $this->studentDAO->GetAll();
            require_once(VIEWS_PATH . "header.php");
            require_once(VIEWS_PATH . "student-list.php");
        } catch (Exception $ex) {
            $this->alert->setType("danger");
            $this->alert->setMessage($ex->getMessage());
        }
    }

    public function ShowStudentMain($std)
    {
        $student = $std;
        require_once(VIEWS_PATH . "nav-student.php");
        require_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH . "studentMain.php");
    }

    ////////////////// FUNCTIONAL METHODS //////////////////

    public function Add($firstName, $lastName, $dni, $filenumber, $gender, $birthDate, $email, $phoneNumber, $password, $validation, $careerId, $userId, $role, $studentId)
    {
        try {
            if ($this->validatePasswords($password, $validation)) {
                $user = new User($userId, $email, $password, $role);
                var_dump($user);
                $this->userDAO->Add($user);

                $lastUser = $this->userDAO->LastRegister();

                var_dump($lastUser);

                $validUser = $this->userDAO->SearchByEmail($email);

                var_dump($validUser);

                if (!isset($validUser)) {
                    echo "El usuario fue validado";
                    $student = new Student($lastUser->getUserId(), $studentId, $careerId, $firstName, $lastName, $dni, $filenumber, $gender, $birthDate, $phoneNumber, true);
                    var_dump($student);
                    $this->studentDAO->Add($student);
                    $this->alert->setType("success");
                    $this->alert->setMessage("Registro exitoso. Bienvenido!");
                } else {
                    echo "El usuario no fue validado";
                    $this->alert->setType("danger");
                    $this->alert->setMessage("Su email no se encuentra registrado como un alumno de la UTN. por favor vuelva a intentar");
                }
            } else {
                $this->alert->setType("danger");
                $this->alert->setMessage("Las contraseñas no coinciden");
            }
        } catch (Exception $ex) {
            $this->alert->setType("danger");
            $this->alert->setMessage($ex->getMessage());
        } finally {
            require_once(VIEWS_PATH . "student-profile.php");
        }
    }

    public function SearchInAPIByEmail($email)
    {
        return $this->studentAPI->SearchByEmail($email);
    }

    public function validatePasswords($pswrd1, $pswrd2)
    {
        if ($pswrd1 == $pswrd2) {
            return true;
        } else {
            return false;
        }
    }

    public function Index()
    {
        //$std = $_SESSION["student"];
        //$title = $std->getFirstName();
        require_once(VIEWS_PATH . "nav-student.php");
        require_once(VIEWS_PATH . "header.php");
        $this->ShowStudentMain($std);
    }
}
