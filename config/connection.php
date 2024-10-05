<?php

class connection
{
    private $localhost;
    private $user;
    private $pass;
    private $dbname;

    public function __construct($localhost, $user, $pass, $dbname)
    {
        $this->localhost = $localhost;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
    }

    public function connect()
    {
        $conn = new mysqli($this->localhost, $this->user, $this->pass, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            return $conn;
            echo "Connected successfully";
        }
    }
}
