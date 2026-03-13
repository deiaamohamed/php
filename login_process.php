<?php
session_start();

require "classes/Database.php";
require "classes/User.php";
require "classes/Auth.php";

$username = $_POST['username'];
$password = $_POST['password'];

$database = new Database();
$userObj = new User($database);
$auth = new Auth($userObj);

if($auth->login($username, $password)) {
    header("Location: data.php");
    exit();
} else {
    echo "Invalid username or password";
}

$database->closeConnection();
?>