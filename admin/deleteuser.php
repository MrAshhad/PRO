<?php 
$userid = $_GET["id"];
include "config.php";
$query = "DELETE FROM `user` WHERE `id` = {$userid}";
mysqli_query($conn,$query);
header("location:{$host}admin/admins.php");
?>