<?php

    require_once 'database/Database.php';

    function register() {
        if (!$_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo '<h1>error : unsuccessful registration!</h1>';
            echo '<a href="regiter.html">Try again</a>';
            return;
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];

        if ($password != $confirm) {
            echo '<h1>error : unsuccessful registration, passwords do not match</h1>';
            echo '<a href="register.html">Try again</a>';
            return; 
        }

        $passwordHash = password_hash($password, PASSWORD_ARGON2_DEFAULT_MEMORY_COST);

        $database = new Database();
        $query = $database.insert(array("email" => $userName, "password" => $passwordHash));

        if ($query["success"]) {
            echo '<h1>Successful registration!</h1>';
            echo '<a href="login.html">Go to Login</a>';
            die;
        }
        else {
            $error = $statement->errorInfo();
            if ($error[1] == 1062) {
                array_push($errors,"Email taken");
            }
        }

            
}

?>