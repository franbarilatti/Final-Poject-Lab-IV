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
                
                $query = "INSERT INTO".$this->tablename."(DEFAULT,businessName,employeQuantity,businessInfo,userId);";

                $parameters["businessName"] = $business->getBusinessName();
                $parameters["employeQuantity"] = $business->getEmployesQuantity();
                $parameters["businessInfo"] = $business->getBusinessInfo();
                $parameters["userId"] = $business->getUserId();
                $this->conecction = Connection::GetInstance();

                $this->conecction->ExecuteNonQuery($query,$parameters);

            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function Delete($businessId){
            $newList = array();
            foreach($this->businessList as $business){
                if($business->getBusinessId() != $businessId){
                    array_push($newList,$business);
                }
            }
            $this->businessList = $newList;
        }

        public function GetAll()
        {
            try {
                $businessList = array();

                $query = "SELECT * FROM ".$this->tablename;
                $queryID = "SELECT password FROM users u ON ".$this->tablename." b WHERE u.id = b.userId";
                $this->conecction = Connection::GetInstance();

                $result = $this->conecction->Execute($query);

                $businessList = $this->Mapping($result);


            } catch (Exception $ex) {
                throw $ex;
            }
        }
        
        

        public function Modify($businessId, $businessName, $employesQuantity, $businessInfo)
        {
            
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
                                   $p['userId'], 
                                   $p['businessName'], 
                                   $p['employesQuantity'], 
                                   $p['businessInfo']);
			}, $value);

            return $resp = count($resp) > 1 ? $resp : $resp['0'];
        }
    }
?>