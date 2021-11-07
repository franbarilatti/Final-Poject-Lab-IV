<?php
    namespace Controllers;

    use DAO\BusinessDAO as BusinessDAO;
    use DAO\UserDAO;
    use Exception;
    use Models\Alert as Alert;
    use Models\Business as Business;
    use Models\User;
use PDOException;

class BusinessController{
        private $businessDAO;
        private $userDAO;
        private $alert;

        public function __construct()
        {
            $this->businessDAO = new BusinessDAO();
            $this->userDAO = new UserDAO();
            $this->alert = new Alert("","");
        }


        ////////////////// VIEWS METHODS //////////////////


        public function ShowAddView(Alert $alert=null)
        {
            require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."business-add.php");
        }

        public function ShowListViewAdmin(Alert $alert=null)
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
                //$student = $_SESSION["student"];
                $businessList = $this->businessDAO->GetAll();
                require_once(VIEWS_PATH."header.php");
                require_once(VIEWS_PATH."business-list-student.php");
            }catch(Exception $ex){
                throw $ex;
            }
        }

        public function ShowSerchedList($name){
            $businessList = $this->businessDAO->GetAll();
            $businessList = $this->SearchByName($businessList,$name);
            require_once(VIEWS_PATH."business-list.php");
        }

        public function ShowOneBusiness($businessName){
            try{
                $businessList = $this->businessDAO->SearchByName($businessName);
                require_once(VIEWS_PATH."business-list.php");
            }catch(Exception $ex){
                throw $ex;
            }
        }

        public function ShowModifyView($businessId){
            try{
                $business = $this->businessDAO->SearchById($businessId);
                $title = "Modificar ".$business->getBusinessName();
                require_once (VIEWS_PATH."header.php");
                require_once(VIEWS_PATH."business-modify.php");
            }catch(Exception $ex){
                throw $ex;
            }finally{
                $this->ShowModifyView($businessId);
            }
            
        }

        public function ShowProfile($businessId){
            try{
                $business = $this->businessDAO->searchById($businessId);
                require_once(VIEWS_PATH."header.php");
                require_once(VIEWS_PATH."business-main.php");
            }catch(Exception $ex){
                throw $ex;
            }
            
        }


        ////////////////// FUNCTIONAL METHODS //////////////////



        public function DeleteBusiness($businessId){
            

            try{
                $this->businessDAO->Delete($businessId);
                $this->alert->setType("success");
                $this->alert->setMessage("Empresa eliminada con exito");
            }catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage($ex->getMessage());
            }finally{
                $this->ShowListViewAdmin();
            }
                    
        }

        public function Modify($businessId, $businessName, $employesQuantity, $businessInfo,$adress){
            try{
                $this->businessDAO->Modify($businessId, $businessName, $employesQuantity, $businessInfo,$adress);
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
        

        public function Add($userId,$email,$password,$validation,$role,$businessId,$businessName,$adress,$employesQuantity,$businessInfo)
        {   
            if($password == $validation){
                try{
                    if(!$this->userDAO->isInDataBase($email)){
                        $user = new User($userId, $email, $password, $role);
                        $this->userDAO->Add($user);
                        $lastUser = $this->userDAO->LastRegister();
                        $business = new Business($lastUser->getUserId(),$businessId,$businessName,$employesQuantity,$businessInfo,$adress,false);
                        $this->businessDAO->Add($business);
                        $this->alert->setType("success");
                        $this->alert->setMessage("Su usuario creado correctamente");
                        header("location:".FRONT_ROOT."index.php");

                    }else{
                        $this->alert->setType("danger");
                        $this->alert->setMessage("Este mail ya se encuentra registrado");
                        $this->ShowAddView($this->alert);
                    }


                }catch(PDOException $ex){
                    $this->alert->setType("danger");
                    $this->alert->setMessage($ex->getMessage());
                    $this->ShowAddView($this->alert);
                }

            }else{
                $this->alert->setType("danger");
                $this->alert->setMessage("Las contraseñas no coinciden");
                $this->ShowAddView($this->alert);
            }
        }
        
        public function Deregister($id){

            try{
                $this->businessDAO->Deregister($id);
                $this->alert->setType("success");
                $this->alert->setMessage("Empresa dada de baja con exito");
                $this->ShowListViewAdmin($this->alert);
            }
            catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage($ex->getMessage());
                $this->ShowListViewAdmin($this->alert);
            }

        }

        public function Release($id){
            try{
                $this->businessDAO->Release($id);
                $this->alert->setType("success");
                $this->alert->setMessage("Empresa dada de alta con exito");
                $this->ShowListViewAdmin($this->alert);
            }
            catch(Exception $ex){
                $this->alert->setType("danger");
                $this->alert->setMessage($ex->getMessage());
                $this->ShowListViewAdmin($this->alert);
            }
        }


        public function SearchByName($businessList,$name){
            $findedList = array();
            foreach($businessList as $business)
            {
                if(str_contains(strtolower($business->getBusinessName()), strtolower($name)))
                {
                    array_push($findedList, $business);
                }
            }
            return $findedList;
        }
    }

?>


