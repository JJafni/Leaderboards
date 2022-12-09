<?php
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    include "../classes/db.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-controller.classes.php";
    $login = new LoginController($username, $password);

    $login->loginUser();

    header("Location: ../profile");
}
?>