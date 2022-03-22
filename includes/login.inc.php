<?php

if (isset($_POST["loginSubmit"])) {
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    $username = mysqli_real_escape_string($connection, $_POST["userName"]);
    $password = mysqli_real_escape_string($connection, $_POST["passowrd"]);

    if (emptyInputLogin($userName, $password) !== false) {
        header("Location: ../login.php?error=emptyInputs");
        exit();
    }

    loginUser($connection, $userName, $password);
} else {
    header("Location: ../login.php");
    exit();
}
