<?php

require "dbconfig.php";

if(isset($_POST['skills'])) {
    $skills = implode(",", $_POST['skills']);
}
else {
    $skills = "";
}
$sql = "INSERT INTO users
(first_name, last_name, address, country, gender, skills, username, password_hash)
VALUES
('{$_POST['first_name']}', '{$_POST['last_name']}', '{$_POST['address']}', '{$_POST['country']}', '{$_POST['gender']}', '$skills', '{$_POST['username']}', '{$_POST['password']}')";

mysqli_query($connection, $sql);

echo "Inserted successfully";

mysqli_close($connection);
header("Location: data.php");

?>