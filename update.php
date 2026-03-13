<?php
require "dbconfig.php";

$id = $_POST['id'];
$image = "";

if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error']==0){

    if($_FILES['profile_image']['size'] > $maxSize){
        echo "<div class='alert alert-danger'>
        Image is too large. Maximum size is 2MB.</div>";
        exit();
    }
    $image = file_get_contents($_FILES['profile_image']['tmp_name']);
    $image = mysqli_real_escape_string($connection,$image);
}
$sql = "UPDATE users SET
profile_image = '$image',
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