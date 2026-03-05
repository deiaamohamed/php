<?php
require "dbconfig.php";

$id = $_GET['id'];

$check = mysqli_query($connection, "SELECT id FROM users WHERE id = $id");
if (mysqli_num_rows($check) == 0) {
    echo "User not found.";
    exit();
}

mysqli_query($connection, "DELETE FROM users WHERE id = $id");

mysqli_close($connection);

header("Location: data.php");
exit();
?>