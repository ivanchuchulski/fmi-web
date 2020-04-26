<?php
    require_once "Database.php";

    class User {
        private $firstname;
        private $surname;
        private $facultyNum;

        private $database;

        public function __construct() {
            $this->database = new Database();
            echo "user created" . "<br>";
        }

        public function registerUser(string $firstname, string $surname, int $facultyNum) {
            $query = $this->database->insert(array("firstname" => $firstname, "surname" => $surname, "facultynum" => $facultyNum));
        
            if ($query["success"]) {
                return array("success" => true);
            } 
            else {
                return array("success" => false, "error" => $query["error"]);
            }
        }
    }
?>
