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

$id = $_POST['id'];
$image = null;
$maxSize = 2 * 1024 * 1024; 

if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
    if($_FILES['profile_image']['size'] > $maxSize) {
        echo "<div class='alert alert-danger'>
        Image is too large. Maximum size is 2MB.</div>";
        exit();
    }
    $image = file_get_contents($_FILES['profile_image']['tmp_name']);
    $image = mysqli_real_escape_string($database->getConnection(), $image);
}

$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$address = $_POST['address'] ?? '';
$country = $_POST['country'] ?? '';
$gender = $_POST['gender'] ?? '';
$skills = $_POST['skills'] ?? '';

$userObj->updateUser($id, $first_name, $last_name, $address, $country, $gender, explode(',', $skills));

$database->closeConnection();

header("Location: data.php");
exit();
?>