<?php
session_start();
$amount =  $_SESSION["amount"] = $_POST["amount"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Score - Mario Kart</title>
    <link rel="stylesheet" href="css/mkinput.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="navbar">
        <a href="index">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Mario Kart</button>
            <div class="dropdown-content">
                <a href="mkaddscore" class="active">Add Score</a>
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
        <form action="mkinsert" method="POST">
        <?php
        for ($i = 1; $i <= $amount; $i++) {
        ?>
        <input type="text" name="<?= $i . "username" ?>" placeholder="Username" required>
        <input type="number" name="<?= $i . "place" ?>" placeholder="Place" min="1" max="12" require>
        <br><br>
        <?php
        }
        if ($amount > 1) {
        ?>
        <input type="submit" value="Add players" name="insert" required>
        <?php
        } else {
        ?>
        <input type="submit" value="Add player" name="insert" required>
        <?php
        }
        ?>
        </form>
    </div>
</body>

</html>