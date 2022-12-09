<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrum Project</title>
    <link rel="stylesheet" href="css/index.css">
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

    <section class="container">
        <div class="card">
            <div class="card-image mario-kart"></div>
            <h2>Mario Kart</h2>
            <p>Mario Kart is a series of racing games developed and published by Nintendo. Players compete in go-kart
                races while using various power-up items. It features characters and courses from the Mario series as
                well as other gaming franchises such as The Legend of Zelda, Animal Crossing, and Splatoon.</p>
            <a href="mkaddscore">Add Score</a>
            <a href="mkleaderboard">Leaderboard</a>
        </div>

        <div class="card">
            <div class="card-image table-tennis"></div>
            <h2>Table tennis</h2>
            <p>Table tennis, also known as ping-pong and whiff-whaff, is a sport in which two or four players hit a
                lightweight ball, also known as the ping-pong ball, back and forth across a table using small solid
                rackets.</p>

            <br><br><br>

            <a href="ttaddscore">Add Score</a>
            <a href="ttleaderboard">Leaderboard</a>
        </div>
    </section>
</body>

</html>