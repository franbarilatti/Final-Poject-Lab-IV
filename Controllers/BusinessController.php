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

        public function ShowListViewStudent()
        {
            $businessList = $this->businessDAO->GetAll();
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

        public function ShowProfile(){
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
            $_SESSION['business'] = $this->businessDAO->SearchByName($businessName);
            $this->ShowProfile();
        }

        public function PressNameInList($id){
            $_SESSION['business'] = $this->businessDAO->SearchById($id);
            $this->ShowProfile();
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

    }

?>