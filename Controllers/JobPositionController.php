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

        public function ShowAddView()
        {
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

        public function Add($title,$description)
        {
            $jobPosition = new JobPosition();
            $jobPosition->setTitle($title);
            $jobPosition->setDescription($description);

            $this->jobPositionDAO->Add($jobPosition);
            $this->ShowAddView();
        }
    }
?>