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

        ///////////// JSON Methods /////////////

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->postulationList as $postulation)
            {
                $valuesArray["postulationId"] = $postulation->getPostulationId();
                $valuesArray["student"] = $postulation->getStudent();
                $valuesArray["business"] = $postulation->getBusiness();
                $valuesArray["jobPosition"] = $postulation->getJobPosition();
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
                                    $p['student'],
                                    $p['business'], 
                                    $p['jobPosition'], 
                                    $p['active']);
			}, $value);

            return $resp /*count($resp) > 1 ? $resp : $resp['0']*/;
        }
    }

?>