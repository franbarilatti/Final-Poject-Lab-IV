<?php
    namespace DAO;

    use DAO\IAdminDAO as IAdminDAO;
    use Exception;
    use Models\Admin as Admin;

    class AdminDAO implements IAdminDAO
    {
        private $adminList = array();
        private $connection;
        private $tableName = "admins";
        

        ///////////// Functional Methods /////////////

        public function Add(Admin $admin)
        {
            try{
                $query = "INSERT INTO ".$this->tableName." (adminId, firstName, lastName, userId)
                          VALUES (:adminId,:firstName,:lastName, :userId);";

                $parameters['adminId'] = $admin->getAdminId();         
                $parameters['firstName'] = $admin->getFirstName();         
                $parameters['lastName'] = $admin->getLastName();         
                $parameters['userId'] = $admin->getUserId();         

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query,$parameters);

            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function GetAll()
        {
            try {
                $adminList = array();

                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);
                $adminList = $this->Mapping($result);

                return $adminList;
            } catch (Exception $ex) {
                throw $ex;
            }
        }

        public function isInDataBase($id){
            try{
                $query = "SELECT * FROM ".$this->tableName." WHERE id = :id";

                $parameters['id'] = $id;
                
                $this->connection = Connection::GetInstance();

                $result =  $this->connection->Execute($query,$parameters);

                if(isset($result)){
                    return true;
                }else{
                    return false;
                }
            }
            catch(Exception $ex){
                throw $ex;
            }
        }
        

        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new Admin($p['userId'], 
                                   $p['adminId'], 
                                   $p['firstName'], 
                                   $p['lastName']);
			}, $value);

            return $resp /*count($resp) > 1 ? $resp : $resp['0']*/;
        }
    }
?>