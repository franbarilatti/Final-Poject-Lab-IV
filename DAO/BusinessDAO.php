<?php
    namespace DAO;

    use DAO\IBusinessDAO as IBussinesDAO;
    use Models\Business as Business;
use PDO;

class BusinessDAO implements IBusinessDAO
    {
        private $businessList = array();

        public function Add(Business $business)
        {
            $this->RetrieveData();
            
            array_push($this->businessList, $business);

            $this->SaveData();
        }

        public function Delete($businessId){
            $this->RetrieveData();
            $newList = array();
            foreach($this->businessList as $business){
                if($business->getBusinessId() != $businessId){
                    array_push($newList,$business);
                }
            }
            $this->businessList = $newList;
            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->businessList;
        }

        public function Modify($businessId, $businessName, $employesQuantity, $businessInfo)
        {
            $this->RetrieveData();
            foreach($this->businessList as $business){
                if($business->getBusinessId() == $businessId){
                    $this->Delete($businessId);
                    $business->setBusinessName($businessName);
                    $business->setEmployesQuantity($employesQuantity);
                    $business->setBusinessInfo($businessInfo);
                    array_push($this->businessList,$business);
                }
            }
            $this->SaveData();
        }

        public function SearchByName($businessName){
            $this->RetrieveData();
            foreach($this->businessList as $business){
                if($business->getBusinessName() == $businessName){
                    $findedBusiness = $business;
                }
            }
            return $findedBusiness;
        }

        public function SearchById($businessId){
            $this->RetrieveData();
            $findedBusiness = null;
            foreach($this->businessList as $business){
                if($business->getBusinessId() == $businessId){
                    $findedBusiness = $business;
                }
            }
            return $findedBusiness;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->businessList as $business)
            {
                $valuesArray["businessId"] = $business->getBusinessId();
                $valuesArray["businessName"] = $business->getBusinessName();
                $valuesArray["employesQuantity"] = $business->getEmployesQuantity();
                $valuesArray["postulationList"] = $business->getPostulationList();
                $valuesArray["businessInfo"] = $business->getBusinessInfo();
                $valuesArray["jobPositionList"] = $business->getJobPositionList();
                
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/business.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->businessList = array();

            if(file_exists('Data/business.json'))
            {
                $jsonContent = file_get_contents('Data/business.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $business = new Business();
                    $business->setBusinessId($valuesArray["businessId"]);
                    $business->setBusinessName($valuesArray["businessName"]);
                    $business->setEmployesQuantity($valuesArray["employesQuantity"]);
                    $business->setPostulationList($valuesArray["postulationList"]);
                    $business->setBusinessInfo($valuesArray["businessInfo"]);
                    $business->setJobPositionList($valuesArray["jobPositionList"]);

                    array_push($this->businessList, $business);
                }
            }
        }
    }
?>