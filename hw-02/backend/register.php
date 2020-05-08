<?php
require_once "User.php";

registerUser();

function registerUser() {
	try {
		checkServerRequestMethod();

		$formFields = getFormFields();

		$user = new User();

		$user->checkIfUserAlreadySavedHisData($formFields);

		$user->addUserData($formFields);

		$response = ['success' => true];

		echo json_encode($response);
	}
	catch (Exception $exception) {
		$response = ['success' => false, 'error' => $exception->getMessage()];

		echo json_encode($response);
	}
}

function checkServerRequestMethod() {
	if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
		throw new Exception("error : use post method");
	}
}

function getFormFields(): array {
	try {
		$formFields = array();

		$formFields['firstname'] = validateTextField('firstname', 2, 50);
		$formFields['surname'] = validateTextField('surname', 2, 50);
		$formFields['major'] = validateTextField('major', 1, 5);
		$formFields['course'] = validateNumberField('course', 1);
		$formFields['studentGroup'] = validateNumberField('group', 1);
		$formFields['facultynum'] = getFacultynum();
		$formFields['motivation'] = getMotivation();

		return $formFields;
	}
	catch (Exception $exception) {
		throw $exception;
	}
}

function validateTextField ($nameOfTheField, $lowerLimit, $upperLimit) {
	$pattern = "/^[A-Za-z]{{$lowerLimit},{$upperLimit}}$/";

	$formData = json_decode($_POST["formData"], true);
	$textField = $formData[$nameOfTheField];

	if (!$textField) {
		throw new Exception("error : ${nameOfTheField} is required");
	}

	if (!preg_match($pattern, $textField)) {
		throw new Exception("error : ${nameOfTheField} must contain only letters");
	}

	return formatInput($textField);
}

function validateNumberField ($nameOfTheField, $limit) {
	$pattern = "/^[1-9]{{$limit}}$/";

	$formData = json_decode($_POST["formData"], true);
	$numberField = $formData[$nameOfTheField];

	if (!$numberField) {
		throw new Exception("error : ${nameOfTheField} is required");
	}

	if (!preg_match($pattern, $numberField)) {
		throw new Exception("error : ${nameOfTheField} must contain only digits");
	}

	return formatInput($numberField);
}


function getFacultynum(): string {
	$pattern_facultynum = "/^[1-9]{1}[0-9]{4,7}$/";

	$formData = json_decode($_POST["formData"], true);
	$facultynum = $formData['facultynum'];

	if (!$facultynum) {
		throw new Exception("error : faculty number is required");
	}

	if (!preg_match($pattern_facultynum, $facultynum)) {
		throw new Exception("error : faculty number must contain only digits");
	}

	return formatInput($facultynum);
}

function getMotivation() {
	$pattern = "/^[A-Za-z0-9 ]{2,30}$/";

	$formData = json_decode($_POST["formData"], true);
	$motivation = $formData['motivation'];

	if (!$motivation) {
		return null;
	}

	if (!preg_match($pattern, $motivation)) {
		throw new Exception("[backend]error : motivation for enrolling must contain only letters and digits");
	}

	return formatInput($motivation);
}

function formatInput($formField): string {
	$formField = trim($formField);
	$formField = stripslashes($formField);
	$formField = htmlspecialchars($formField);

	return $formField;
}

?>