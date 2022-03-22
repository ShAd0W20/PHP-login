<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPasswd = "";
$dbName = "phplogin_prepare";

$connection = mysqli_connect($serverName, $dbUsername, $dbPasswd, $dbName);

if (!$connection) {
    die("Conneciton failed: " . mysqli_connect_error());
}
