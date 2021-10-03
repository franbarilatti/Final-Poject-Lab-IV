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

        public function Add($businessId,$businessName,$employesQuantity,$postulationList,$businessInfo,$jobPositionList)
        {
            $business = new Business();
            $business->setBusinessId($businessId);
            $business->setBusinessName($businessName);
            $business->setEmployesQuantity($employesQuantity);
            $business->setPostulationList($postulationList);
            $business->setBusinessInfo($businessInfo);
            $business->setJobPositionList($jobPositionList);

            $this->businessDAO->Add($business);

            $this->ShowAddView();
        }
    }

?>