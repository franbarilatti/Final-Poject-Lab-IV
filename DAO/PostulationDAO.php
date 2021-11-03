<?php
    namespace DAO;

    use DAO\IPostulationDAO as IPostulationDAO;
    use Models\Postulation as Postulation;
    use Models\JobOffer as JobOffer;

    class PostulationDAO implements IPostulationDAO
    {
        private $postulationList = array();
        private $connection;
        private $tableName = "postulation";


        ///////////// Functional Methods /////////////

        public function Add(Postulation $Postulation)
        {
            $careerDAO = new CareerDAO();
            try{
                
                $query = "INSERT INTO " . $this->tableName . " VALUES (DEFAULT,:studentId,:businessId,:jobOfferId,:active)";
                $parameters['studentId'] = $Postulation->getStudentId();
                $parameters['businessId'] = $Postulation->getBusinessId();
                $parameters['jobOfferId'] = $Postulation->getJobOfferId();
                $parameters['active'] = $Postulation->getActive();
           
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query,$parameters);
            }catch(Exception $ex){
                throw $ex;
            }
        }

        public function GetAll()
        {
            try {
                $postulationList = array();

                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);
                $postulationList = $this->Mapping($result);

                return $postulationList;
            } catch (Exception $ex) {
                throw $ex;
            }
        }

        public function delete($postulationId){
            $this->RetrieveData();
            $newList = array();
            foreach($this->postulationList as $postulation){
                if($postulation->getPostulationId() != $postulationId){
                    array_push($newList,$postulation);
                }
            }
            $this->postulationList = $newList;
            $this->SaveData();
        }


        public function FilterById($postulationId){
            $this->RetrieveData();
            $findedList = array();
            foreach($this->postulationList as $postulation){
                if($postulation->getPostulationId() == $postulationId){
                    array_push($findedList,$postulation);
                }
            }
            return $findedList;
        }

        public function FilterByStudent($studenId){
            $this->RetrieveData();
            $findedList = array();
            foreach($this->postulationList as $postulation){
                if($postulation->getStudentId() == $studenId){
                    array_push($findedList,$postulation);
                }
            }
            return $findedList;
        }

        public function FilterByBusiness($businessId){
            $this->RetrieveData();
            $findedList = array();
            foreach($this->postulationList as $postulation){
                if($postulation->getBusinessId() == $businessId){
                    array_push($findedList,$postulation);
                }
            }
            return $findedList;
        }

        public function FilterByJobPosition($jobPositionId){
            $this->RetrieveData();
            $findedList = array();
            foreach($this->postulationList as $postulation){
                if($postulation->getPostulationId() == $jobPositionId){
                    array_push($findedList,$postulation);
                }
            }
            return $findedList;
        }


    

        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new Postulation($p['studentId'],
                                       $p['businessId'], 
                                       $p['jobOfferId'], 
                                       $p['active']);
			}, $value);

            return $resp /*count($resp) > 1 ? $resp : $resp['0']*/;
        }
    }

?>