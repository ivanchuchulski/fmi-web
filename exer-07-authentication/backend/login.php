<?php

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $connection = new PDO("mysql:host=localhost;dbname=www_authentication", "root", "");

    $sql = "SELECT password FROM Users WHERE email = ?";
    $statement = $connection->prepare($sql);
    $result = $statement->execute([$email]);

    if (password_verify($password, $result['password'])) {
        session_start();
        $_SESSION['logged'] = true;
        header()
    }
    

?>