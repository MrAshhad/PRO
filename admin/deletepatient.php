<?php 
$userid = $_GET["id"];
include "config.php";
$query = "DELETE FROM `patients` WHERE `id` = {$userid}";
mysqli_query($conn,$query);
header("location:");
?>