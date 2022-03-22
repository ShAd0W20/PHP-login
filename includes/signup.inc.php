<?php

if(isset($_POST["signupSubmit"])) {
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    $userName = mysqli_real_escape_string($connection, $_POST["userName"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);
    $passwordRepeat = mysqli_real_escape_string($connection, $_POST["passwordRepeat"]);

    if(emptyInputSignup($userName, $password, $passwordRepeat) !== false) {
        header("Location: ../views/signup.php?error=emptyInputs");
        exit();
    }

    if(invalidUsername($userName) !== false) {
        header("Location: ../views/signup.php?error=invalidUsername");
        exit();
    }

    if(invalidPassowrd($password) !== false) {
        header("Location: ../views/signup.php?error=invalidPassword");
        exit();
    }

    if(passwordMatch($password, $passwordRepeat) !== false) {
        header("Location: ../views/signup.php?error=passwordMatch");
        exit();
    }

    if(userExists($connection, $userName) !== false) {
        header("Location: ../views/signup.php?error=userExists");
        exit();
    }

    createUser($connection, $userName, $password);

} else {
    header("Location: ../views/signup.php");
    exit();
}