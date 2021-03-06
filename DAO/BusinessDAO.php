<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IBusinessDAO as IBussinesDAO;
    use Models\Business as Business;
    use DAO\Connection as Connection;

    class BusinessDAO implements IBussinesDAO
    {
        private $connection;
        private $tableName = "business";

        public function Add(Business $business)
        {
            $businessName = $business->getBusinessName();
            try
            {
                $validation = "SELECT businessName FROM ".$this->tableName." WHERE businessName = '$businessName'";
                $parameters['businessName'] = $business->getBusinessName();
                $this->connection = Connection::GetInstance();
                $result = $this->connection->Execute($validation);
                if($result != null){
                    return $result;
                }else{
                    $query = "INSERT INTO ". $this->tableName."(businessId, businessName, employesQuantity, businessInfo, adress, active,userId) VALUES (DEFAULT,:businessName,:employeQuantity,:businessInfo,:adress,:active,:userId);";
                    $parameters["businessName"] = $business->getBusinessName();
                    $parameters["employeQuantity"] = $business->getEmployesQuantity();
                    $parameters["businessInfo"] = $business->getBusinessInfo();
                    $parameters["adress"] = $business->getAdress();
                    $parameters["active"] = $business->getActive();
                    $parameters["userId"] = $business->getUserId();
                    $this->connection = Connection::GetInstance();
                    $this->connection->ExecuteNonQuery($query,$parameters);
                    return null;
                }

            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function Delete($businessId){
            try{

                $query = "DELETE FROM ".$this->tableName." WHERE businessId = :businessId";
                
                $parameters['businessId'] = $businessId;

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query,$parameters);

            }
            catch(Exception $ex){
                throw $ex ;
            }
        }

        public function GetAll()
        {
            try {
                $businessList = array();

                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);
                $businessList = $this->Mapping($result);
                
                return $businessList;
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        
        

        public function Modify($businessId, $businessName, $employesQuantity, $businessInfo,$adress)
        {
            try{
                $query = "UPDATE ".$this->tableName.
                         " SET businessName = '$businessName',
                           employesQuantity = '$employesQuantity',
                           businessInfo =  '$businessInfo',
                           adress = '$adress'
                           WHERE businessId = $businessId";
                $this->connection = Connection::GetInstance();

                $this->connection = Connection::GetInstance();
                
                $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex){
                throw $ex;
            }
            
        }


        public function SearchByName($businessName){
            try{
                $query = "SELECT * FROM business  WHERE businessName = :businessName";
                
                $parameters['businessName'] = $businessName;

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query,$parameters);
                $finded = $this->Mapping($result);
                return $finded;
            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function SearchById($businessId){
            try{
                $query = "SELECT * FROM business  WHERE businessId = :businessId";

                $parameters['businessId'] = $businessId;

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query,$parameters);
                $finded = $this->Mapping($result);
                return $finded;
            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function SearchByUserId($userId){
            try{
                $query = "SELECT * FROM ".$this->tableName." WHERE userId = :userId";

                $parameters['userId'] = $userId;

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query,$parameters);
                $finded = $this->Mapping($result);
                return $finded;
            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function Deregister($id){

            try{
                $query = "UPDATE $this->tableName SET active = :active WHERE businessId = :id;";

                $parameters['id'] = $id;
                $parameters['active'] = false; 
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query,$parameters);

            }
            catch(Exception $ex){
                throw $ex;
            }

        }

        public function Release($id){
            try{
                $query = "UPDATE $this->tableName SET active = :active WHERE businessId = :id;";

                $parameters['id'] = $id;
                $parameters['active'] = true; 
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query,$parameters);
            }
            catch(Exception $ex){
                throw $ex;
            }
        }


        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new Business($p['userId'],
                                   $p['businessId'], 
                                   $p['businessName'], 
                                   $p['employesQuantity'],
                                   $p['businessInfo'],
                                   $p['adress'],
                                   $p['active']);
			}, $value);
            return $resp = count($resp) > 1 ? $resp : $resp['0'];
        }
    }
