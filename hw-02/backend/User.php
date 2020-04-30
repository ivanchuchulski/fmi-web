<?php
    require_once "Database.php";

    class User {
        private $firstname;
        private $surname;
        private $facultyNum;

        private $database;

        public function __construct() {
            $this->database = new Database();

            echo '<h1>user created' . '</h1>';
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

        public function isUserRegistered(array& $formFields)
        {
            $query = $this->database->selectUserByFacultynum($formFields['facultynum']);

            $user = $query->fetch(PDO::FETCH_ASSOC);

//            var_dump($user); echo '<br>';

            if(!empty($user)) {
                throw new Exception('error : user already registered');
            }
        }
    }
?>
