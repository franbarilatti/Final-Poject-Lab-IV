<?php
    namespace DAO;

    use DAO\IStudentDAO as IStudentDAO;
    use Models\Student as Student;

    class StudentDAO implements IStudentDAO{
    
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

        public function Add(Student $student)
        {
            $this->RetrieveData();
            
            array_push($this->studentList, $student);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->studentList;
        }

        ///////////// JSON Methods /////////////

        private function SaveData()
        {
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
            $this->studentList = array();
            $arrayToDecode = json_decode($resp, true);

            if($resp != null)
            {
                $arrayToDecode = json_decode($resp, true);

                $this->businessList = $this->Mapping($arrayToDecode);

                /*foreach($arrayToDecode as $valuesArray)
                {
                    $student = new Student();
                    $student->setStudentId($valuesArray["studentId"]);
                    $student->setCareerId($valuesArray["careerId"]);
                    $student->setFirstName($valuesArray["firstName"]);
                    $student->setLastName($valuesArray["lastName"]);
                    $student->setDni($valuesArray["dni"]);
                    $student->setFileNumber($valuesArray["fileNumber"]);
                    $student->setGender($valuesArray["gender"]);
                    $student->setBirthDate($valuesArray["birthDate"]);
                    $student->setEmail($valuesArray["email"]);
                    $student->setPhoneNumber($valuesArray["phoneNumber"]);
                    $student->setActive($valuesArray["active"]);

                    array_push($this->studentList, $student);
                }*/
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
}
?>