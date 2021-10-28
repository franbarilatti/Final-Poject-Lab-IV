<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IBusinessDAO as IBussinesDAO;
    use Models\Business as Business;
    use DAO\Connection as Connection;

    class BusinessDAO implements IBusinessDAO
    {
        private $connection;
        private $tableName = "business";

        public function Add(Business $business)
        {
            try
            {
                $validation = "SELECT businessName FROM ".$this->tableName." WHERE businessName = ".$business->getBusinessName();
                $this->connection = Connection::GetInstance();
                $result = $this->connection->Execute($validation);

                if(isset($result)){
                    return "El nombre de esta empresa ya se encuentra registrado";
                }else{
                    $query = "INSERT INTO".$this->tableName." (businessId,businessName,employeQuantity,businessInfo,userId)
                              VALUES (:businessId,:businessName,:employeQuantity,:businessInfo,:userId);";

                    $parameters["businessId"] = $business->getBusinessId();
                    $parameters["businessName"] = $business->getBusinessName();
                    $parameters["employeQuantity"] = $business->getEmployesQuantity();
                    $parameters["businessInfo"] = $business->getBusinessInfo();
                    $parameters["userId"] = $business->getUserId();
                    $this->connection = Connection::GetInstance();

                    $this->connection->ExecuteNonQuery($query,$parameters);

                    return "Empresa agregada con exito";
                }
                

            }
            catch(Exception $ex){
                throw $ex = "Hubo un error al ingresar la empresa";
            }
        }

        public function Delete($businessId){
            try{

                $query = "DELETE FROM ".$this->tableName." WHERE businessId = :businessId";
                
                $parameters['businessId'] = $businessId;

                $this->connection->ExecuteNonQuery($query,$parameters);

                return "Empresa eliminada con exito!";

            }
            catch(Exception $ex){
                throw $ex = "La empresa no ha podido ser eliminada";
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
        
        

        public function Modify($businessId, $businessName, $employesQuantity, $businessInfo)
        {
            try{
                $query = "UPDATE ".$this->tableName.
                         " SET businessName = :businessName,
                           employesQuantity = :employesQuantity,
                           businessInfo =  :businesInfo
                           WHERE businessId = :businessId";
                $this->connection = Connection::GetInstance();
                $parameters["businessName"] = $businessName;
                $parameters["employeQuantity"] = $employesQuantity;
                $parameters["businessInfo"] = $businessInfo;
                $parameters["businessId"] = $businessId;
                
                $this->connection->ExecuteNonQuery($query,$parameters);
            }
            catch(Exception $ex){
                throw $ex;
            }
            
        }


        public function SearchByName($businessName){
            try{
                $query = "SELECT * FROM business b WHERE b.businessName = :businessName";
                
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
                $query = "SELECT * FROM business b WHERE b.businessId = :businessId";

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

        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new Business(
                                   $p['userId'], 
                                   $p['businessId'], 
                                   $p['businessName'], 
                                   $p['employesQuantity'], 
                                   $p['businessInfo'],
                                   $p['active']);
			}, $value);

            return $resp = count($resp) > 1 ? $resp : $resp['0'];
        }
    }
