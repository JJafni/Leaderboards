<?php

class Register extends DB {

    protected function setUser($username, $password, $email) {
        $stmt = $this->connect()->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($username, $hashedPassword, $email))) {
            $stmt = null;
            header("Location: ../index");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($username, $email) {
        $stmt = $this->connect()->prepare("SELECT username FROM users WHERE username = ? OR email = ?");

        if (!$stmt->execute(array($username, $email))) {
            $stmt = null;
            header("Location: ../index");
            exit();
        }

        $resultCheck;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

}

?>