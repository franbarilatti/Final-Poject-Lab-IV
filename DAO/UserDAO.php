<?php

    namespace DAO;

    use \Exception as Exception;
    use DAO\IUserDAO as IUserDAO;
    use Models\User as User;
    use DAO\Connection as Connection;

    class UserDAO implements IUserDAO{
        private $connection;
        private $tableName = "users";

        public function Add(User $user)
        {
            try{
                $query = "INSERT INTO ".$this->tableName." (userId,email,password,role) VALUES (DEFAULT,:email,:password,:role);";

                $parameters['email'] = $user->getEmail();
                $parameters['password'] = $user->getEmail();
                $parameters['role'] = $user->getEmail();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query,$parameters);

            }catch(Exception $ex){
                throw $ex;
            }
        }

        public function Delete($userID)
        {
            
        }

        public function GetAll()
        {
            try{
                $userList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $result = $this->connection->Execute($query);

                $userList = $this->Mapping($result);
                return $userList;
            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new User($p['userId'],
                                $p['email'],
                                $p['password'],
                                $p['role']);
			}, $value);

            return $resp = count($resp) > 1 ? $resp : $resp['0'];
        }
    }



?>