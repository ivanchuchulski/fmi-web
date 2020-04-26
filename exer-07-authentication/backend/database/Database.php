<?php
    class Database {
        private $connection;
        
        public function __construct() {
            $config = parse_ini_file("../config/config.ini", true);

            $host = $config['db']['host'];
            $dbname = $config['db']['name'];
            $user = $config['db']['user'];
            $password = $config['db']['password'];

            initialize($host, $database, $user, $password);
        }

        public function __destruct() {
            $this->connection = null;
        }

        public function insert($data)
        {
            try {
                $sql = "INSERT INTO Users (email, password) VALUES(:email, :password)";
                $insertStatement = $this->connection->prepare($sql);
                $insertStatement->execute($data);
            } 
            catch (PDOException $exception) {
                echo "Connection failed: " . $exception->getMessage();
                return array("success" => false, "error" => $e->getMessage());
            }
        }


        private function initialize(string $host, string $database, string $user, string $password) {
            try {
                $this->connection = new PDO("mysql:host=$host;dbname=$database", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            } 
            catch(PDOException $exception) {
                echo "Connection failed: " . $exception->getMessage();
            }
        }

    }


?>