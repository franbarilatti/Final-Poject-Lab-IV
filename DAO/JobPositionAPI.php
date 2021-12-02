<?php
    namespace DAO;

use Exception;
use Models\JobPosition as JobPosition;


    class JobPositionAPI{
    
        private $jobPositionList = array();
        private $ch;
        private $url;
        private $header;
        

        public function __construct(){
            $this->ch = curl_init();
            $this->url = "https://utn-students-api.herokuapp.com/api/JobPosition";
            $this->header = array("x-api-key: 4f3bceed-50ba-4461-a910-518598664c08");
            curl_setopt($this->ch,CURLOPT_URL,$this->url);
            curl_setopt($this->ch,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($this->ch,CURLOPT_HTTPHEADER,$this->header);
        }


        ///////////// Functional Methods /////////////

        public function GetAll(){
            $this->RetrieveData();
            return $this->jobPositionList;
        }

        public function UpdateDB(){
            $this->DeleteJSON();
            $this->RetrieveData();
            $this->SaveData();
        }
        private function SaveData(){
            
            $arrayToEncode = array();

            foreach($this->jobPositionList as $jobPosition)
            {
                $valuesArray["jobPositionId"] = $jobPosition->getJobPositionId();
                $valuesArray["careerId"] = $jobPosition->getCareerId();
                $valuesArray["description"] = $jobPosition->getDescription();
                
                
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/jobPositions.json', $jsonContent);

        }
        public function DeleteJSON(){
            try{
                $fileContent = file_get_contents('Data/jobPositions.json');
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
            $this->jobPositionList = $this->Mapping($arrayToDecode);
        }

        public function SearchById($Id){
            $this->RetrieveData();
            $i=0;
            while($i<count($this->jobPositionList) && $this->jobPositionList[$i]->getJobPositionId()!=$Id){
                $i++;
            }
            if($i < count($this->jobPositionList)){
                return $this->jobPositionList[$i];
            }else{
                return null;
            }
        }


        
        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new JobPosition($p['jobPositionId'],
                                   $p['careerId'], 
                                   $p['description']);
			}, $value);

            return $resp /*count($resp) > 1 ? $resp : $resp['0']*/;
        }
        
        function GetJsonFilePath(){

            $initialPath = "Data/jobPositions.json";
            
            if(file_exists($initialPath)){
                $jsonFilePath = $initialPath;
            }else{
                $jsonFilePath = "../".$initialPath;
            }
    
            return $jsonFilePath;
        }
}
