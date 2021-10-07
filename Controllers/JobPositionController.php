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

        public function ShowListView()
        {
            $jobPositionList = $this->jobPositionDAO->GetAll();

            require_once(VIEWS_PATH."student-list.php");
        }

        public function ShowJobPositionMain(){
            require_once(VIEWS_PATH."studentMain.php");
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