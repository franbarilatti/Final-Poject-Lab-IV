<?php
    namespace DAO;

use Exception;
use Models\Student as Student;


    class StudentAPI{
    
        private $studentList = array();
        private $ch;
        private $url;
        private $header;
        

        public function __construct(){
            $this->ch = curl_init();
            $this->url = "https://utn-students-api.herokuapp.com/api/Student";
            $this->header = array("x-api-key: 4f3bceed-50ba-4461-a910-518598664c08");
            curl_setopt($this->ch,CURLOPT_URL,$this->url);
            curl_setopt($this->ch,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($this->ch,CURLOPT_HTTPHEADER,$this->header);
        }


        ///////////// Functional Methods /////////////

        public function UpdateDB(){
            $this->DeleteJSON();
            $this->RetrieveData();
            $this->SaveData();
        }

        public function GetAll(){
            $this->RetrieveData();
            return $this->studentList;
        }

        private function SaveData(){
            
            $arrayToEncode = array();

            foreach($this->studentList as $student)
            {
                $valuesArray["studentId"] = $student->getStudentId();
                $valuesArray["careerId"] = $student->getCareerId();
                $valuesArray["firstName"] = $student->getFirstName();
                $valuesArray["lastName"] = $student->getLastName();
                $valuesArray["dni"] = $student->getDni();
                $valuesArray["fileNumber"] = $student->getFileNumber();
                $valuesArray["gender"] = $student->getGender();
                $valuesArray["birthDate"] = $student->getBirthDate();
                $valuesArray["email"] = $student->getEmail();
                $valuesArray["phoneNumber"] = $student->getPhoneNumber();
                $valuesArray["active"] = $student->getActive();
                
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/students.json', $jsonContent);

        }


        private function RetrieveData()
        {
            $resp = curl_exec($this->ch);
            $this->jobPositionList = array();

            if($resp){
                $arrayToDecode = json_decode($resp,true);

                if(!$arrayToDecode){
                    $filePath = $this->GetJsonFilePath();
                    if(file_exists($filePath)){
                        $jsonContent = file_get_contents($filePath);
                        $arrayToDecode = ($jsonContent) ? json_decode($jsonContent,true) : array();
                    }
                }
            }
            $this->studentList = $this->Mapping($arrayToDecode);
        }

        public function SearchByEmail($email){
            $this->RetrieveData();
            $i=0;
            while($i<count($this->studentList) && $this->studentList[$i]->getEmail()!=$email){
                $i++;
               
            }
            if($i < count($this->studentList)){
                return $this->studentList[$i];
            }else{
                return null;
            }
        }

        public function DeleteJSON(){
            try{
                $fileContent = file_get_contents('Data/students.json');
                $jsonContent = json_decode($fileContent,true);
                if(!empty($jsonContent)){
                    for($i = 0; $i < count($jsonContent);$i++){
                        unset($jsonContent[$i]);
                    }
                }
            }catch(Exception $ex){
                throw $ex;
            }
        }


        public function GetActiveStudents(){
            $validList = array();
            $this->RetrieveData();
            foreach($this->studentList as $student){
                if($student->getActive() == true){
                    array_push($validList,$student);
                }
            }
            return $validList;
        }
        
        public function SearchByStudent($email){
            $validList = $this->GetActiveStudents();
            foreach($this->studentList as $student){
                if($student->getEmail() == $email){
                    $findedStudent = $student;
                }
            }
            return $findedStudent;
        }

        public function ValidateStudent($email){
            $validList = $this->GetActiveStudents();            
            $i=0;
            while($i<count($validList) && $validList[$i]->getEmail()!=$email){
            
                $i++;
            }
            if($i<=count($validList)){
                return true;
            }else{
                return false;
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

            return $resp /*count($resp) > 1 ? $resp : $resp['0']*/;
        }

        function GetJsonFilePath(){

            $initialPath = "Data/students.json";
            
            if(file_exists($initialPath)){
                $jsonFilePath = $initialPath;
            }else{
                $jsonFilePath = "../".$initialPath;
            }
    
            return $jsonFilePath;
        }
}
?>