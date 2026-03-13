<?php

require "dbconfig.php";

if (isset($_POST['skills'])) {
    $skills = implode(",", $_POST['skills']);
} else {
    $skills = "";
}



if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {

    $image = file_get_contents($_FILES['profile_image']['tmp_name']);
    $maxSize = 2 * 1024 * 1024; // 2MB

        if ($_FILES['profile_image']['size'] > $maxSize) {
            die("Image too large. Maximum size is 2MB.");
        }
    $image = mysqli_real_escape_string($connection, $image);
}

$sql = "INSERT INTO users
(first_name, last_name, address, country, gender, skills, username, password_hash, profile_image)
VALUES
('{$_POST['first_name']}',
 '{$_POST['last_name']}',
 '{$_POST['address']}',
 '{$_POST['country']}',
 '{$_POST['gender']}',
 '$skills',
 '{$_POST['username']}',
 '{$_POST['password']}',
 '$image')";

if (mysqli_query($connection, $sql)) {
    header("Location: data.php");
    exit;
} else {
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);

?>