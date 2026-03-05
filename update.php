<?php
require "dbconfig.php";

$id = $_POST['id'];

$sql = "UPDATE users SET
first_name = '{$_POST['first_name']}',
last_name = '{$_POST['last_name']}',
address = '{$_POST['address']}',
country = '{$_POST['country']}',
gender = '{$_POST['gender']}',
skills = '{$_POST['skills']}',
username = '{$_POST['username']}',
password_hash = '{$_POST['password']}'
WHERE id = $id";

mysqli_query($connection, $sql);

mysqli_close($connection);

header("Location: data.php");
exit();
?>