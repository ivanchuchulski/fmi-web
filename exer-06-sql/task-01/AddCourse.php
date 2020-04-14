<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>backend</title>
</head>
<body>
    <?php
    require 'FormData.php';
    require 'Database.php';

    function validateCourse($course, FormData &$formData)
    {
        $COURSE_UPPER_LIMIT = 128;

        if (empty($course)) {
            $formData->addError("course", "error : course field is required");
        } 
        elseif (strlen($course) > $COURSE_UPPER_LIMIT) {
            $formData->addError("course", "error : course field max len is 150 chars");
        }
        else {
            $formData->addValidField("course", $course);
        } 
    }

    function validateLecturer($lecturer, FormData &$formData)
    {
        $LECTURER_NAME_UPPER_LIMIT = 128;

        if (empty($lecturer)) {
            $formData->addError("lecturer", "error : lecturer field is required");
        } 
        elseif (strlen($lecturer) > $LECTURER_NAME_UPPER_LIMIT) {
            $formData->addError("lecturer", "error : lecturer field max len is 200 chars");
        }
        else {
            $formData->addValidField("lecturer", $lecturer);
        } 
    }

    function validateDescription($description, FormData &$formData)
    {
        $DESCRIPTION_UPPER_LIMIT = 1024;
        
        if (empty($description)) {
            $formData->addError("description", "error : description field is required");
        } 
        elseif (strlen($description) < $DESCRIPTION_UPPER_LIMIT) {
            $formData->addError("description", "error : description field min len is 10 chars");
        }
        else {
            $formData->addValidField("description", $description);
        } 
    }

    // Main

    // $formData = new FormData();
    // validateCourse($_POST['course'], $formData);
    // validateLecturer($_POST['lecturer'], $formData);
    // validateDescription($_POST['description'], $formData);

    $createTableElectives = <<<EOT
    CREATE TABLE electives (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(128),
        description VARCHAR(1024),
        lecturer VARCHAR(128)
        );
    EOT;

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

    echo "printing create" . "<br>";
    echo $createTableElectives . "<br>";

    echo "printing command" . "<br>";
    echo $insertCommand . "<br>";

    echo "printing course1" . "<br>";
    var_dump($initialCourses);
    echo '<br>';

    foreach ($initialCourses as $course) {
        foreach ($course as $key => $value) {
            echo "$key $value" . '<br>';
        }
    }        
    $database = new Database();

    $database->createTable($createTableElectives);
    
    $database->insertIntoTable($insertCommand, $initialCourses);
    ?>
    
</body>
</html>