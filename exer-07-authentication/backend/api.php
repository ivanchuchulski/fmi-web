<?php

    require_once 'register.php';
    require_once 'login.php';
    require_once 'logout.php';


    $requestUri = $_SERVER["REQUEST_URI"];

    if(preg_match("/login$/", $requestUri)){
        login();
    } 
    elseif(preg_match("/registration$/", $requestUri)) {
        registration();
    }
    elseif(preg_match("/logout$/", $requestUri)) {
        logout();
    } else {
        echo "error : wrong URL";
    }

?>