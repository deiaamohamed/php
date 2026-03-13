<?php
session_start();

require "classes/Database.php";
require "classes/User.php";
require "classes/Auth.php";

$database = new Database();
$userObj = new User($database);
$auth = new Auth($userObj);

if(!$auth->isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$user = $userObj->getUserById($id);
if (!$user) {
    echo "User not found.";
    exit();
}

$userObj->deleteUser($id);

$database->closeConnection();

header("Location: data.php");
exit();

header("Location: data.php");
exit();
?>