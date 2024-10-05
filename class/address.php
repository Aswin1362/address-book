<?php

include_once 'config/connection.php';
include_once 'class/users.php';

class address extends users
{
    private $phone;
    private $userId;
    private $conn;

    public function __construct($userId, $username, $email, $phone)
    {
        parent::__construct($username, $email);
        $this->phone = $phone;
        $this->userId = $userId;
        $this->conn = new connection("localhost", "root", "", "users");
    }

    public function addAddress()
    {
        if (isset($this->username) && isset($this->email) && isset($this->phone)) {
            if (!isset($this->userId) && empty($this->userId)) {
                header("Location: login.html");
                exit();
            } else {
                $sql = $this->conn->connect()->query("INSERT INTO address(user_id, username, email, phone) VALUES('$this->userId', '$this->username', '$this->email', '$this->phone')");
                if ($sql === true) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        return false;
    }

    public static function getAddress($userId)
    {
        if ($_SESSION['user_id'] === $userId) {
            $conn = new connection("localhost", "root", "", "users");
            $sql = $conn->connect()->query("SELECT * FROM address WHERE user_id = '$userId'");
            if ($sql->num_rows > 0) {
                $results = [];
                while ($row = $sql->fetch_assoc()) {
                    $results[] = $row;
                }
                return $results;
            } else {
                return false;
            }
        } else {
            echo "Not Logged In, echo from users.php";
            header("Location: login.html");
        }
    }

}
