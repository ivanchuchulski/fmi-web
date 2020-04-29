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

        public function registerUser(array& $formFields) {
            $query = $this->database->insert($formFields);
        
            if ($query["success"]) {
                return array("success" => true);
            } 
            else {
                return array("success" => false, "error" => $query["error"]);
            }
        }
    }
?>
