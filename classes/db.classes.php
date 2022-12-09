<?php

class DB {

    protected function connect() {
        try {
            $username = "root";
            $password = "";
            $db = new PDO("mysql:host=localhost;dbname=leaderboard", $username, $password);
            return $db;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function insertUpdatedUser() {
        $username = $_POST['username'];
        $stmt = $this->connect()->prepare("SELECT username FROM users WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $user = $stmt->fetch();

        session_start();
        if ($user) {
            $_SESSION["usernametaken"] = "Username already taken!";
            header("Location: edituser?error=usernametaken");
        } else {
            $stmt = $this->connect()->prepare("UPDATE users SET username = :username WHERE id = :id");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":id", $_SESSION["userid"]);
            $stmt->execute();

            $stmt = $this->connect()->prepare("UPDATE mariokart SET username = :username WHERE id = :id");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":id", $_SESSION["userid"]);
            $stmt->execute();

            $stmt = $this->connect()->prepare("UPDATE tafeltennis SET username = :username WHERE id = :id");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":id", $_SESSION["userid"]);
            $stmt->execute();

            $_SESSION["username"] = $username;
            header("Location: profile");
        }

        return $stmt;
    }

    public function insertUpdatedPassword() {
        session_start();
        $stmt = $this->connect()->prepare("SELECT password FROM users WHERE username = :username");
        $stmt->bindParam(":username", $_SESSION['username']);
        $stmt->execute();

        $oldpassword = $_POST['oldpassword'];
        $hashedPassword = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify("$oldpassword", $hashedPassword[0]['password']);

        if ($checkPassword == false) {
            $_SESSION["oldpassword"] = "Incorrect old password!";
            header("Location: changepassword?error=oldpassword");
        } else if ($checkPassword == true) {
            if (strlen($_POST["newpassword"]) < 8) {
                $_SESSION["passwordlength"] = "Passwords should have a minimum of 8 characters!";
                header("Location: changepassword?error=passwordlength");
            } else {
                if ($_POST["newpassword"] == $_POST["repeatpassword"]) {
                    $newpassword = $_POST['newpassword'];
                    $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);

                    $stmt = $this->connect()->prepare("UPDATE users SET password = :password WHERE username = :username");
                    $stmt->bindParam(":password", $hashedPassword);
                    $stmt->bindParam(":username", $_SESSION['username']);
                    $stmt->execute();
                    header("Location: profile");
                } else {
                    $_SESSION["passwordmatch"] = "Password must match!";
                    header("Location: changepassword?error=passwordmatch");
                }
            }
        }

        return $stmt;
    }

    public function insertMKData() {
        session_start();
        $amount = $_SESSION["amount"];
        for ($i = 1; $i <= $amount; $i++) {
            $username = $_POST[$i . "username"];
            $place = $_POST[$i . "place"];

            $results = $this->connect()->prepare("SELECT COUNT(*) FROM mariokart WHERE username = :username");
            $results->bindParam(":username", $username);
            $results->execute();
            $r = $results->fetchColumn();

            $fifteen = 15;
            $twelve = 12;
            $ten = 10;
            $nine = 9;
            $eight = 8;
            $seven = 7;
            $six = 6;
            $five = 5;
            $four = 4;
            $three = 3;
            $two = 2;
            $one = 1;
        
            if ($r > 0) {
                if ($place == 1) {
                    $stmt = $this->connect()->prepare("UPDATE mariokart SET total_matches = total_matches + 1, total_score = total_score + 15, average_place = (average_place + :place) / 2 WHERE username = :username");
                    $stmt->bindParam(":place", $place);
                    $stmt->bindParam(":username", $username);
                    $stmt->execute();
                } else if ($place == 2) {
                    $stmt = $this->connect()->prepare("UPDATE mariokart SET total_matches = total_matches + 1, total_score = total_score + 12, average_place = (average_place + :place) / 2 WHERE username = :username");
                    $stmt->bindParam(":place", $place);
                    $stmt->bindParam(":username", $username);
                    $stmt->execute();
                } else if ($place == 3) {
                    $stmt = $this->connect()->prepare("UPDATE mariokart SET total_matches = total_matches + 1, total_score = total_score + 10, average_place = (average_place + :place) / 2 WHERE username = :username");
                    $stmt->bindParam(":place", $place);
                    $stmt->bindParam(":username", $username);
                    $stmt->execute();
                } else if ($place == 4) {
                    $stmt = $this->connect()->prepare("UPDATE mariokart SET total_matches = total_matches + 1, total_score = total_score + 9, average_place = (average_place + :place) / 2 WHERE username = :username");
                    $stmt->bindParam(":place", $place);
                    $stmt->bindParam(":username", $username);
                    $stmt->execute();
                } else if ($place == 5) {
                    $stmt = $this->connect()->prepare("UPDATE mariokart SET total_matches = total_matches + 1, total_score = total_score + 8, average_place = (average_place + :place) / 2 WHERE username = :username");
                    $stmt->bindParam(":place", $place);
                    $stmt->bindParam(":username", $username);
                    $stmt->execute();
                } else if ($place == 6) {
                    $stmt = $this->connect()->prepare("UPDATE mariokart SET total_matches = total_matches + 1, total_score = total_score + 7, average_place = (average_place + :place) / 2 WHERE username = :username");
                    $stmt->bindParam(":place", $place);
                    $stmt->bindParam(":username", $username);
                    $stmt->execute();
                } else if ($place == 7) {
                    $stmt = $this->connect()->prepare("UPDATE mariokart SET total_matches = total_matches + 1, total_score = total_score + 6, average_place = (average_place + :place) / 2 WHERE username = :username");
                    $stmt->bindParam(":place", $place);
                    $stmt->bindParam(":username", $username);
                    $stmt->execute();
                } else if ($place == 8) {
                    $stmt = $this->connect()->prepare("UPDATE mariokart SET total_matches = total_matches + 1, total_score = total_score + 5, average_place = (average_place + :place) / 2 WHERE username = :username");
                    $stmt->bindParam(":place", $place);
                    $stmt->bindParam(":username", $username);
                    $stmt->execute();
                } else if ($place == 9) {
                    $stmt = $this->connect()->prepare("UPDATE mariokart SET total_matches = total_matches + 1, total_score = total_score + 4, average_place = (average_place + :place) / 2 WHERE username = :username");
                    $stmt->bindParam(":place", $place);
                    $stmt->bindParam(":username", $username);
                    $stmt->execute();
                } else if ($place == 10) {
                    $stmt = $this->connect()->prepare("UPDATE mariokart SET total_matches = total_matches + 1, total_score = total_score + 3, average_place = (average_place + :place) / 2 WHERE username = :username");
                    $stmt->bindParam(":place", $place);
                    $stmt->bindParam(":username", $username);
                    $stmt->execute();
                } else if ($place == 11) {
                    $stmt = $this->connect()->prepare("UPDATE mariokart SET total_matches = total_matches + 1, total_score = total_score + 2, average_place = (average_place + :place) / 2 WHERE username = :username");
                    $stmt->bindParam(":place", $place);
                    $stmt->bindParam(":username", $username);
                    $stmt->execute();
                } else if ($place == 12) {
                    $stmt = $this->connect()->prepare("UPDATE mariokart SET total_matches = total_matches + 1, total_score = total_score + 1, average_place = (average_place + :place) / 2 WHERE username = :username");
                    $stmt->bindParam(":place", $place);
                    $stmt->bindParam(":username", $username);
                    $stmt->execute();
                }
            } else {
                if ($place == 1) {
                    $stmt = $this->connect()->prepare("INSERT INTO mariokart (username, total_score, total_matches, average_place) VALUES (:username, :total_score, :total_matches, :average_place)");
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":total_score", $fifteen);
                    $stmt->bindParam(":total_matches", $one);
                    $stmt->bindParam(":average_place", $place);
                    $stmt->execute();
                } else if ($place == 2) {
                    $stmt = $this->connect()->prepare("INSERT INTO mariokart (username, total_score, total_matches, average_place) VALUES (:username, :total_score, :total_matches, :average_place)");
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":total_score", $twelve);
                    $stmt->bindParam(":total_matches", $one);
                    $stmt->bindParam(":average_place", $place);
                    $stmt->execute();
                } else if ($place == 3) {
                    $stmt = $this->connect()->prepare("INSERT INTO mariokart (username, total_score, total_matches, average_place) VALUES (:username, :total_score, :total_matches, :average_place)");
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":total_score", $ten);
                    $stmt->bindParam(":total_matches", $one);
                    $stmt->bindParam(":average_place", $place);
                    $stmt->execute();
                } else if ($place == 4) {
                    $stmt = $this->connect()->prepare("INSERT INTO mariokart (username, total_score, total_matches, average_place) VALUES (:username, :total_score, :total_matches, :average_place)");
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":total_score", $nine);
                    $stmt->bindParam(":total_matches", $one);
                    $stmt->bindParam(":average_place", $place);
                    $stmt->execute();
                } else if ($place == 5) {
                    $stmt = $this->connect()->prepare("INSERT INTO mariokart (username, total_score, total_matches, average_place) VALUES (:username, :total_score, :total_matches, :average_place)");
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":total_score", $eight);
                    $stmt->bindParam(":total_matches", $one);
                    $stmt->bindParam(":average_place", $place);
                    $stmt->execute();
                } else if ($place == 6) {
                    $stmt = $this->connect()->prepare("INSERT INTO mariokart (username, total_score, total_matches, average_place) VALUES (:username, :total_score, :total_matches, :average_place)");
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":total_score", $seven);
                    $stmt->bindParam(":total_matches", $one);
                    $stmt->bindParam(":average_place", $place);
                    $stmt->execute();
                } else if ($place == 7) {
                    $stmt = $this->connect()->prepare("INSERT INTO mariokart (username, total_score, total_matches, average_place) VALUES (:username, :total_score, :total_matches, :average_place)");
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":total_score", $six);
                    $stmt->bindParam(":total_matches", $one);
                    $stmt->bindParam(":average_place", $place);
                    $stmt->execute();
                } else if ($place == 8) {
                    $stmt = $this->connect()->prepare("INSERT INTO mariokart (username, total_score, total_matches, average_place) VALUES (:username, :total_score, :total_matches, :average_place)");
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":total_score", $five);
                    $stmt->bindParam(":total_matches", $one);
                    $stmt->bindParam(":average_place", $place);
                    $stmt->execute();
                } else if ($place == 9) {
                    $stmt = $this->connect()->prepare("INSERT INTO mariokart (username, total_score, total_matches, average_place) VALUES (:username, :total_score, :total_matches, :average_place)");
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":total_score", $four);
                    $stmt->bindParam(":total_matches", $one);
                    $stmt->bindParam(":average_place", $place);
                    $stmt->execute();
                } else if ($place == 10) {
                    $stmt = $this->connect()->prepare("INSERT INTO mariokart (username, total_score, total_matches, average_place) VALUES (:username, :total_score, :total_matches, :average_place)");
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":total_score", $three);
                    $stmt->bindParam(":total_matches", $one);
                    $stmt->bindParam(":average_place", $place);
                    $stmt->execute();
                } else if ($place == 11) {
                    $stmt = $this->connect()->prepare("INSERT INTO mariokart (username, total_score, total_matches, average_place) VALUES (:username, :total_score, :total_matches, :average_place)");
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":total_score", $two);
                    $stmt->bindParam(":total_matches", $one);
                    $stmt->bindParam(":average_place", $place);
                    $stmt->execute();
                } else if ($place == 12) {
                    $stmt = $this->connect()->prepare("INSERT INTO mariokart (username, total_score, total_matches, average_place) VALUES (:username, :total_score, :total_matches, :average_place)");
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":total_score", $one);
                    $stmt->bindParam(":total_matches", $one);
                    $stmt->bindParam(":average_place", $place);
                    $stmt->execute();
                }
            }
        }

        header("Location: mkleaderboard");
        return $stmt;
    }

    public function getMKData() {
        $stmt = $this->connect()->prepare("SELECT * FROM mariokart ORDER BY total_score DESC, total_matches ASC");
        $stmt->execute();
        return $stmt;
    }

    public function getMKProfileData() {
        $stmt = $this->connect()->prepare("SELECT * FROM mariokart WHERE username = :username");
        $stmt->bindParam(":username", $_SESSION['username']);
        $stmt->execute();
        return $stmt;
    }

    public function getPlayerMKProfile() {
        $stmt = $this->connect()->prepare("SELECT * FROM mariokart WHERE username = :username");
        $stmt->bindParam(":username", $_GET["username"]);
        $stmt->execute();
        return $stmt;
    }

    public function insertTTData() {
        $p1username = $_POST["p1username"];
        $results1 = $this->connect()->prepare("SELECT COUNT(*) FROM tafeltennis WHERE username = :username");
        $results1->bindParam(":username", $p1username);
        $results1->execute();
        $r1 = $results1->fetchColumn();

        $p2username = $_POST["p2username"];
        $results2 = $this->connect()->prepare("SELECT COUNT(*) FROM tafeltennis WHERE username = :username");
        $results2->bindParam(":username", $p2username);
        $results2->execute();
        $r2 = $results2->fetchColumn();

        $one = 1;
        $zero = 0;

        if ($_POST["p1"]) {
            if ($r1 > 0) {
                $stmt = $this->connect()->prepare("UPDATE tafeltennis SET won = won + 1 WHERE username = :username");
                $stmt->bindParam(":username", $p1username);
                $stmt->execute();
            } else {
                $stmt = $this->connect()->prepare("INSERT INTO tafeltennis (username, won, lost) VALUES (:username, :won, :lost)");
                $stmt->bindParam(":username", $p1username);
                $stmt->bindParam(":won", $one);
                $stmt->bindParam(":lost", $zero);
                $stmt->execute();
            }
        
            if ($r2 > 0) {
                $stmt = $this->connect()->prepare("UPDATE tafeltennis SET lost = lost + 1 WHERE username = :username");
                $stmt->bindParam(":username", $p2username);
                $stmt->execute();
            } else {
                $stmt = $this->connect()->prepare("INSERT INTO tafeltennis (username, won, lost) VALUES (:username, :won, :lost)");
                $stmt->bindParam(":username", $p2username);
                $stmt->bindParam(":won", $zero);
                $stmt->bindParam(":lost", $one);
                $stmt->execute();
            }
        } else if ($_POST["p2"]) {
            if ($r1 > 0) {
                $stmt = $this->connect()->prepare("UPDATE tafeltennis SET lost = lost + 1 WHERE username = :username");
                $stmt->bindParam(":username", $p1username);
                $stmt->execute();
            } else {
                $stmt = $this->connect()->prepare("INSERT INTO tafeltennis (username, won, lost) VALUES (:username, :won, :lost)");
                $stmt->bindParam(":username", $p1username);
                $stmt->bindParam(":won", $zero);
                $stmt->bindParam(":lost", $one);
                $stmt->execute();
            }
        
            if ($r2 > 0) {
                $stmt = $this->connect()->prepare("UPDATE tafeltennis SET won = won + 1 WHERE username = :username");
                $stmt->bindParam(":username", $p2username);
                $stmt->execute();
            } else {
                $stmt = $this->connect()->prepare("INSERT INTO tafeltennis (username, won, lost) VALUES (:username, :won, :lost)");
                $stmt->bindParam(":username", $p2username);
                $stmt->bindParam(":won", $one);
                $stmt->bindParam(":lost", $zero);
                $stmt->execute();
            }
        }

        header("Location: ttleaderboard");
        return $stmt;
    }

    public function getTTData() {
        $stmt = $this->connect()->prepare("SELECT * FROM tafeltennis ORDER BY won DESC, lost ASC");
        $stmt->execute();
        return $stmt;
    }

    public function getTTProfileData() {
        $stmt = $this->connect()->prepare("SELECT * FROM tafeltennis WHERE username = :username");
        $stmt->bindParam(":username", $_SESSION['username']);
        $stmt->execute();
        return $stmt;
    }

    public function getPlayerTTProfile() {
        $stmt = $this->connect()->prepare("SELECT * FROM tafeltennis WHERE username = :username");
        $stmt->bindParam(":username", $_GET["username"]);
        $stmt->execute();
        return $stmt;
    }

}

?>