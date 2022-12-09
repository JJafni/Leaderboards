<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Username</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="navbar">
        <a href="index" class="active">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Mario Kart</button>
            <div class="dropdown-content">
                <a href="mkaddscore">Add Score</a>
                <a href="mkleaderboard">Leaderboard</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Table Tennis</button>
            <div class="dropdown-content">
                <a href="ttaddscore">Add Score</a>
                <a href="ttleaderboard">Leaderboard</a>
            </div>
        </div>
        <div class="form">
            <?php
            if (isset($_SESSION["userid"])) {
            ?>
            <a href="profile"><?= $_SESSION["username"] ?></a>
            <a href="includes/logout.inc.php">Logout</a>
            <?php
            } else {
            ?>
            <a href="login">Login</a>
            <a href="register">Register</a>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="container">
        <form action="changepasswordinsert" method="POST">
            <?php
            $url = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
            if (strpos($url,"oldpassword") !== false) {
                echo $_SESSION["oldpassword"];
            } else if (strpos($url,"passwordlength") !== false) {
                echo $_SESSION["passwordlength"];
            } else if (strpos($url,"passwordmatch") !== false) {
                echo $_SESSION["passwordmatch"];
            }
            ?>
            <input type="password" name="oldpassword" placeholder="Old Password" required>
            <input type="password" name="newpassword" placeholder="New Password" required>
            <input type="password" name="repeatpassword" placeholder="Repeat Password" required>
            <input type="submit" name="update" value="Update">
        </form>
    </div>
</body>

</html>