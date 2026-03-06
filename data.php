<?php
require "dbconfig.php";

$sql = "SELECT * FROM users";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Users List</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h3 class="mb-4 text-center">Users</h3>

<div class="card shadow">
<div class="card-body">

<table class="table table-bordered table-hover table-striped">

<tr class="table-dark">
    <th>First Name</th>
    <th>Last Name</th>
    <th>Address</th>
    <th>Country</th>
    <th>Gender</th>
    <th>Skills</th>
    <th>Username</th>
    <th>Department</th>
    <th>Action</th>
</tr>

<?php

while($user = mysqli_fetch_assoc($result)) {

    echo "<tr>";

    echo "<td>".$user['first_name']."</td>";
    echo "<td>".$user['last_name']."</td>";
    echo "<td>".$user['address']."</td>";
    echo "<td>".$user['country']."</td>";
    echo "<td>".$user['gender']."</td>";
    echo "<td>".$user['skills']."</td>";
    echo "<td>".$user['username']."</td>";
    echo "<td>".$user['department']."</td>";

    echo "<td>
        <a href='view.php?id=".$user['id']."' class='btn btn-info btn-sm'>View</a>
        <a href='edit.php?id=".$user['id']."' class='btn btn-warning btn-sm'>Edit</a>
        <a href='delete.php?id=".$user['id']."' class='btn btn-danger btn-sm'>Delete</a>
    </td>";

    echo "</tr>";
}

?>

</table>

</div>
</div>

</div>

</body>
</html>

<?php
mysqli_close($connection);
?>