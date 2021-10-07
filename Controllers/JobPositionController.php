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
            $jobPositionList = $this->jobPositionDAO->FilterById($idBusiness);
            require_once(VIEWS_PATH."jobPosition-list-student.php");
        }

        public function Add($idBusiness,$title,$description)
        {   
            $jobPositionList = $this->JobPositionDAO->GetAll();
            $lastJobPosition = array_pop($jobPositionList);
            $jobPositionId = $lastJobPosition->getStudentId() + 1;
            $jobPosition = new JobPosition($jobPositionId,$idBusiness,$title,$description,true);
            $jobPosition->setJobPositionId(count($this->jobPositionDAO->GetAll())+1);
            $jobPosition->setBusinessId($idBusiness);
            $jobPosition->setTitle($title);
            $jobPosition->setDescription($description);

            $this->jobPositionDAO->Add($jobPosition);
            $this->ShowAddView($idBusiness);
        }
    }
?>