<?php
$row_number = $_GET['id'];

$lines = file(__DIR__ . "/users.txt");

 unset($lines[$row_number]);

file_put_contents(__DIR__ . "/users.txt", implode("", $lines));

header("Location: data.php");
exit();
?>
