<?php
    namespace DAO;

    use DAO\IJobPositionDAO as IJobPositionDAO;
    use Models\JobPosition as JobPosition;

    class JobPositionDAO implements IJobPositionDAO{
    
        private $jobPositionList = array();

        ///////////// Functional Methods /////////////

        public function Add(JobPosition $jobPosition)
        {
            $this->RetrieveData();
            
            array_push($this->jobPositionList, $jobPosition);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();
            
            return $this->jobPositionList;
        }

        public function FilterById($businessId){
            $findedList = array();
            foreach($this->jobPositionList as $jobPosition){
                if($jobPosition->getBusinessId() == $businessId){
                    array_push($findedList,$jobPosition);
                }
            }
            return $findedList;
        }



        ///////////// JSON Methods /////////////

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->jobPositionList as $jobPosition)
            {
                $valuesArray["jobPositionId"] = $jobPosition->getJobPositionId();
                $valuesArray["businessId"] = $jobPosition->getBusinessId();
                $valuesArray["title"] = $jobPosition->getTitle();
                $valuesArray["description"] = $jobPosition->getDescription();
                $valuesArray["active"] = $jobPosition->getActive();
                
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/jobPosition.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->jobPositionList = array();

            if(file_exists('Data/jobPosition.json'))
            {
                $jsonContent = file_get_contents('Data/jobPosition.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                $this->jobPositionList = $this->Mapping($arrayToDecode);
                /*foreach($arrayToDecode as $valuesArray)
                {
                    $jobPosition = new JobPosition();
                    $jobPosition->setJobPositionId($valuesArray["jobPositionId"]);
                    $jobPosition->setBusinessId($valuesArray["businesId"]);
                    $jobPosition->setTitle($valuesArray["title"]);
                    $jobPosition->setDescription($valuesArray["description"]);
                    $jobPosition->setActive($valuesArray["active"]);
                    array_push($this->jobPositionList, $jobPosition);
                }*/
            }
        }

        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new JobPosition($p['jobPositionId'],
                                    $p['businesId'],
                                    $p['title'],
                                    $p['description'], 
                                    $p['active']);
			}, $value);

            return $resp /*count($resp) > 1 ? $resp : $resp['0']*/;
        }
}
?>