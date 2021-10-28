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
                $query = "INSERT INTO ".$this->tableName." (id,email,password,role) VALUES (DEFAULT,:email,:password,:role);";
                $parameters['email'] = $user->getEmail();
                $parameters['password'] = $user->getPassword();
                $parameters['role'] = $user->getRole();

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
                $query = "SELECT TOP 1 * FROM ".$this->tableName." ORDER BY id DESC";

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);

                $lastUser = $this->Mapping($result);

                return $lastUser;
            }
            catch(Exception $ex){
                throw $ex = "No se a podido tomar el ultimo registro";
            }
        }

        public function SearchByEmail($email){
            try{
                $query = "SELECT * FROM ".$this->tableName." WHERE email = :email";

                $parameters['email'] = $email;
                
                $this->connection = Connection::GetInstance();

                $result= $this->connection->Execute($query,$parameters);
                $findedUser= $this->Mapping($result);
                return $findedUser;
            }
            catch(Exception $ex){
                throw $ex = "Email ingresado no encontrado. Por favor verifique que se encuentre bien escrito";
            }
        }

        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new User($p['email'],
                                $p['password'],
                                $p['role']);
			}, $value);

            return $resp = count($resp) > 1 ? $resp : $resp['0'];
        }

    }
?>