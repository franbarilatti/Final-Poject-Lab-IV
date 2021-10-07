<?php
    namespace DAO;

    use DAO\IAdminDAO as IAdminDAO;
    use Models\Admin as Admin;

    class AdminDAO implements IAdminDAO
    {
        private $adminList = array();
        

        ///////////// Functional Methods /////////////

        public function Add(Admin $admin)
        {
            $this->RetrieveData();
            
            array_push($this->adminList, $admin);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->adminList;
        }
        

        ///////////// JSON Methods /////////////

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->adminList as $admin)
            {
                $valuesArray["adminId"] = $admin->getAdminId();
                $valuesArray["firstName"] = $admin->getFirstName();
                $valuesArray["lastName"] = $admin->getLastName();
                $valuesArray["email"] = $admin->getEmail();
                
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/admin.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->adminList = array();

            if(file_exists('Data/admin.json'))
            {
                $jsonContent = file_get_contents('Data/admin.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $admin= new Admin();
                    $admin->setAdminId($valuesArray["adminId"]);
                    $admin->setFirstName($valuesArray["firstName"]);
                    $admin->setLastName($valuesArray["lastName"]);
                    $admin->setEmail($valuesArray["email"]);
                    array_push($this->adminList, $admin);
                }
            }
        }
    }
?>