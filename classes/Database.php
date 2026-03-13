<?php

class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "Jpanzer2";
    private $database = "students";
    private $connection;

    public function __construct() {
        $this->connection = mysqli_connect(
            $this->host,
            $this->user,
            $this->password,
            $this->database
        );

        if (!$this->connection) {
            die("Database Connection Failed");
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public function query($sql) {
        return mysqli_query($this->connection, $sql);
    }

    public function closeConnection() {
        mysqli_close($this->connection);
    }
}

?>
