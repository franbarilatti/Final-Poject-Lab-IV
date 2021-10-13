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

        ////////////////// VIEWS METHODS //////////////////

        public function ShowAddView($businessId)
        {
            require_once (VIEWS_PATH."header.php");
            $businessId;
            require_once(VIEWS_PATH."jobPosition-add.php");
        }

        public function ShowListViewStudent($studentId,$businessId)
        {   
            require_once (VIEWS_PATH."header.php");
            $jobPositionList = $this->jobPositionDAO->FilterByBusiness($businessId);
            require_once(VIEWS_PATH."jobPosition-list-student.php");
        }

        public function ShowListViewAdmin($businessId)
        {   
            require_once (VIEWS_PATH."header.php");
            $jobPositionList = $this->jobPositionDAO->FilterByBusiness($businessId);

            require_once(VIEWS_PATH."jobPosition-list-admin.php");
        }

        public function ShowModifyView($jobPositionId){
            $finded = $this->jobPositionDAO->SearchById($jobPositionId);
            require_once (VIEWS_PATH."header.php");
            require_once (VIEWS_PATH."jobPosition-modify.php");
        }

        ////////////////// FUNCTIONAL METHODS //////////////////

        public function Add($businessId,$title,$description)
        {   
            require_once (VIEWS_PATH."header.php");
            $jobPositionId = $this->jobPositionDAO->GetLastId();
            $jobPosition = new JobPosition($jobPositionId,$businessId,$title,$description,true);

            $this->jobPositionDAO->Add($jobPosition);
            $this->ShowAddView($businessId);
        }

        public function Delete($jobPositionId){
            $finded = $this->jobPositionDAO->SearchById($jobPositionId);
            $this->jobPositionDAO->Delete($jobPositionId);
            $this->ShowListViewAdmin($jobPositionId);
        }

        public function Modify($jobPositionId, $businessId, $title, $description){
            $finded = $this->jobPositionDAO->SearchById($jobPositionId);
            $this->jobPositionDAO->Modify($jobPositionId, $businessId, $title, $description);
            $this->ShowListViewAdmin($jobPositionId);
        }
    }
?>