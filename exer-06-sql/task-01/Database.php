<?php
	class Database 
	{
		private $connection;

		public function __construct()
		{
			$host = 'localhost';
			$username = 'root';
			$password = '';
			$dbname = 'www_task_1';
		
			$this->connection = new PDO('mysql:host=localhost; dbname=www_task_1', 'root', '');
		}

		public function createTable($createCommand) {
			// or use exec()
			$statement = $this->connection->query($createCommand);

			echo "table created" . "<br>";
		}
		
		public function insertIntoTable($insertCommand, $valuesToInsert) {
			$statement = $this->connection->prepare($insertCommand);

			foreach ($valuesToInsert as $value) {
				$statement->execute($value);	
			}

			echo "values added" . '<br>';
		}

	}

	// function insertCourse(FormData &$formData) {
		
	// }

?>