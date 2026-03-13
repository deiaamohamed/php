<?php
session_start();

require "dbconfig.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password_hash='$password'";
$result = mysqli_query($connection, $sql);

if(mysqli_num_rows($result) == 1){

    $user = mysqli_fetch_assoc($result);

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    header("Location: data.php");
    exit();

}else{

    echo "Invalid username or password";
}

mysqli_close($connection);
?>