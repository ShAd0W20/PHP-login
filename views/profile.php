<?php
define("shad0wstv", true);
require_once (__DIR__ . "/../includes/dbh.inc.php");
require_once (__DIR__ . "/../includes/functions.inc.php");
include_once (__DIR__ . "/../components/header.php");
$row = getUserData($connection, $_SESSION["username"]);
?>

<section>
    <div class="container-fluid">
        <div class="row border">
            <h5 class="mt-3 mb-3">Información del usuario</h5>
        </div>
        <div class="row mt-4 ms-5">
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $row['avatar'] ?>" class="card-img-top" alt="Profile avatar">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row["userName"]; ?></h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="table-responsive">
                    <table class="table table-sm table-borderless">
                        <tbody>
                            <tr>
                                <td>Nombre completo</td>
                                <td><?= $row["userName"]; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include_once "../components/footer.php";
?>