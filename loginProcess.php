<?php
    $userName = $_POST["username"];
    if ($userName == ""){
        echo"User name cannot be blank";
        echo"<a href='homepage.html'> Return to Login Page </a>";
        exit;
    }
?>