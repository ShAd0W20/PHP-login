<?php
define("shad0wstv", true);
include_once (__DIR__ . "/components/header.php");
?>

<section>
    <div>
        <?php
        if (isset($_SESSION["userid"]) && isset($_SESSION["username"])) {
            echo "<p>Hello there " . $_SESSION["username"] . ", welcome back!</p>";
        } 
        ?>
    </div>
</section>

<?php
include_once (__DIR__ . "/components/footer.php");
?>