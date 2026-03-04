<?php
$row_number = $_GET['id'];

$lines = file(__DIR__ . "/users.txt");
if(!isset($lines[$row_number])) {
    echo "User not found.";
    exit();
}
else {
    $user_line = $lines[$row_number];
}
$user_data = explode(",", $user_line);
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <h2>User Details</h2>
    <p>First Name: <?php echo $user_data[0]; ?></p>
    <p>Last Name: <?php echo $user_data[1]; ?></p>
    <p>Address: <?php echo $user_data[2]; ?></p>
    
    <br>
    <a href="data.php">Back to List</a>
</body>
</html>