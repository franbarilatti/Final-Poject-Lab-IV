<?php
    namespace DAO;

use Exception;
use Models\Student;

class StudentDAO implements IStudentDAO{

        private $connection;
        private $tableName = "students";

        

        public function GetAll()
        {
            try {
                $studentList = array();

                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);
                $studentList = $this->Mapping($result);

                return $studentList;
            } catch (Exception $ex) {
                throw $ex = "No se pudo cargar la lista";
            }
        }
            
        protected function Mapping($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new Student($p['studentId'], 
                                   $p['careerId'], 
                                   $p['firstName'], 
                                   $p['lastName'],
                                   $p['dni'],
                                   $p['fileNumber'],
                                   $p['gender'],
                                   $p['birthDate'],
                                   $p['email'],
                                   $p['phoneNumber'],
                                   $p['active']);
			}, $value);

            var_dump($resp);

            return $resp = count($resp) > 1 ? $resp : $resp['0'];
        }

    }



?>