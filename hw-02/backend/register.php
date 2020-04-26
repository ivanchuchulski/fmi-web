<?php
    require_once "User.php";

    $errors = [];   

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo "errror : use post method";
        return;
    }

    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $facultynum = $_POST['facultynum'];

    // TODO : validation
    // if (!$data["firstname"]) {
    //     $errors[] = "error : firstname is required";
    // }
    // if (!$data["firstname"]) {
    //     $errors[] = "error : surname is required";
    // }

    $user = new User();

    // TODO : check if the user is already registered

    $response = $user->registerUser($firstname, $surname, $facultynum);

    if ($response["success"]) {
        echo '<h1>Successful registration!</h1>';
    }
    else {
        echo '<h1>error : unsuccessful registration!</h1> <br />';
        var_dump($errors);
        echo '<br />';

    }


?>