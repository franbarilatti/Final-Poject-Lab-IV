<?php
    namespace DAO;

    use DAO\ICareerDAO as ICareerDAO;
use Exception;
use Models\Career as Career;

    class CareerAPI{
    
        private $careerList = array();
        private $ch;
        private $url;
        private $header;

        public function __construct(){
            $this->ch = curl_init();
            $this->url = "https://utn-students-api.herokuapp.com/api/Career";
            $this->header = array("x-api-key: 4f3bceed-50ba-4461-a910-518598664c08");
            curl_setopt($this->ch,CURLOPT_URL,$this->url);
            curl_setopt($this->ch,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($this->ch,CURLOPT_HTTPHEADER,$this->header);
        }

        ///////////// Functional Methods /////////////

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->careerList;
        }

        public function UpdateDB(){
            $this->DeleteJSON();
            $this->RetrieveData();
            $this->SaveData();
        }

        ///////////// JSON Methods /////////////

        private function SaveData(){
            
            $arrayToEncode = array();

            foreach($this->careerList as $career)
            {
                $valuesArray["careerId"] = $career->getCareerId();
                $valuesArray["description"] = $career->getDescription();
                $valuesArray["active"] = $career->getActive();
                
                
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/careers.json', $jsonContent);

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
            $this->careerList = $this->Mapping($arrayToDecode);
        }

        public function SearchByID($id){
            $this->RetrieveData();
            $i=0;
            while($i<count($this->careerList) && $this->careerList[$i]->getCareerId()!=$id){
                $i++;
            }
            if($i < count($this->careerList)){
                return $this->careerList[$i];
            }else{
                return null;
            }
        }

        public function DeleteJSON(){
            try{
                $fileContent = file_get_contents('Data/careers.json');
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

        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new Career($p['careerId'], $p['description'], $p['active']);
			}, $value);

            return $resp /*count($resp) > 1 ? $resp : $resp['0']*/;
        }

        function GetJsonFilePath(){

            $initialPath = "Data/careers.json";
            
            if(file_exists($initialPath)){
                $jsonFilePath = $initialPath;
            }else{
                $jsonFilePath = "../".$initialPath;
            }
    
            return $jsonFilePath;
        }
}
?>