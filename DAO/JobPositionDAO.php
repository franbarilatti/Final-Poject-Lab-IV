<?php
    namespace DAO;

    use DAO\IJobPositionDAO as IJobPositionDAO;
    use Models\JobPosition as JobPosition;

    class JobPositionDAO implements IJobPositionDAO{
    
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

        /*
            $title
$description
$active
        */

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->jobPositionList as $jobPosition)
            {
                $valuesArray["jobPositionId"] = $jobPosition->getJobPositionId();
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
            $resp = curl_exec($this->ch);
            $this->jobPositionList = array();
            $arrayToDecode = json_decode($resp, true);

            if($resp != null)
            {
                $arrayToDecode = json_decode($resp, true);

                foreach($arrayToDecode as $valuesArray)
                {
                    $jobPosition = new JobPosition();
                    $jobPosition->setJobPositionId($valuesArray["jobPositionId"]);
                    $jobPosition->setTitle($valuesArray["title"]);
                    $jobPosition->setDescription($valuesArray["description"]);
                    $jobPosition->setActive($valuesArray["active"]);
                    array_push($this->jobPositionList, $jobPosition);
                }
            }
        }
}
?>