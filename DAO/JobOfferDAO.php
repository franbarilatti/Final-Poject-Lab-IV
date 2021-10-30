<?php
    namespace DAO;

use Exception;
use Models\JobOffer as JobOffer;

    class JobOfferDAO implements IJobOfferDAO{

        private $connection;
        private $tableName = "jobOffer";




        public function Add(JobOffer $jobOffer)
        {
            try{
                
                $query = "INSERT INTO ".$this->tableName." (businessId,careerId,jobPositionId,jobOfferId,title,description,postingDate,expiryDate)
                          VALUES (:businessId,:careerId,:jobPositionId,:jobOfferId,:title,:description,:postingDate,:expiryDate)";
                $parameters['businessId'] = $jobOffer->getBusinessId();
                $parameters['careerId'] = $jobOffer->getCareerId();
                $parameters['jobPositionId'] = $jobOffer->getJobPositionId();
                $parameters['jobOfferId'] = $jobOffer->getJobOfferId();
                $parameters['title'] = $jobOffer->getTitle();
                $parameters['description'] = $jobOffer->getDescription();
                $parameters['postingDate'] = $jobOffer->getPostingDate();
                $parameters['expiryDate'] = $jobOffer->getExpiryDate();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query,$parameters);

                return "Se a agregado una nueva oferta de trabajo con exito";

            }catch(Exception $ex){
                throw $ex = "Hubo un error al ingresar la oferta de trabajo";
            }
        }

        public function Delete($jobOfferId)
        {
            try{

                $query = "DELETE FROM ".$this->tableName." WHERE jobOfferId = :jobOfferId";
                
                $parameters['jobOfferId'] = $jobOfferId;

                $this->connection->ExecuteNonQuery($query,$parameters);

                return "Oferta de trabajo eliminada con exito!";

            }
            catch(Exception $ex){
                throw $ex = "La oferta de trabajo no ha podido ser eliminada";
            }
        }

        public function Modify($jobOfferId,$title,$description,$expirateDate)
        {
            try{
                $query = "UPDATE ".$this->tableName.
                         " SET title = :title,
                           description = :description,
                           expirateDate =  :expirateDate
                           WHERE jobOfferId = :jobOfferId";
                $this->connection = Connection::GetInstance();
                $parameters["title"] = $title;
                $parameters["description"] = $description;
                $parameters["expirateDate"] = $expirateDate;
                $parameters["jobOfferId"] = $jobOfferId;
                
                $this->connection->ExecuteNonQuery($query,$parameters);
            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function GetAll()
        {
            try {
                $jobOfferList = array();

                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);
                $jobOfferList = $this->Mapping($result);

                return $jobOfferList;
            } catch (Exception $ex) {
                throw $ex;
            }
        }


        public function SearchById($jobOfferId){
            try{
                $query = "SELECT * FROM ".$this->tableName." j WHERE j.jobOfferId = :jobOfferId";

                $parameters['jobOfferId'] = $jobOfferId;

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);
                $finded = $this->Mapping($result);
                return $finded;
            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function SearchByTitle($title){
            try{
                $query = "SELECT * FROM ".$this->tableName." j WHERE j.title = :title";

                $parameters['title'] = $title;

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);
                $finded = $this->Mapping($result);
                return $finded;
            }
            catch(Exception $ex){
                throw $ex;
            }
        }



        public function FilterByBusiness($businessId){
            try{
                $query = "SELECT * FROM ".$this->tableName." j WHERE j.businessId = :businessId";

                $parameters['businessId'] = $businessId;

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);
                $findedList = $this->Mapping($result);
                return $findedList;
            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function FilterByCareer($careerId){
            try{
                $query = "SELECT * FROM ".$this->tableName." j WHERE j.careerId = :careerId";

                $parameters['careerId'] = $careerId;

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);
                $findedList = $this->Mapping($result);
                return $findedList;
            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function FilterByJobPosition($jobPositionId){
            try{
                $query = "SELECT * FROM ".$this->tableName." j WHERE j.jobPositionId = :jobPositionId";

                $parameters['jobPositionId'] = $jobPositionId;

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);
                $findedList = $this->Mapping($result);
                return $findedList;
            }
            catch(Exception $ex){
                throw $ex;
            }
        }



        protected function Mapping($value){
            $value = is_array($value) ? $value : [];

            $resp = array_map(function($p){
            return new JobOffer(
                               $p['businessId'], 
                               $p['careerId'], 
                               $p['jobPositionId'], 
                               $p['jobOfferId'], 
                               $p['title'], 
                               $p['description'], 
                               $p['postingDate'],
                               $p['expiryDate']);
            }, $value);

            return $resp = count($resp) > 1 ? $resp : $resp['0'];
        }
    }
    
    


?>