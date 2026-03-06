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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">User Details</h3>
    </div>

    <div class="card-body">

        <ul class="list-group list-group-flush">

            <li class="list-group-item">
                <strong>First Name:</strong> <?php echo $user['first_name']; ?>
            </li>

            <li class="list-group-item">
                <strong>Last Name:</strong> <?php echo $user['last_name']; ?>
            </li>

            <li class="list-group-item">
                <strong>Address:</strong> <?php echo $user['address']; ?>
            </li>

            <li class="list-group-item">
                <strong>Country:</strong> <?php echo $user['country']; ?>
            </li>

            <li class="list-group-item">
                <strong>Gender:</strong> <?php echo $user['gender']; ?>
            </li>

            <li class="list-group-item">
                <strong>Skills:</strong> <?php echo $user['skills']; ?>
            </li>

            <li class="list-group-item">
                <strong>Username:</strong> <?php echo $user['username']; ?>
            </li>

        </ul>

        <div class="mt-4">
            <a href="data.php" class="btn btn-secondary">Back to List</a>
        </div>

    </div>
</div>

</div>

</body>
</html>

<?php
mysqli_close($connection);
?>