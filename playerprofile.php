<?php
session_start();

include "classes/db.classes.php";
$db = new DB();
$resultsMK = $db->getPlayerMKProfile();
$resultsTT = $db->getPlayerTTProfile();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_GET["username"] ?>'s Profile</title>
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
        <h1 class="left">Mario Kart</h1>
        <table>
            <tr>
                <th>Total Score</th>
                <th>Total Matches</th>
                <th>Average Place</th>
            </tr>
            <?php
            while ($row = $resultsMK->fetch()) {
                $total_score = $row["total_score"];
                $total_matches = $row["total_matches"];
                $average_place = $row["average_place"];
            ?>
            <tr>
                <td><?= $total_score ?></td>
                <td><?= $total_matches ?></td>
                <td><?= $average_place ?></td>
            </tr>
            <?php
            }
            ?>
        </table>

        <h1 class="left">Table Tennis</h1>
        <table>
            <tr>
                <th>Won</th>
                <th>Lost</th>
            </tr>
            <?php
            while ($row = $resultsTT->fetch()) {
                $won = $row["won"];
                $lost = $row["lost"];
            ?>
            <tr>
                <td><?= $won ?></td>
                <td><?= $lost ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>