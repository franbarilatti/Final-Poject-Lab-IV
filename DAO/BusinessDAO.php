<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IBusinessDAO as IBussinesDAO;
    use Models\Business as Business;
    use DAO\Connection as Connection;

class BusinessDAO implements IBusinessDAO
    {
        private $conecction;
        private $tablename = "business";

        public function Add(Business $business)
        {
            try
            {
                
                $query = "INSERT INTO".$this->tablename."(id,businessName,employeQuantity,businessInfo,email);";

                $parameters["id"] = $business->getBusinessId();
                $parameters["businessName"] = $business->getBusinessName();
                $parameters["employeQuantity"] = $business->getEmployesQuantity();
                $parameters["businessInfo"] = $business->getBusinessInfo();
                $parameters["email"] = $business->getEmail();

                $this->conecction = Connection::GetInstance();

                $this->conecction->ExecuteNonQuery($query,$parameters);

            }
            catch(Exception $ex){
                throw $ex
            }
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
            try {
                $businessList = array();

                $query = "SELECT * FROM ".$this->tablename;
                $this->conecction = Connection::GetInstance();

                $result = $this->conecction->Execute($query);

                foreach($result)


            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        
        

        public function Modify($businessId, $businessName, $employesQuantity, $businessInfo)
        {
            $this->RetrieveData();
            
            foreach($this->businessList as $business){
                if($business->getBusinessId() == $businessId){
                    $this->Delete($businessId);
                    $newBusiness = new Business($businessId,$businessName,$employesQuantity,$businessInfo);
                    array_push($this->businessList,$newBusiness);
                }
            }
            sort($this->businessList);
            $this->SaveData();
        }

        public function GetLastId(){
            $this->RetrieveData();
            $idSerched = null;
            if(empty($this->businessList)){
                $idSerched = 1;
            }else{
                $lastBusiness = array_pop($this->businessList);
                $idSerched = $lastBusiness->getBusinessId() + 1;
            }
            return $idSerched;
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

        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new Business($p['businessId'], 
                                   $p['businessName'], 
                                   $p['employesQuantity'], 
                                   $p['businessInfo'],
                                   $p['dni'],
                                   $p['fileNumber'],
                                   $p['gender'],
                                   $p['birthDate'],
                                   $p['email'],
                                   $p['password'],
                                   $p['phoneNumber'],
                                   $p['active']);
			}, $value);

            return $resp /*count($resp) > 1 ? $resp : $resp['0']*/;
        }
    }
?>