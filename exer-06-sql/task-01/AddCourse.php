<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>backend</title>
</head>
<body>
    <?php
    require 'FormData.php';

    function validateCourse($course, FormData &$formData)
    {
        if (empty($course)) {
            $formData->addError("course", "error : course field is required");
        } 
        elseif (strlen($course) > 150) {
            $formData->addError("course", "error : course field max len is 150 chars");
        }
        else {
            $formData->addValidField("course", $course);
        } 
    }

    function validateLecturer($lecturer, FormData &$formData)
    {
        if (empty($lecturer)) {
            $formData->addError("lecturer", "error : lecturer field is required");
        } 
        elseif (strlen($lecturer) > 200) {
            $formData->addError("lecturer", "error : lecturer field max len is 200 chars");
        }
        else {
            $formData->addValidField("lecturer", $lecturer);
        } 
    }

    function validateDescription($description, FormData &$formData)
    {
        if (empty($description)) {
            $formData->addError("description", "error : description field is required");
        } 
        elseif (strlen($description) < 10) {
            $formData->addError("description", "error : description field min len is 10 chars");
        }
        else {
            $formData->addValidField("description", $description);
        } 
    }

    function writeValidDataToFile(FormData& $formData, $filename) {
        fwrite($filename, "valid data : \n");

        foreach ($formData->getValidData() as $field => $data) {
            fwrite($filename, $field . " = " . $data . "\n");
        }
    }

    function writeErrorsToFile(FormData& $formData, $filename) {
        fwrite($filename, "errors : \n");

        foreach ($formData->getErrors() as $field => $data) {
            fwrite($filename, $field . " = " . $data . "\n");
        }
    }

    // Main
    $formData = new FormData();

    validateCourse($_POST['course'], $formData);
    validateLecturer($_POST['lecturer'], $formData);
    validateDescription($_POST['description'], $formData);
    
    $formData->addValidField("group", $_POST['group']);
    $formData->addValidField("credits", $_POST['credits']);


    echo "valid data : \n";
    var_dump($formData->getValidData());
    echo '<br>';

    echo "errors : \n";
    var_dump($formData->getErrors());
    echo '<br>';

    if (!file_exists("./data-output") || !is_dir("./data-output")) {
        mkdir("./data-output") or die("error : can't create output directory");
    }

    // because the file doesn't exist we have to open the file in w (write mode)
    $validData = fopen("data-output/validData.txt", "w") or die("error : can't open file");
    $errors = fopen("data-output/errors.txt", "w") or die("error : can't open file");

    writeValidDataToFile($formData, $validData);
    writeErrorsToFile($formData, $errors);

    fclose($validData);
    fclose($errors);
    ?>
    
</body>
</html>