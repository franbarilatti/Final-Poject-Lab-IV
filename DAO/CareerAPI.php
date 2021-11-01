<?php
    namespace DAO;

    use DAO\ICareerDAO as ICareerDAO;
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

        ///////////// JSON Methods /////////////


        private function RetrieveData()
        {
            $resp = curl_exec($this->ch);
            $this->careerList = array();
            $arrayToDecode = json_decode($resp, true);

            if($resp != null)
            {
                $arrayToDecode = json_decode($resp, true);

                $this->careerList = $this->Mapping($arrayToDecode);
            }
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

        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new Career($p['careerId'], $p['description'], $p['active']);
			}, $value);

            return $resp /*count($resp) > 1 ? $resp : $resp['0']*/;
        }
}
?>