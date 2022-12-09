<?php

class Login extends DB {

    protected function getUser($username, $password) {
        $stmt = $this->connect()->prepare("SELECT password FROM users WHERE username = ? OR email = ?");

        if (!$stmt->execute(array($username, $password))) {
            $stmt = null;
            header("Location: ../index");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            session_start();
            $_SESSION["accountnotfound"] = "Account not found!";
            header("Location: ../login?error=accountnotfound");
            exit();
        }

        $hashedPassword = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $hashedPassword[0]['password']);

        if ($checkPassword == false) {
            $stmt = null;
            session_start();
            $_SESSION["wrongpassword"] = "Wrong Password!";
            header("Location: ../login?error=wrongpassword");
            exit();
        } else if ($checkPassword == true) {
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE username = ? OR email = ? AND password = ?");

            if (!$stmt->execute(array($username, $username, $password))) {
                $stmt = null;
                header("Location: ../index");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("Location: ../index");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['userid'] = $user[0]['id'];
            $_SESSION['username'] = $user[0]['username'];

            $stmt = null;
        }

        $stmt = null;
    }

}

?>