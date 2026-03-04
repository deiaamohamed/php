<?php

    // connection
        $connection=mysqli_connect("localhost","root","Jpanzer2","students");
         if($connection->connect_error) {
        die("Connection failed ");
    }
    //query
    $connection->query("INSERT INTO users
(first_name, last_name, address, country, gender, skills, username, password_hash)
VALUES
('Deiaa', 'Mohamed', 'Cairo', 'EGYPT', 'Male', 'PHP,Python', 'deiaa123', 'hashed_password_here')");

//close
$connection->close();

?>