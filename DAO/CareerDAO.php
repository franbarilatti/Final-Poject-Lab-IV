<?php
    namespace DAO;
    use Exception;
    use Models\Career as Career;
    use DAO\CareerAPI as CareerAPI;

    class CareerDAO implements ICareerDAO{

        private $connection;
        private $tableName = "careers";

        public function GetAll()
        {
            try {
                $careerList = array();

                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);
                $careerList = $this->Mapping($result);

                return $careerList;
            } catch (Exception $ex) {
                throw $ex = "No se pudo cargar la lista";
            }
        }

        public function Add(Career $career)
        {
            try{
                $query = "INSERT INTO ".$this->tableName." (careerId,description,active)
                          VALUES (:careerId,:description,:active)";
                
                $parameters['careerId'] = $career->getCareerId();
                $parameters['description'] = $career->getDescription();
                $parameters['active'] = $career->getActive();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query,$parameters);

                return "Carrera ingresada con exito";
            }
            catch(Exception $ex){
                throw $ex = "Hubo un error al ingresar la carrera";
            }
        }

        public function SearchById($id){
            try{
                $query = "SELECT * FROM ".$this->tableName." WHERE id = :id";

                $parameters['id'] = $id;
                
                $this->connection = Connection::GetInstance();

                $result =  $this->connection->Execute($query,$parameters);

                $career = $this->Mapping($result);

                return $career;
            }
            catch(Exception $ex){
                throw $ex;
            }
        }

     

        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new Career($p['careerId'], $p['description'], $p['active']);
			}, $value);

            return $resp /*count($resp) > 1 ? $resp : $resp['0']*/;
        }
    }




?>