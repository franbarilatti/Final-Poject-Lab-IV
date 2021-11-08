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
                $query = "INSERT INTO ".$this->tableName." (email,password,role) VALUES (:email,:password,:role);";
                $parameters['email'] = $user->getEmail();
                $parameters['password'] = $user->getPassword();
                $parameters['role'] = $user->getRole();

                //var_dump($parameters);

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

        public function LastRegister(){
            try{
                $userList = $this->GetAll();

                $lastUser = array_pop($userList);

                return $lastUser;
            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function SearchByEmail($email){
            try{
                $query = "SELECT * FROM ".$this->tableName." WHERE email = :email";

                $parameters['email'] = $email;
                
                $this->connection = Connection::GetInstance();

                $result =  $this->connection->Execute($query,$parameters);

                $findedUser = $this->Mapping($result);

                return $findedUser;
            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function SearchById($id){
            try{
                $query = "SELECT * FROM ".$this->tableName." WHERE id = :id";

                $parameters['id'] = $id;
                
                $this->connection = Connection::GetInstance();

                $result =  $this->connection->Execute($query,$parameters);

                $findedUser = $this->Mapping($result);

                return $findedUser[0];
            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function isInDataBase($email){
            try{
                $query = "SELECT * FROM ".$this->tableName." WHERE email = :email";

                $parameters['email'] = $email;
                
                $this->connection = Connection::GetInstance();

                $result =  $this->connection->Execute($query,$parameters);

                if($result){
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
				return new User($p['id'],
                                $p['email'],
                                $p['password'],
                                $p['role']);
			}, $value);

            return $resp = count($resp) >= 1 ? $resp : $resp['0'];
        }

    }
?>