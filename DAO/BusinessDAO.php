<?php
    namespace DAO;

    use DAO\IStudentDAO as IStudentDAO;
    use Models\Student as Student;

    class StudentDAO implements IStudentDAO
    {
        private $studentList = array();

        public function Add(Student $student)
        {
            $this->RetrieveData();
            
            array_push($this->studentList, $student);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->studentList;
        }

        /*
            businessId
businessName
employesQuantity
postulationList
businessInfo
jobPositionList

        //////////
        */

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->studentList as $student)
            {
                $valuesArray["businessId"] = $student->getBusinessId();
                $valuesArray["businessName"] = $student->getBusinessName();
                $valuesArray["employesQuantity"] = $student->getEmployesQuantity();
                $valuesArray["postulationList"] = $student->getPostulationList();
                $valuesArray["businessInfo"] = $student->getBusinessInfo();
                $valuesArray["jobPositionList"] = $student->getJobPositionList();
                
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/students.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->studentList = array();

            if(file_exists('Data/students.json'))
            {
                $jsonContent = file_get_contents('Data/students.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $student = new Student();
                    $student->setStudentId($valuesArray["businessId"]);
                    $student->setCareerId($valuesArray["businessName"]);
                    $student->setFirstName($valuesArray["employesQuantity"]);
                    $student->setLastName($valuesArray["postulationList"]);
                    $student->setDni($valuesArray["businessInfo"]);
                    $student->setFileNumber($valuesArray["jobPositionList"]);

                    array_push($this->studentList, $student);
                }
            }
        }
    }
?>