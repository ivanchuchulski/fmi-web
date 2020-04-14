<?php

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

    public function &getErrors()
    {
        return $this->inputDataErrors;
    }

    public function addValidField($fieldName, $fieldData)
    {
        $this->validData[$fieldName] = $this->formatInput($fieldData);
    }

    public function addError($fieldName, $errorMessage)
    {
        $this->inputDataErrors[$fieldName] = $this->formatInput($errorMessage);
    }

    private function formatInput($formField) {
        $formField = trim($formField);
        $formField = stripslashes($formField);
        $formField = htmlspecialchars($formField);
        
        return $formField;
    }
}


?>