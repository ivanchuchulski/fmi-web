<?php
    function InitializeDatabase(Database &$database) 
    {
        createTableElectivess($database);
        insertTestDefaultCourses($database);
    }

    function createTableElectivess(Database &$database)
    {
        $createTableElectives = <<<EOT
        CREATE TABLE electives (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(128),
            description VARCHAR(1024),
            lecturer VARCHAR(128)
            );
        EOT;

        $database->createTable($createTableElectives);
        
    }

    function insertTestDefaultCourses(Database &$database)
    {
        $insertCommand = <<<EOT
        INSERT INTO electives (title, description, lecturer)
        VALUES (:electiveTitle, :electiveDescription, :electiveLecturer);
        EOT;
    
        $initialCourses = [
            ['electiveTitle' => "Programming with Go",
            'electiveDescription' =>"Let's learn Go",
            'electiveLecturer' => "Nikolay Batchiyski"],
    
            ['electiveTitle' => "AKDU",
            'electiveDescription' => "Let's Graduate",
            'electiveLecturer' => "Svetlin Ivanov"]
        ];

        // echo "printing course1" . "<br>";
        // var_dump($initialCourses);
        // echo '<br>';
    
        // foreach ($initialCourses as $course) {
        //     foreach ($course as $key => $value) {
        //         echo "$key $value" . '<br>';
        //     }
        // }        

        $database->insertIntoTable($insertCommand, $initialCourses);
    }

?>