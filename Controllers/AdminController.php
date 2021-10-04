<?php
    namespace Controllers;

    use DAO\AdminDAO as AdminDAO;
    use Models\Admin as Admin;

    class AdminController
    {
        private $adminDAO;

        public function __construct()
        {
            $this->adminDAO = new AdminDAO();
        }

        public function ShowAdminMainView(){
            require_once(VIEWS_PATH."admin-main.php");
        }

        

        /*public function Add($businessName,$employesQuantity,$businessInfo)
        {
            $business = new Business();
            $business->setBusinessName($businessName);
            $business->setEmployesQuantity($employesQuantity);
            $business->setBusinessInfo($businessInfo);
            $this->businessDAO->Add($business);
            echo "<script> if(confirm('empresa cargada con exito'));";
            echo "</script>";
            $this->ShowAddView();
        }*/
    }

?>