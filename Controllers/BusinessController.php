<?php
    namespace Controllers;

    use DAO\BusinessDAO as BusinessDAO;
    use Models\Business as Business;

    class BusinessController
    {
        private $businessDAO;

        public function __construct()
        {
            $this->businessDAO = new BusinessDAO();
        }


        ////////////////// VIEWS METHODS //////////////////


        public function ShowAddView()
        {
            require_once(VIEWS_PATH."business-add.php");
        }

        public function ShowListViewAdmin()
        {
            $businessList = $this->businessDAO->GetAll();
            require_once(VIEWS_PATH."business-list-admin.php");
        }

        public function ShowListViewStudent($studenId)
        {
            $studenId = $studenId;
            $businessList = $this->businessDAO->GetAll();
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."business-list-student.php");
        }

        public function ShowOneBusiness($businessName){
            $businessList = $this->businessDAO->SearchByName($businessName);
            require_once(VIEWS_PATH."business-list.php");
        }

        public function ShowModifyView($businessId, $businessName, $employesQuantity, $businessInfo){
            $business = new Business($businessId,$businessName,$employesQuantity,$businessInfo);
            $_SESSION["business"] = $business;
            require_once(VIEWS_PATH."business-modify.php");
        }

        public function ShowProfile($businessId){
            $business = $this->businessDAO->searchById($businessId);
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."business-profile.php");
        }


        ////////////////// FUNCTIONAL METHODS //////////////////



        public function DeleteBusiness($businessId){
            $this->businessDAO->Delete($businessId);
            echo "<script> if(confirm('La empresa ha sido eliminada'));";
            echo "</script>";
            $this->ShowListViewAdmin();
        }

        public function Modify($businessId, $businessName, $employesQuantity, $businessInfo){
            $this->businessDAO->Modify($businessId, $businessName, $employesQuantity, $businessInfo);
            echo "<script> if(confirm('La empresa ha sido modificada'));";
            echo "</script>";
            $this->ShowListViewAdmin();
        }

        public function SearchByName($businessName){
            $business = $this->businessDAO->SearchByName($businessName);
            $this->ShowProfile($business->getBusinessId());
        }

        public function PressNameInList($id){
            $business = $this->businessDAO->SearchById($id);
            $this->ShowProfile($id);
        }
        

        public function Add($businessName,$employesQuantity,$businessInfo)
        {   
            $businessId = $this->businessDAO->GetLastId();
            $business = new Business($businessId,$businessName,$employesQuantity,$businessInfo);
            $this->businessDAO->Add($business);
            echo "<script> if(confirm('empresa cargada con exito'));";
            echo "</script>";
            $this->ShowAddView();
        }
        
        public function Index($opcion){
            if($opcion=="add"){
                $title= "Agregar empresa";
                require_once (VIEWS_PATH."header.php");
                $this->ShowAddView();
            }else{
                $title= "Lista de empresas";
                require_once (VIEWS_PATH."header.php");
                $this->ShowListViewAdmin();
            }
            
            //$this->ShowAdminMainView();
        }

    }

?>