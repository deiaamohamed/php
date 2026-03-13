<?php

require "classes/Database.php";
require "classes/User.php";

$database = new Database();
$userObj = new User($database);

$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$address = $_POST['address'] ?? '';
$country = $_POST['country'] ?? '';
$gender = $_POST['gender'] ?? '';
$skills = $_POST['skills'] ?? [];
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$image = null;
if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
    $maxSize = 2 * 1024 * 1024;
    
    if ($_FILES['profile_image']['size'] > $maxSize) {
        die("Image too large. Maximum size is 2MB.");
    }
    
    $image = file_get_contents($_FILES['profile_image']['tmp_name']);
    $image = mysqli_real_escape_string($database->getConnection(), $image);
}

if ($userObj->createUser($first_name, $last_name, $address, $country, $gender, $skills, $username, $password, $image)) {
    header("Location: data.php");
    exit;
} else {
    echo "Error: " . mysqli_error($database->getConnection());
}

$database->closeConnection();

?>