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
    require 'InitializeDatabase.php';

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
            $formData->addValidField("electiveTitle", $course);
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
            $formData->addValidField("electiveLecturer", $lecturer);
        } 
    }

    function validateDescription($description, FormData &$formData)
    {
        $DESCRIPTION_UPPER_LIMIT = 1024;
        
        if (empty($description)) {
            $formData->addError("description", "error : description field is required");
        } 
        elseif (strlen($description) > $DESCRIPTION_UPPER_LIMIT) {
            $formData->addError("description", "error : description field min len is 10 chars");
        }
        else {
            $formData->addValidField("electiveDescription", $description);
        } 
    }

    // Main

    $formData = new FormData();
    validateCourse($_POST['course'], $formData);
    validateLecturer($_POST['lecturer'], $formData);
    validateDescription($_POST['description'], $formData);
   
    $database = new Database();

    InitializeDatabase($database);

    $database->insertCourse($formData);

    ?>
    
</body>
</html>