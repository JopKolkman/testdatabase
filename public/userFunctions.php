<?php

require_once("../src/databaseFunctions.php");

function registerUser($firstName, $lastName, $email) {
    $result = db_insertData("INSERT INTO users (firstName, lastName, email) VALUES ('$firstName', '$lastName', '$email'')");
    return $result;
}

function getUser($email, $password) {
    $user = db_getData("SELECT * FROM users WHERE email='$email' AND password='$password'");
    return $user;
    if ($user->num_rows > 0) {
        return $user;
    } else {
        return "No user found";
    }
}
?>