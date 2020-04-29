<?php
    class Database {
        private $connection;
        
        public function __construct() {
            $config = parse_ini_file("db-config.ini", true);

            $host = $config['db']['host'];
            $dbname = $config['db']['name'];
            $user = $config['db']['user'];
            $password = $config['db']['password'];

            $this->initialize($host, $dbname, $user, $password);
        }

        public function __destruct() {
            $this->connection = null;
        }

        public function insert($data) {
            try {
                $sql = "INSERT INTO users (firstname, surname, facultynum) VALUES(:firstname, :surname, :facultynum)";

                $insertStatement = $this->connection->prepare($sql);

                $result = $insertStatement->execute($data);

                if ($result) {
                    return array("success" => true);
                }
                else {
                    return array("success" => false, "error" => "error : invalid insert, check your command or parameters");
                }

            } 
            catch (PDOException $exception) {
                echo "Connection failed: " . $exception->getMessage();

                return array("success" => false, "error" => $e->getMessage());
            }
        }

        public function isUserRegistered(array& $formFields)
        {
            try {
                $sql = "";
                $insertStatement = $this->connection->prepare($sql);
                $insertStatement->execute();

                return array("success" => true);
            } 
            catch (PDOException $exception) {
                echo "Connection failed: " . $exception->getMessage();

                return array("success" => false, "error" => $e->getMessage());
            }
        }

        private function initialize($host, $database, $user, $password) {
            try {
                $this->connection = new PDO("mysql:host=$host;dbname=$database", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                echo "db created" . "<br>";
            } 
            catch(PDOException $exception) {
                echo "Connection failed: " . $exception->getMessage();
            }
        }
    }

?>