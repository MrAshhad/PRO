<?php 
$userid = $_GET["id"];
include "config.php";
$query = "DELETE FROM `user` WHERE `id` = '{$userid}';";
mysqli_query($conn,$query);
header("location:http://localhost:82/eproject/admin/admins.php");
?>