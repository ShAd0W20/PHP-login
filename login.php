<?php
include_once "header.php";
?>

<div class="login">
    <div class="d-flex align-items-center h-100 gradient-custom-3 mt-4">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px">
                        <div class="card-body p-4">
                            <h2 class="text-uppercase text-center mb-5 text-dark">
                                Welcome Back
                            </h2>

                            <form action="includes/login.inc.php" method="POST">
                                <?php
                                if (isset($_GET["error"])) :
                                    $error = $_GET["error"];
                                    $errorCode;
                                    switch ($error) {
                                        case "emptyInputs":
                                            $errorCode = "Fill in all inputs";
                                            break;
                                        case "invalidUserPasswd":
                                            $errorCode = "Wrong username or password";
                                            break;
                                        default:
                                            $errorCode = "";
                                    }
                                ?>
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <i class="bi bi-exclamation-triangle-fill"></i>
                                        <div class="ms-2"><?= $errorCode ?></div>
                                    </div>
                                <?php
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

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" name="loginSubmit" class="btn btn-outline-success">
                                            Login
                                        </button>
                                    </div>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">
                                    Have not account yet?
                                    <a href="signup.php">Sign Up</a>
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
include_once "footer.php";
?>

<?php
include_once "footer.php";
?>