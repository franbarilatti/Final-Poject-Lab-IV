<?php
    namespace DAO;

    use DAO\ICareerDAO as ICareerDAO;
    use Models\Career as Career;

    class CareerDAO implements ICareerDAO{
    
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

        public function Add(Career $career)
        {
            $this->RetrieveData();
            
            array_push($this->careerList, $career);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->careerList;
        }

        ///////////// JSON Methods /////////////

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->careerList as $career)
            {
                $valuesArray["careerId"] = $career->getCareerId();
                $valuesArray["description"] = $career->getDescription();
                $valuesArray["active"] = $career->getActive();
                
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/career.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $resp = curl_exec($this->ch);
            $this->careerList = array();
            $arrayToDecode = json_decode($resp, true);

            if($resp != null)
            {
                $arrayToDecode = json_decode($resp, true);

                $this->careerList = $this->Mapping($arrayToDecode);

                /*foreach($arrayToDecode as $valuesArray)
                {
                    $career = new Career();
                    $career->setCareerId($valuesArray["careerId"]);
                    $career->setDescription($valuesArray["description"]);
                    $career->setActive($valuesArray["active"]);
                    array_push($this->careerList, $career);
                }*/
            }
        }

        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new Career($p['careerId'], $p['description'], $p['active']);
			}, $value);

            return $resp /*count($resp) > 1 ? $resp : $resp['0']*/;
        }
}
?>