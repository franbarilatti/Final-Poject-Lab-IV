<?php
    namespace DAO;

    use DAO\IPostulationDAO as IPostulationDAO;
    use Models\Postulation as Postulation;

    class PostulationDAO implements IPostulationDAO
    {
        private $postulationList = array();

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

                foreach($arrayToDecode as $valuesArray)
                {
                    $postulation= new Postulation();
                    $postulation->setPostulationId($valuesArray["postulationId"]);
                    $postulation->setStudent($valuesArray["student"]);
                    $postulation->setBusiness($valuesArray["business"]);
                    $postulation->setJobPosition($valuesArray["jobPosition"]);
                    $postulation->setActive($valuesArray["active"]);
                    array_push($this->postulationList, $postulation);
                }
            }
        }
    }
?>