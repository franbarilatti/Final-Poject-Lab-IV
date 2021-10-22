<?php
    namespace Models;

    class Student extends user{
        private $studentId;
        private $careerId;
        private $firstName;
        private $lastName;
        private $dni;
        private $fileNumber;
        private $gender;
        private $birthDate;
        private $phoneNumber;
        private $active;

        public function __construct(
                        $studentId,
                        $careerId,
                        $firstName,
                        $lastName,
                        $dni,
                        
                        $gender,
                        $birthDate,
                        $phoneNumber,
                        $active,
                        $email,
                        $password)
        {
                $this->studentId =$studentId;
                $this->careerId =$careerId;
                $this->firstName =$firstName;
                $this->lastName =$lastName;
                $this->dni =$dni;
                $this->fileNumber = rand(10,99) . "-" . rand(100,999) . "-". rand(1000,9999);
                $this->gender =$gender;
                $this->birthDate =$birthDate;
                $this->phoneNumber =$phoneNumber;
                $this->active = true;
                parent::__construct($email,$password);
        }

        ////////// GETTERS METHODS //////////

        public function getStudentId()
        {
                return $this->studentId;
        }

        public function getCareerId()
        {
                return $this->careerId;
        }

        public function getFirstName()
        {
                return $this->firstName;
        }

        public function getLastName()
        {
                return $this->lastName;
        }

        public function getDni()
        {
                return $this->dni;
        }

        public function getFileNumber()
        {
                return $this->fileNumber;
        }

        public function getGender()
        {
                return $this->gender;
        }

        public function getBirthDate()
        {
                return $this->birthDate;
        }

        public function getPhoneNumber()
        {
                return $this->phoneNumber;
        }

        public function getActive(){
            return $this->active;
        }

        public function getEmail()
        {
            return $this->email;
        }
        public function getPassword()
        {
            return $this->password;
        }
                        

        ////////// SETTERS METHODS //////////
 
        public function setStudentId($studentId)
        {
                $this->studentId = $studentId;

                return $this;
        }
 
        public function setCareerId($careerId)
        {
                $this->careerId = $careerId;

                return $this;
        }

        public function setUserId($userId)
        {
                $this->userId = $userId;

                return $this;
        }

        public function setFirstName($firstName)
        {
                $this->firstName = $firstName;

                return $this;
        }

        public function setLastName($lastName)
        {
                $this->lastName = $lastName;

                return $this;
        }

        public function setDni($dni)
        {
                $this->dni = $dni;

                return $this;
        }

        public function setFileNumber($fileNumber)
        {
                $this->fileNumber = $fileNumber;

                return $this;
        }

        public function setGender($gender)
        {
                $this->gender = $gender;

                return $this;
        }

        public function setBirthDate($birthDate)
        {
                $this->birthDate = $birthDate;

                return $this;
        }

 
        public function setPhoneNumber($phoneNumber)
        {
                $this->phoneNumber = $phoneNumber;

                return $this;
        }
 
        public function setActive($active)
        {
                $this->active = $active;

                return $this;
        }
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }
 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
    }
    
    
    

?>