<?php

$connection = mysqli_connect("localhost","root","Jpanzer2","students");

if(!$connection){
    die("Connection failed");
}


$connection->close();

?>