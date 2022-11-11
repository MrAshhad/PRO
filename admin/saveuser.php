<?php


if(isset($_POST["submit"]))
{
$user_fname = $_POST["fname"];
$user_email = $_POST["email"];
$user_name = $_POST["uname"];
$user_password = $_POST["pwd"];
$user_role = $_POST["role"];

include "config.php";

$query = "SELECT * from `user` WHERE `email` = '{$user_email}'";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0)
{
    echo "user already exist";

}
else
{
   include "config.php";

    $query1 = "INSERT INTO `user`(`fullname`, `username`, `email`, `password`, `role`) VALUES ('{$user_fname}','{$user_name}','{$user_email}','{$user_password}','{$user_role}');";

    mysqli_query($conn,$query1);

    header("location:http://localhost/eproject/admin/admins.php");

}
}



?>