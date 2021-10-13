<?php
    namespace DAO;

    use DAO\IPostulationDAO as IPostulationDAO;
    use Models\Postulation as Postulation;

    class PostulationDAO implements IPostulationDAO
    {
        private $postulationList = array();

        ///////////// Functional Methods /////////////

        public function Add(Postulation $postulation)
        {
            $this->RetrieveData();
            
            array_push($this->postulationList, $postulation);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->postulationList;
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


        public function GetLastId(){
            $this->RetrieveData();
            $idSerched = null;
            if(empty($this->postulationList)){
                $idSerched = 1;
            }else{
                $lastPostulation = array_pop($this->postulationList);
                $idSerched = $lastPostulation->getJobPositionId() + 1;
            }
            return $idSerched;
        }

        ///////////// JSON Methods /////////////

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->postulationList as $postulation)
            {
                $valuesArray["postulationId"] = $postulation->getPostulationId();
                $valuesArray["studentId"] = $postulation->getStudentId();
                $valuesArray["businessId"] = $postulation->getBusinessId();
                $valuesArray["jobPositionId"] = $postulation->getJobPositionId();
                $valuesArray["active"] = $postulation->getActive();
                
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/postulation.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->postulationList = array();

            if(file_exists('Data/postulation.json'))
            {
                $jsonContent = file_get_contents('Data/postulation.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                $this->postulationList = $this->Mapping($arrayToDecode);

            }
        }

        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new Postulation($p['postulationId'],
                                       $p['studentId'],
                                       $p['businessId'], 
                                       $p['jobPositionId'], 
                                       $p['active']);
			}, $value);

            return $resp /*count($resp) > 1 ? $resp : $resp['0']*/;
        }
    }

?>