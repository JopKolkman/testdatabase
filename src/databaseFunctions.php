<?php

require_once('../config/database.php');

function db_connect() {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    return $mysqli;
}

function db_getData($query) {
    $mysqli = db_connect();
    $result = $mysqli->query($query) or die($mysqli->error);
    $mysqli->close();
    return $result;
}

function db_insertData($query) {
    $mysqli = db_connect();
    $result = $mysqli->query($query);
    if ($result == TRUE) {
        return mysqli_insert_id($mysqli);
    } else {
        $result = "Error: " . $query . "<br>" . $mysqli->error;
    }
    $mysqli->close();
    return $result;
}

function db_getUser($gebruiker,$password)
{
    $user = db_getData("SELECT * FROM beheer WHERE gebruiker = '$gebruiker' AND password = '$password'");

    if ($user->rowCount() > 0 )
    {
        return $user;
    }
    else
    {
        return null;
    }
}
