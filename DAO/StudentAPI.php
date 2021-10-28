<?php
    namespace DAO;

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

        public function GetAll(){
            $this->RetrieveData();
            return $this->studentList;
        }

        private function RetrieveData()
        {
            $resp = curl_exec($this->ch);
            $this->studentList = array();
            $arrayToDecode = json_decode($resp, true);

            if($resp != null)
            {
                $arrayToDecode = json_decode($resp, true);

                $this->studentList = $this->Mapping($arrayToDecode);
            }
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