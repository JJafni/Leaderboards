<?php
session_start();

include "classes/db.classes.php";
$db = new DB();
$results = $db->getTTData();

$ranking = 0;

function ordinal($number) {
    if (!in_array(($number % 100), array(11, 12, 13))){
        switch ($number % 10) {
            case 1:
                return $number . "st";
            case 2:
                return $number . "nd";
            case 3:
                return $number . "rd";
        }
    }
    return $number . "th";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard - Tafeltennis</title>
    <link rel="stylesheet" href="css/ttleaderboard.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
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
                <a href="ttaddscore">Add Score</a>
                <a href="ttleaderboard" class="active">Leaderboard</a>
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
        <table>
            <tr>
                <th>Ranking</th>
                <th>Username</th>
                <th>Won</th>
                <th>Lost</th>
            </tr>
            <?php
            while ($row = $results->fetch()) {
                $username = $row["username"];
                $won = $row["won"];
                $lost = $row["lost"];
                $ranking++;
            ?>
            <tr>
                <td><?= ordinal($ranking) ?></td>
                <td><a href="playerprofile?username=<?= $username ?>"><?= $username ?></a></td>
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