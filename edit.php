<?php
require "dbconfig.php";

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($connection, $sql);

if(mysqli_num_rows($result) == 0){
    echo "User not found";
    exit();
}

$user = mysqli_fetch_assoc($result);
?>

<form action="update.php" method="POST">

<input type="hidden" name="id" value="<?php echo $user['id']; ?>">

First Name:
<input type="text" name="first_name" value="<?php echo $user['first_name']; ?>"><br>

Last Name:
<input type="text" name="last_name" value="<?php echo $user['last_name']; ?>"><br>

Address:
<input type="text" name="address" value="<?php echo $user['address']; ?>"><br>

Country:
<input type="text" name="country" value="<?php echo $user['country']; ?>"><br>

Gender:
<input type="text" name="gender" value="<?php echo $user['gender']; ?>"><br>

Skills:
<input type="text" name="skills" value="<?php echo $user['skills']; ?>"><br>

Username:
<input type="text" name="username" value="<?php echo $user['username']; ?>"><br>

Password:
<input type="text" name="password" value="<?php echo $user['password_hash']; ?>"><br>

<button type="submit">Update</button>

</form>