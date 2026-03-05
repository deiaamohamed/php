<?php
require "dbconfig.php";

$sql = "SELECT * FROM users";
$result = mysqli_query($connection, $sql);
?>

<hr>
<h3>Users</h3>

<table border="1" cellpadding="10">
<tr>
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
        <a href='view.php?id=".$user['id']."'>View</a> |
        <a href='delete.php?id=".$user['id']."'>Delete</a>
    </td>";

    echo "</tr>";
}

?>

</table>

<?php
mysqli_close($connection);

?>