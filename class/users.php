<?php

include_once 'config/connection.php';
include_once 'login.php';

class users
{
    protected $username;
    protected $email;

    public function __construct($username, $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    public static function checkUser($username, $email)
    {
        if (isset($username) && isset($email)) {
            $conn = new connection("localhost", "root", "", "users");
            $sql = $conn->connect()->query("SELECT * FROM users WHERE username = '$username' AND email = '$email'");
            if ($sql->num_rows === 1) {
                echo "User Exists, echo from users.php";
                return $sql;
            } else {
                return false;
            }
        }

        return false;
    }

    public function addUser()
    {
        if (isset($username) && isset($email)) {
            $conn = new connection("localhost", "root", "", "users");
            $sql = $conn->connect()->query("INSERT INTO users(username, email) VALUES('$username', '$email')");
            if ($sql) {
                return true;
            } else {
                return false;
            }
        }

        return false;
    }
}
