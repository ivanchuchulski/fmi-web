<?php
require_once "User.php";

registerUser();

function registerUser()
{
	try {
		checkServerRequestMethod();

		$formFields = getFormFields();

		$user = new User();

		// TODO : check if the user is already registered

		$user->registerUser($formFields);

		echo '<h1>successful registration : </h1><br/>';

		echo '<a href="../index.html">Go back to registration</a>';
	}
	catch (Exception $exception) {
		echo '<h1>unsuccessful registration : ' . $exception->getMessage() . '</h1><br/>';

		echo '<a href="../index.html">Try to go back to registration</a>';
	}
}

function checkServerRequestMethod()
{
	if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
		throw new Exception("error : use post method");
	}
}

function getFormFields(): array
{
	try {
		$formFields = array();

		$formFields['firstname'] = getFirstname();
		$formFields['surname'] = getSurname();
		$formFields['facultynum'] = getFacultynum();

		return $formFields;
	}
	catch (Exception $exception) {
		throw $exception;
	}
}

function getFirstname()
{
	//	TODO : make the regex use utf-8 strings
	$LOWER_LIMIT_FIRSTNAME = 2;
	$UPPER_LIMIT_FIRSTNAME = 50;
	$PATTERN_FIRSTNAME = "/[A-Za-z]{{$LOWER_LIMIT_FIRSTNAME},{$UPPER_LIMIT_FIRSTNAME}}/";

	$firstname = $_POST['firstname'];

	if (!$firstname) {
		throw new Exception( "error : first name is required");
	}

	if (strlen($firstname) < $LOWER_LIMIT_FIRSTNAME) {
		throw new Exception( "error : first name is below min length");
	}

	if (strlen($firstname) > $UPPER_LIMIT_FIRSTNAME) {
		throw new Exception( "error : first name exceeds max length");
	}

	if (!preg_match($PATTERN_FIRSTNAME, $firstname)) {
		throw new Exception( "error : first name must contain only letters");
	}

	return formatInput($firstname);
}

function getSurname () : string {
	//	TODO : make the regex use utf-8 strings
	$LOWER_LIMIT_SURNAME = 2;
	$UPPER_LIMIT_SURNAME = 50;
	$PATTERN_SURNAME = "/[A-Za-z]{{$LOWER_LIMIT_SURNAME},{$UPPER_LIMIT_SURNAME}}/";

	$surname = $_POST['surname'];

	echo $surname . '<br>';
	echo $PATTERN_SURNAME . '<br>';

	if (!$surname) {
		throw new Exception( "error : surname is required");
	}

	if (strlen($surname) < $LOWER_LIMIT_SURNAME) {
		throw new Exception( "error : surname is below min length");
	}

	if (strlen($surname) > $UPPER_LIMIT_SURNAME) {
		throw new Exception( "error : surname exceeds max length");
	}

	if (!preg_match($PATTERN_SURNAME, $surname)) {
		throw new Exception( "error : surname must contain only letters");
	}

	return formatInput($surname);
}

function getFacultynum() : string {
	$LOWER_LIMIT_FACULTYNUM = 5;
	$UPPER_LIMIT_FACULTYNUM = 8;
	$PATTERN_SURNAME = "/[1-9]{{$LOWER_LIMIT_FACULTYNUM},{$UPPER_LIMIT_FACULTYNUM}}/";

	$facultynum = $_POST['facultynum'];

	if (!preg_match($PATTERN_SURNAME, $facultynum)) {
		throw new Exception( "error : facultynum should contain only letters");
	}

	return formatInput($facultynum);
}

function formatInput($formField) : string {
	$formField = trim($formField);
	$formField = stripslashes($formField);
	$formField = htmlspecialchars($formField);

	return $formField;
}

?>