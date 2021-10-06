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

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."business-add.php");
        }

        public function ShowListView()
        {
            $businessList = $this->businessDAO->GetAll();

            require_once(VIEWS_PATH."business-list.php");
        }

        public function ShowOneBusiness($businessName){
            $businessList = $this->businessDAO->GetAll();
            foreach($businessList as $business){
                if($business->getBusinessName() == $businessName){
                    require_once(VIEWS_PATH."business-list.php");
                }
            }
        }

        public function DeleteBusiness($businessId){
            $this->businessDAO->Delete($businessId);
            echo "<script> if(confirm('La empresa ha sido eliminada'));";
            echo "</script>";
            $this->ShowListView();
        }

        public function Modify($businessId, $businessName, $employesQuantity, $businessInfo){
            $this->businessDAO->Modify($businessId, $businessName, $employesQuantity, $businessInfo);
            echo "<script> if(confirm('La empresa ha sido eliminada'));";
            echo "</script>";
            $this->ShowListView();
        }
        public function ShowModifyView($businessId, $businessName, $employesQuantity, $businessInfo){
            $business = new Business();
            $business->setBusinessId($businessId);
            $business->setBusinessName($businessName);
            $business->setEmployesQuantity($employesQuantity);
            $business->setBusinessInfo($businessInfo);
            $_SESSION["business"] = $businessId;
            require_once(VIEWS_PATH."business-modify.php");
        }

        public function Add($businessName,$employesQuantity,$businessInfo)
        {
            $business = new Business();
            $business->setBusinessName($businessName);
            $business->setEmployesQuantity($employesQuantity);
            $business->setBusinessInfo($businessInfo);
            $this->businessDAO->Add($business);
            echo "<script> if(confirm('empresa cargada con exito'));";
            echo "</script>";
            $this->ShowAddView();
        }
    }

?>