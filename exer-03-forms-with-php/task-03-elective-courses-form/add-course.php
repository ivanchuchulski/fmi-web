<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>backend</title>
</head>
<body>
    <?php
    function formatInput($formField) {
        $formField = trim($formField);
        $formField = stripslashes($formField);
        $formField = htmlspecialchars($formField);
        
        return $formField;
    }

    class FormData 
    {
        private $validData;
        private $inputDataErrors;
        
        public function __construct()
        {
            $this->validData = array();
            $this->inputDataErrors = array();
        }

        public function &getValidData()
        {
            return $this->validData;
        }

        public function &getInputDataErrors()
        {
            return $this->inputDataErrors;
        }

        public function addValidField($fieldName, $fieldData)
        {
           $this->validData[$fieldName] = formatInput($fieldData);
        }

        public function addError($fieldName, $errorMessage)
        {
           $this->inputDataErrors[$fieldName] = formatInput($errorMessage);
        }

        private function formatInput($formField) {
            $formField = trim($formField);
            $formField = stripslashes($formField);
            $formField = htmlspecialchars($formField);
            
            return $formField;
        }
    }

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

    // Main
    $formData = new FormData();

    validateCourse($_POST['course'], $formData);
    validateLecturer($_POST['lecturer'], $formData);
    validateDescription($_POST['description'], $formData);
    $formData->addValidField("group", $_POST['group']);


    var_dump($formData->getValidData());
    echo '<br>';
    var_dump($formData->getInputDataErrors());



    ?>
    
</body>
</html>