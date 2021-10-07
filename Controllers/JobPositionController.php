<?php
    namespace Controllers;

    use DAO\JobPositionDAO as JobPositionDAO;
    use Models\JobPosition as JobPosition;

    class JobPositionController
    {
        private $jobPositionDAO;

        public function __construct()
        {
            $this->jobPositionDAO = new JobPositionDAO();
        }

        public function ShowAddView($idBusiness)
        {
            $_SESSION['idBusiness'] = $idBusiness;
            require_once(VIEWS_PATH."jobPosition-add.php");
        }

        public function ShowListViewStudent($idBusiness)
        {   
            $finded = array();
            foreach ($this->jobPositionDAO as $jobPosition) {
                if ($jobPosition->getBusinessId() == $idBusiness) {
                    array_push($finded,$jobPosition);
                }
            }
            $_SESSION['finded'] = $finded;
            require_once(VIEWS_PATH."jobPosition-list-student.php");
        }

        public function Add($idBusiness,$title,$description)
        {
            $jobPosition = new JobPosition();
            $jobPosition->setJobPositionId(count($this->jobPositionDAO->GetAll())+1);
            $jobPosition->setBusinessId($idBusiness);
            $jobPosition->setTitle($title);
            $jobPosition->setDescription($description);

            $this->jobPositionDAO->Add($jobPosition);
            $this->ShowAddView($idBusiness);
        }
    }
?>