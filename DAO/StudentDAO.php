<?php
    namespace DAO;

use Exception;
use Models\Student;

class StudentDAO implements IStudentDAO{


        private $studentList = array();
        private $fileName;
        private $connection;

        public function __construct()
        {
            $this->fileName = dirname(__DIR__)."/Data/students.json";
        }
        

        public function GetAll()
        {
            $this->RetrieveData();
            return $this->studentList;   
        }

        public function RetrieveData(){

            if(file_exists($this->fileName)){
                $jsonContent = file_get_contents($this->fileName);
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
                foreach($arrayToDecode as $value){

                    $student = new Student($value['studentId'],$value['careerId'],$value['firstName'],$value['lastName'],$value['dni'],$value['fileNumber'],$value['gender'],$value['birthDate'],$value['email'],$value['phoneNumber'],$value['active']);
                    array_push($this->studentList,$student);
                }
            }
        }
            
        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new Student($p['studentId'], 
                                   $p['careerId'], 
                                   $p['firstName'], 
                                   $p['lastName'],
                                   $p['dni'],
                                   $p['fileNumber'],
                                   $p['gender'],
                                   $p['birthDate'],
                                   $p['email'],
                                   $p['phoneNumber'],
                                   $p['active']);
			}, $value);

            return $resp = count($resp) > 1 ? $resp : $resp['0'];
        }

    }



?>