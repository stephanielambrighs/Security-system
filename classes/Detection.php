<?php

include_once(__DIR__ . "/Db.php");

    class Detection{
        private $id;
        private $name;
        private $date;

          /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of name
         */
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of date
         */
        public function getDate()
        {
                return $this->date;
        }

        /**
         * Set the value of date
         *
         * @return  self
         */
        public function setDate($date)
        {
                $this->date = $date;

                return $this;
        }

        // get the detection from the db and show it
        public function viewDetection(){
            $conn = Db::getConnection();
            $statement = $conn->prepare("select * from detection ORDER BY date DESC");
            $statement->execute();
            $result = $statement->fetch();
            return $result;
        }


    }
