<?php    
    namespace Controllers;
    use DAO\PostulationDAO as PostulationDAO;
    use Models\Postulation as Postulation;

    class PostulationController
    {
        private $postulationDAO;

        public function __construct()
        {
            $this->postulationDAO = new PostulationDAO();
        }

        ////////////////// VIEWS METHODS //////////////////

        public function ShowAddView()
        {
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowListView()
        {
            $postulationList = $this->postulationDAO->GetAll();
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."student-list.php");
        }

        public function ShowPostulatiobByStudent($studentId){
            
            $postulationList = $this->postulationDAO->FilterByStudent($studentId);
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."student-postulation.php");
        }

        ////////////////// FUNCTIONAL METHODS //////////////////

        public function Add($studentId,$businessId,$jobPositionId)
        {
            $postulationId = $this->postulationDAO->GetLastId();
            $postulation = new Postulation($postulationId,$studentId,$businessId,$jobPositionId,true);
            $this->postulationDAO->Add($postulation);
            header("location:".FRONT_ROOT."Student");

        }

        public function Index(){
            $title = "Lista de Postulaciones";
            $this->ShowListView();
        }
    }
?>