<?php

namespace Controllers;

use DAO\CareerAPI as CareerAPI;
use DAO\StudentDAO as StudentDAO;
use DAO\UserDAO as UserDAO;
use DAO\StudentAPI as StudentAPI;
use Exception;
use Models\Alert as Alert;
use PDF\FPDF as FPDF;
use Models\Student as Student;
use Models\User as User;

class StudentController
{
    private $studentDAO;
    private $studentList = array();
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
           // var_dump($studentList);
            require_once(VIEWS_PATH . "header.php");
            require_once(VIEWS_PATH . "student-list.php");
        } catch (Exception $ex) {
            $this->alert->setType("danger");
            $this->alert->setMessage($ex->getMessage());
        }
    }

    public function ShowStudentMain(Alert $alert=null)
    {
        require_once(VIEWS_PATH . "nav-student.php");
        require_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH . "student-main.php");
    }

    ////////////////// FUNCTIONAL METHODS //////////////////


    public function SearchInAPIByEmail($email)
    {
        return $this->studentAPI->SearchByEmail($email);
    }

    public function PrintPDF(){
        $studentList = $_SESSION['studentList'];
        //var_dump($studentList);
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,10, utf8_decode('Lista de postulantes'),0,0,'C');
        $pdf->Ln(10);
        $pdf->Cell(26,10, utf8_decode('Id Estudiante'),1,0,'C');
        $pdf->Cell(20,10, utf8_decode('Id Carrera'),1,0,'C');
        $pdf->Cell(30,10, utf8_decode('Nombre'),1,0,'C');
        $pdf->Cell(30,10, utf8_decode('Apellido'),1,0,'C');
        $pdf->Cell(20,10, utf8_decode('DNI'),1,0,'C');
        $pdf->Cell(20,10, utf8_decode('Legajo'),1,0,'C');
        $pdf->Cell(20,10, utf8_decode('Email'),1,0,'C');
        $pdf->Cell(20,10, utf8_decode('Telefono'),1,0,'C');
        $pdf->ln();
        foreach($studentList as $student){

           
            $pdf->Cell(26,10, utf8_decode($student->getStudentId()),1,0,'C');
            
        }
       
        $pdf->Output();


    }

    public function Index()
    {
        $this->ShowStudentMain();
    }
}
