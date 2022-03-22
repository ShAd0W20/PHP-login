<?php
include_once "../components/header.php";
?>

<div class="register">
    <div class="d-flex align-items-center h-100 gradient-custom-3 mt-4">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px">
                        <div class="card-body p-4">
                            <h2 class="text-uppercase text-center mb-5 text-dark">
                                Create an account
                            </h2>

                            <form action="../includes/signup.inc.php" method="POST">
                                <?php
                                if (isset($_GET["error"]) && !empty($_GET["error"])) :
                                    $error = $_GET["error"];
                                    $errorCode;
                                    switch ($error) {
                                        case "emptyInputs":
                                            $errorCode = "Fill in all fields!";
                                            break;
                                        case "invalidUsername":
                                            $errorCode = "Username must have an upper case letter, lower case letter and a number";
                                            break;
                                        case "invalidPassword":
                                            $errorCode = "Password must be at least 8 characters long and must contain an upper case letter, lower case letter, one number and onse special character";
                                            break;
                                        case "passwordMatch":
                                            $errorCode = "Password must be at least 8 characters long and must contain a upper case letter, lower case letter, one number and onse special character";
                                            break;
                                        case "userExists":
                                            $errorCode = "Username already exists";
                                            break;
                                        case "stmtFailed":
                                            $errorCode = "Something went wrong, try again!";
                                            break;
                                        case "none":
                                            $errorCode = "You have signed up!";
                                            break;
                                        default:
                                            $errorCode = "";
                                    }

                                    if ($error !== "none") :
                                ?>
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <i class="bi bi-exclamation-triangle-fill"></i>
                                            <div class="ms-2"><?= $errorCode ?></div>
                                        </div>
                                    <?php
                                    else :
                                    ?>
                                        <div class="alert alert-success d-flex align-items-center" role="alert">
                                            <i class="bi bi-check-square-fill"></i>
                                            <div class="ms-2"><?= $errorCode ?></div>
                                        </div>
                                <?php
                                    endif;
                                endif;

                                ?>
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="username" name="userName" />
                                    <label for="floatingInput">Username</label>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" />
                                    <label for="floatingPassword">Password</label>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" id="floatingPasswordRepeat" placeholder="Repeat password" name="passwordRepeat" />
                                    <label for="floatingPasswordRepeat">Repeat password</label>
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" name="signupSubmit" class="btn btn-outline-success">
                                            Register
                                        </button>
                                    </div>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">
                                    Have already an account?
                                    <a href="login.php">Login here</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once "../components/footer.php";
?>