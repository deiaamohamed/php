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
<!DOCTYPE html>
<html lang="en">
    
    <body>

    <?php
    if($gender == "male"){
        echo "<h1>Welcome Mr. $fname $lname</h1>";
    }else{
        echo "<h1>Welcome Ms. $fname $lname</h1>";
    }
    ?>
    <p>First Name: <?php echo $fname ?></p>
    <p>Last Name: <?php echo $lname ?></p>
    <p>Address: <?php echo $address ?></p>
    <p>Country: <?php echo $country ?></p>
    <p>Gender: <?php echo $gender ?></p>
    <p>Skills: <?php foreach($skills as $skill) { echo $skill . " "; } ?></p>
    <p>Username: <?php echo $username ?></p>
    <p>Password: noooo bro it's secret :0</p>
    <p>Department: <?php echo $department ?></p>
    </body>

</html>

