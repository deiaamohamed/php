<?php


if(isset($_GET['submit'])){
   $fname=$_GET['name'];
    $lname=$_GET['lastname'];
    $address=$_GET['address'];
    $country=$_GET['country'];
    $gender=$_GET['gender'];
    $skills=$_GET['skills'];
    $username=$_GET['username'];
    $password=$_GET['password'];
    $department=$_GET['department'];    


$skills_string = implode("-", $skills);

$record = "$fname,$lname,$address,$country,$gender,$skills_string,$username,$password,$department".PHP_EOL;
file_put_contents("users.txt", $record, FILE_APPEND);
    
}

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
        <th>Password</th>
        <th>Department</th>
        <th>Action</th>
    </tr>
    
    <?php
    $lines = file(__DIR__ . "/users.txt"); 

    foreach($lines as $idx=> $line) {
        
        $user_data = explode(",", $line); 
        
        echo "<tr>";
        
        foreach($user_data as $data) {
            
                echo "<td>$data</td>";
            
        }
        echo "<td><a href='view.php?id=$idx'>View</a></td>";
        echo "</tr>";
    }
    ?>
</table>


