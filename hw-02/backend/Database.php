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

                return $result;
            }
            catch (PDOException $exception) {
				throw $exception;
            }
        }

        public function selectUserByFacultynum(string& $facultynum) {
            try {
                $sql = "SELECT * FROM users WHERE facultynum=:facultynum;";
                $selectStatement = $this->connection->prepare($sql);
                $selectStatement->execute(array("facultynum" => $facultynum));

                return $selectStatement;
            }
            catch (PDOException $exception) {
				throw $exception;
            }
        }

        private function initialize($host, $database, $user, $password) {
            try {
                $this->connection = new PDO("mysql:host=$host;dbname=$database", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            }
            catch(PDOException $exception) {
				throw $exception;
            }
        }
    }

?>