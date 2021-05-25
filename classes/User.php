<?php

include_once(__DIR__ . "/Db.php");

    class User{
        private $firstname;
        private $lastname;
        private $email;
        private $password;

        public function getFirstname()
        {
            return $this->firstname;
        }

        public function setFirstname($firstname)
        {
                $this->firstname = $firstname;

                return $this;
        }

        public function getLastname()
        {
            return $this->lastname;
        }

        public function setLastname($lastname)
        {
                $this->lastname = $lastname;

                return $this;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        // register the user
        public function register() {
            $options = [
                'cost' => 15
            ];
            $password = password_hash($this->password, PASSWORD_DEFAULT, $options);

            $conn = Db::getConnection();
            $statement = $conn->prepare("insert into user
            (firstname, lastname, email, password)
            values (:firstname, :lastname , :email, :password);");
            $statement->bindValue(':firstname', $this->firstname);
            $statement->bindValue(':lastname', $this->lastname);
            $statement->bindValue(':email', $this->email);
            $statement->bindValue(':password', $password);
            $result = $statement->execute();
            return $result;
        }

        public function canLogin() {
            // this function should check if a user can login with the password and user provided
            // use password_verify() to verify your user
            // this function should return true or false and nothing else
            // get de password from database and compare them
            $conn = Db::getConnection();
            $statement = $conn->prepare("select * from user where email = :email");
            $statement->bindValue(":email", $this->email);
            $statement->execute();
            $dbUser = $statement->fetch();
            $hash = $dbUser["password"];
            if(password_verify($this->password, $hash)){
                return true;
            }else{
                return false;
            }
        }



    }