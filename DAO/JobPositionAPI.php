<?php
    namespace DAO;

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

        private function RetrieveData()
        {
            $resp = curl_exec($this->ch);
            $this->jobPositionList = array();
            $arrayToDecode = json_decode($resp, true);

            if($resp != null)
            {
                $arrayToDecode = json_decode($resp, true);

                $this->jobPositionList = $this->Mapping($arrayToDecode);
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
}
?>