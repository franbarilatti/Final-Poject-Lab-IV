<?php
    namespace DAO;

    use DAO\IJobPositionDAO as IJobPositionDAO;
use Exception;
use Models\JobPosition as JobPosition;

    class JobPositionDAO implements IJobPositionDAO{
    
        private $tableName = "jobPosition";
        private $connection;

        ///////////// Functional Methods /////////////

        public function Add(JobPosition $jobPosition)
        {
            try{
                $query = "INSERT INTO ".$this->tableName." (jobPositionId, careerId, description, active)
                          VALUES (:jobPositionId,:careerId,:description, :active);";

                $parameters['jobPositionId'] = $jobPosition->getJobPositionId();         
                $parameters['careerId'] = $jobPosition->getCareerId();         
                $parameters['description'] = $jobPosition->getDescription();         
                $parameters['active'] = $jobPosition->getActive();         

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query,$parameters);

            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function GetAll()
        {
            
        }

        public function FilterByBusiness($businessId){
            
        }

        public function GetLastId(){
           
        }

        public function Delete($jobPositionId){
           
        }


        public function SearchById($jobPositionId){
           
        }

        public function Modify($jobPositionId, $businessId, $title, $description)
        {
            
        }

        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new JobPosition($p['jobPositionId'],
                                       $p['careerId'],
                                       $p['description'], 
                                       $p['active']);
			}, $value);

            return $resp = count($resp) > 1 ? $resp : $resp['0'];
        }
}
?>