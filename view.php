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

<!DOCTYPE html>
<html>
<head>
<title>User Details</title>
</head>
<body>

<h2>User Details</h2>

<p>First Name: <?php echo $user['first_name']; ?></p>
<p>Last Name: <?php echo $user['last_name']; ?></p>
<p>Address: <?php echo $user['address']; ?></p>
<p>Country: <?php echo $user['country']; ?></p>
<p>Gender: <?php echo $user['gender']; ?></p>
<p>Skills: <?php echo $user['skills']; ?></p>
<p>Username: <?php echo $user['username']; ?></p>

<br>

<a href="data.php">Back to List</a>

</body>
</html>

<?php
mysqli_close($connection);
?>