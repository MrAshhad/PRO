<?php  


    $_id = $_POST["sid"];
    $f_name = $_POST["fname"];
    $uname_ = $_POST["uname"];
    $email_ = $_POST["email"];
    $pwd_ = $_POST["pwd"];
    $role_ = $_POST["role"];


    include "config.php";
    $query = "UPDATE `user` SET `fullname` = '{$f_name}',`username` = '{$uname_}',`email` = '{$email_}',`password` = '{$pwd_}',`role`= '{$role_}' WHERE `id` = '{$_id}';";
    //$query = "UPDATE `user` SET `first_name`='{$f_name}',`last_name`='{$lname_}',`username`='{$uname_}',`role`='{$role_}' WHERE `user_id` = '{$_id}'";
    $result = mysqli_query($conn, $query);

    header("location:{$host}admin/admins.php")


?>