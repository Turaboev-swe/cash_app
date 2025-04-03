<?php

declare(strict_types=1);

class User {
    private mysqli $mysqli;

    public function __construct()
    {
        $this->mysqli = DB::connect();
    }

    public function register(): void
    {
        if (isset($_POST['email'], $_POST['password'])) {
            if ($this->isUserExist()) {
                echo "User already exists.";
            } else {
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                $stmt = $this->mysqli->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
                $stmt->bind_param("ss", $email, $password);
                $result = $stmt->execute();

                if ($result) {
                    header('Location: /');
                } else {
                    echo 'Something went wrong';
                }
            }
        }
    }

    public function login(): void
    {
        if (isset($_POST['email'], $_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $this->mysqli->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $email;
                header('Location: /');
            } else {
                echo "Something went wrong";
            }
        }
    }

    public function logout(): void
    {
        session_start();
        session_destroy();
        header('Location: /');
        exit();
    }

    public function isUserExist(): bool
    {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $stmt = $this->mysqli->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            return (bool)$result->fetch_assoc();
        }
        return false;
    }
}
?>
