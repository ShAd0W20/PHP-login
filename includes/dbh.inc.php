<?php

$ini = parse_ini_file(__DIR__ . "/../config.ini");

$serverName = $ini["SERVERNAME"];
$dbUsername = $ini["DBUSERNAME"];
$dbPasswd = $ini["DBPASSWD"];
$dbName = $ini["DBNAME"];

$connection = mysqli_connect($serverName, $dbUsername, $dbPasswd, $dbName);

if (!$connection) {
    die("Conneciton failed: " . mysqli_connect_error());
}
