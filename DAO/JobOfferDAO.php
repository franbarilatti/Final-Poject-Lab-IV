<?php
    namespace DAO;
   
    use Exception;
    use Models\JobOffer as JobOffer;
    use DAO\CareerDAO as CareerDAO;
    use DAO\Connection as Connection;
    use DAO\PostulationDAO as PostulationDAO;
    use Models\Postulation as Postulation;
    use Models\Email as Email;

	


    class JobOfferDAO implements IJobOfferDAO{

        private $connection;
        private $tableName = "jobOffer";




        public function Add(JobOffer $jobOffer)
        {
            $careerDAO = new CareerDAO();
            try{
                
                $query = "INSERT INTO " . $this->tableName . " VALUES (DEFAULT,:title,:description,:postingDate,:expiryDate,:businessId,:careerId,:jobPositionId,:flyer)";
                $parameters['title'] = $jobOffer->getTitle();
                $parameters['description'] = $jobOffer->getDescription();
                $parameters['postingDate'] = $jobOffer->getPostingDate();
                $parameters['expiryDate'] = $jobOffer->getExpiryDate();
                $parameters['businessId'] = $jobOffer->getBusinessId();
                $parameters['careerId'] = $jobOffer->getCareerId();
                $parameters['jobPositionId'] = $jobOffer->getJobPositionId();
                $parameters['flyer'] = $jobOffer->getFlyer();
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query,$parameters);
            }catch(Exception $ex){
                throw $ex;
            }
        }

        public function Delete($jobOfferId)
        {
            try{
                $postulationDAO = new PostulationDAO();

                $userIdList = $postulationDAO->UserIdByJobOffer($jobOfferId);

                $postulationDAO->DeleteMessage($userIdList[0]);
                
                $query = "DELETE FROM ". $this->tableName. "  WHERE jobOfferId = :jobOfferId";

                $parameters["jobOfferId"] = $jobOfferId;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query,$parameters);

            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function Modify($jobOfferId,$title,$description,$expiryDate)
        { 
            try{
                $query = "UPDATE ".$this->tableName.
                         " SET title = :title,
                           description = :description,
                           expiryDate =  :expiryDate
                           WHERE jobOfferId = :jobOfferId";
                $this->connection = Connection::GetInstance();
                $parameters["title"] = $title;
                $parameters["description"] = $description;
                $parameters["expiryDate"] = $expiryDate;
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
                $query = "SELECT * FROM ". $this->tableName. "  WHERE jobOfferId = :jobOfferId";

                $parameters['jobOfferId'] = $jobOfferId;

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query,$parameters);
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

       public function CheckExpiryDate(){
            try{
                $today= date("Y-m-d");
                $jobOfferList = $this->GetAll();
                foreach($jobOfferList as $jobOffer){
                    if($jobOffer->getExpiryDate() <= $today ){
                       $this->Delete($jobOffer->getJobOfferId());
                    }
                }
            }catch(Exception $ex){
                throw $ex;
            }
            
        }



        protected function Mapping($value){
            $value = is_array($value) ? $value : [];

            $resp = array_map(function($p){
            return new JobOffer(
                                $p['jobOfferId'], 
                                $p['title'], 
                                $p['description'], 
                                $p['postingDate'],
                                $p['expiryDate'],
                                $p['businessId'], 
                                $p['careerId'], 
                                $p['jobPositionId'],
                                $p['flyer']);
                               
            }, $value);

            return $resp;
        }
    }
    
    


?>