<?php
require "classes/Auth.php";

$auth = new Auth(null);
$auth->logout();

header("Location: login.php");
exit();
?>