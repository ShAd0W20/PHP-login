<?php

function emptyInputSignup($userName, $password, $passwordRepeat)
{
    if (empty($userName) || empty($password) || empty($passwordRepeat)) {
        return true;
    }
    return false;
}

function invalidUsername($userName)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        return true;
    }
    return false;
}

function invalidPassowrd($password)
{
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        return true;
    }
    return false;
}

function passwordMatch($password, $passwordRepeat)
{
    if ($password !== $passwordRepeat) {
        return true;
    }
    return false;
}

function userExists($connection, $username)
{
    $sql = "SELECT * FROM users WHERE userName = ?;";
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function createUser($connection, $username, $password)
{
    $sql = "INSERT INTO users (userName, userPwd) VALUES(?,?);";
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtFailed");
        exit();
    }

    $hashPasswd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $username, $hashPasswd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($userName, $password)
{
    if (empty($userName) || empty($password)) {
        return true;
    }
    return false;
}

function loginUser($connection, $userName, $password)
{
    $row = userExists($connection, $userName);

    if ($row === false) {
        header("Location: ../login.php?error=invalidUserPasswd");
        exit();
    }

    $hashPassword = $row["userPwd"];
    if(!password_verify($password, $hashPassword)) {
        header("Location: ../login.php?error=invalidUserPasswd");
        exit();
    } else {
        session_start();
        session_regenerate_id();
        $_SESSION["userid"] = $row["userId"];
        $_SESSION["username"] = $row["userName"];
        header("Location: ../index.php");
        exit();
    }
}

function getUserData($connection, $userName)
{
    $row = userExists($connection, $userName);

    if ($row === false) {
        header("Location: ../index.php");
        exit();
    }

    return $row;

}
