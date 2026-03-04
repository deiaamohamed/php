<?php
$row_number = $_GET['id'];

$lines = file(__DIR__ . "/users.txt");
if(isset($lines[$row_number])) {
 unset($lines[$row_number]);
}else {
    echo "User not found.";
    exit();
}
file_put_contents(__DIR__ . "/users.txt", implode("", $lines));

header("Location: data.php");
exit();
?>
