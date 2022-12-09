<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Score - Tafeltennis</title>
    <link rel="stylesheet" href="css/ttaddscore.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <script src="javascript/button.js"></script>
</head>

<body>
    <div class="navbar">
        <a href="index">Home</a>
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
                <a href="ttaddscore" class="active">Add Score</a>
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
        <form action="ttinsert" method="POST">
            <input type="text" onkeyup="input()" name="p1username" id="p1username" placeholder="Player 1" required>
            <input type="text" onkeyup="input()" name="p2username" id="p2username" placeholder="Player 2" required>

            <p>Who won?</p>

            <input type="submit" value="Player 1" name="p1" id="p1" class="half" disabled>
            <input type="submit" value="Player 2" name="p2" id="p2" class="half" disabled>
        </form>
    </div>
</body>

</html>