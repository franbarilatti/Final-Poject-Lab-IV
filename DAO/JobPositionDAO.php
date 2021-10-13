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

        public function FilterByBusiness($businessId){
            $this->RetrieveData();
            $findedList = array();
            foreach($this->jobPositionList as $jobPosition){
                if($jobPosition->getBusinessId() == $businessId){
                    array_push($findedList,$jobPosition);
                }
            }
            return $findedList;
        }

        public function GetLastId(){
            $this->RetrieveData();
            $idSerched = null;
            if(empty($this->jobPositionList)){
                $idSerched = 1;
            }else{
                $lastJobPosition = array_pop($this->jobPositionList);
                $idSerched = $lastJobPosition->getJobPositionId() + 1;
            }
            return $idSerched;
        }

        public function Delete($jobPositionId){
            $this->RetrieveData();
            $newList = array();
            foreach($this->jobPositionList as $jobPosition){
                if($jobPosition->getJobPositionId() != $jobPositionId){
                    array_push($newList,$jobPosition);
                }
            }
            $this->jobPositionList = $newList;
            $this->SaveData();
        }


        public function SearchById($jobPositionId){
            $this->RetrieveData();
            $findedjobPosition = null;
            foreach($this->jobPositionList as $jobPosition){
                if($jobPosition->getBusinessId() == $jobPositionId){
                    $findedjobPosition = $jobPosition;
                }
            }
            return $findedjobPosition;
        }

        public function Modify($jobPositionId, $businessId, $title, $description)
        {
            $this->RetrieveData();
            
            foreach($this->jobPositionList as $jobPosition){
                if($jobPosition->getJobPositionId() == $jobPositionId){
                    $this->Delete($jobPositionId);
                    $newJobPosition = new JobPosition($jobPositionId,$businessId,$title,$description,true);
                    array_push($this->jobPositionList,$newJobPosition);
                }
            }
            sort($this->jobPositionList);
            $this->SaveData();
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
            }
        }

        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new JobPosition($p['jobPositionId'],
                                       $p['businessId'],
                                       $p['title'],
                                       $p['description'], 
                                       $p['active']);
			}, $value);

            return $resp /*count($resp) > 1 ? $resp : $resp['0']*/;
        }
}
?>