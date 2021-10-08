<?php    
    use DAO\PostulationDAO as PostulationDAO;
    use Models\Postulation as Postulation;

    class PostulationController
    {
        private $postulationDAO;

        public function __construct()
        {
            $this->postulationDAO = new PostulationDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowListView()
        {
            $postulationList = $this->postulationDAO->GetAll();

            require_once(VIEWS_PATH."student-list.php");
        }

        public function ShowStudentMain(){
            require_once(VIEWS_PATH."studentMain.php");
        }

        public function Add($studentId,$businessId,$jobPositionId)
        {
            $postulationId = $this->postulationDAO->GetLastId();
            $postulation = new Postulation($postulationId,$studentId,$businessId,$jobPositionId,true);
            $this->postulationDAO->Add($postulation);

            $this->ShowAddView();
        }
    }
?>