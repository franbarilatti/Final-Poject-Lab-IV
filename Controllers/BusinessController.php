<?php
    namespace Controllers;

    use DAO\BusinessDAO as BusinessDAO;
    use DAO\UserDAO;
    use Exception;
    use Models\Alert;
    use Models\Business as Business;
use Models\User;

class BusinessController
    {
        private $businessDAO;
        private $userDAO;
        private $alert;

        public function __construct()
        {
            $this->businessDAO = new BusinessDAO();
            $this->userDAO = new UserDAO();
            $this->alert = new Alert();
        }


        ////////////////// VIEWS METHODS //////////////////


        public function ShowAddView()
        {
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."business-add.php");
        }

        public function ShowListViewAdmin()
        {
            try{
                $title = "Lista de empresas";
                $businessList = $this->businessDAO->GetAll();
                require_once (VIEWS_PATH."header.php");
                require_once(VIEWS_PATH."business-list-admin.php");
            }catch(Exception $ex){
                throw $ex;
            }
        }

        public function ShowListViewStudent()
        {
            try{
                $title = "Lista de empresas";
                $student = $_SESSION["student"];
                $businessList = $this->businessDAO->GetAll();
                require_once(VIEWS_PATH."header.php");
                require_once(VIEWS_PATH."business-list-student.php");
            }catch(Exception $ex){
                throw $ex;
            }
        }

        public function ShowOneBusiness($businessName){
            try{
                $businessList = $this->businessDAO->SearchByName($businessName);
                require_once(VIEWS_PATH."business-list.php");
            }catch(Exception $ex){
                throw $ex;
            }
        }

        public function ShowModifyView($businessId, $businessName, $employesQuantity, $businessInfo){
            try{
                $business = $this->businessDAO->SearchById($businessId);
                $title = "Modificar ".$business->getBusinessName();
                require_once (VIEWS_PATH."header.php");
                require_once(VIEWS_PATH."business-modify.php");
            }catch(Exception $ex){
                throw $ex;
            }finally{
                $this->ShowModifyView($businessId, $businessName, $employesQuantity, $businessInfo);
            }
            
        }

        public function ShowProfile($businessId){
            try{
                $business = $this->businessDAO->searchById($businessId);
                require_once(VIEWS_PATH."header.php");
                require_once(VIEWS_PATH."business-profile.php");
            }catch(Exception $ex){
                throw $ex;
            }
            
        }


        ////////////////// FUNCTIONAL METHODS //////////////////



        public function DeleteBusiness($businessId){
            

            try{
                $this->businessDAO->Delete($businessId);
                $this->alert->setType("success");
                $this->alert->setMessage("Empresa dada de baja con exito");
            }catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage($ex->getMessage());
            }finally{
                $this->ShowListViewAdmin();
            }
                    
        }

        public function Modify($businessId, $businessName, $employesQuantity, $businessInfo){
            try{
                $this->businessDAO->Modify($businessId, $businessName, $employesQuantity, $businessInfo);
                $this->alert->setType("success");
                $this->alert->setMessage("Empresa modificada con exito");
            }catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage($ex->getMessage());
            }finally{
                $this->ShowListViewAdmin();
            }
            
        }

        public function SearchByNameAdmin($businessName){
            $business = $this->businessDAO->SearchByName($businessName);
            $this->ShowProfile($business->getBusinessId());
        }

        public function SearchByNameStudent($businessName){
            $business = $this->businessDAO->SearchByName($businessName);
            $this->ShowProfile($business->getBusinessId());
        }

        public function PressNameInList($id){
            $business = $this->businessDAO->SearchById($id);
            $this->ShowProfile($id);
        }
        

        public function Add($userId,$email,$password,$role,$businessId,$businessName,$employesQuantity,$businessInfo)
        {   
            try{                
                $user = new User($userId,$email,$password,$role);
                $this->userDAO->Add($user);

                $lastUser = $this->userDAO->LastRegister();

                $business = new Business($lastUser->getUserId(),$businessId,$businessName,$employesQuantity,$businessInfo,false);
                $this->businessDAO->Add($business);
                
                $this->alert->setType("success");
                $this->alert->setMessage("Empresa agregada con exito! Espere validacion de un Administrador");
            }
            catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage($ex->getMessage());
            }
            finally{
                $this->ShowAddView();
            }
            
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