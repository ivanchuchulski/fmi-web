<?php
	? how to create  db from here
	$username = 'root';
	$password = '';
	$dbname = 'www_task_1';

	// $create_db = "CREATE DATABASE www_task_01";
	// ...
	// echo "db created\n";

	$connection = new PDO('mysql:host=localhost; dbname=www_task_1', 'root', '');

	$create_table_electives = "CREATE TABLE electives (
			id INT AUTO_INCREMENT PRIMARY KEY,
			title VARCHAR(128),
			description VARCHAR(1024),
			lecturer VARCHAR(128)
			);";

	$add_values = "INSERT INTO electives (title, description, lecturer)
					VALUES (:electiveTitle, :electiveDescription, :electiveLecturer);";

	
	$statement = $connection->query($create_table_electives);
	echo "table created\n";

	$statement = $connection->prepare($add_values);

	$statement->execute([	'electiveTitle' => "Programming with Go",
							'electiveDescription' =>"Let's learn Go",
							'electiveLecturer' => "Nikolay Batchiyski"]);

	$statement->execute([	'electiveTitle' => "AKDU",
							'electiveDescription' =>"Let's Graduate",
							'electiveLecturer' => "Svetlin Ivanov"]);

    echo "values added\n";
?>