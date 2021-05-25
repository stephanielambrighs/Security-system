<?php

include_once(__DIR__ . "/Db.php");

    class Log{
        private $id;
        private $tag;
        private $firstname;
        private $lastname;
        private $time_logged;

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getTag()
        {
            return $this->tag;
        }

        public function setTag($tag)
        {
                $this->tag = $tag;

                return $this;
        }

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

        public function getTime_logged()
        {
            return $this->time_logged;
        }

        public function setTime_logged($time_logged)
        {
                $this->time_logged = $time_logged;

                return $this;
        }

        // get the logs from the db and show it
        public function viewLogs($logId){
            $conn = Db::getConnection();
            $statement = $conn->prepare("select * from logs ORDER BY id = :id DESC");
            $statement->bindValue(":id", $logId);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        }
    }