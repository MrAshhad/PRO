<?php


ini_set('display_errors', 0);


if(isset($_POST["submit"]))
{
$user_fname = $_POST["fname"];
$user_email = $_POST["email"];
$user_name = $_POST["uname"];
$user_password = $_POST["pwd"];
$user_role = $_POST["role"];

include "config.php";

$query = "SELECT * from `user` WHERE `username` = '{$user_name}'";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0)
{
    echo "user already exist";

}
else
{
    $conn = mysqli_connect("localhost","root","","care");

    $query1 = "INSERT INTO `user`(`fullname`, `username`, `email`, `password`, `role`) VALUES ('{$user_fname}','{$user_name}','{$user_email}','{$user_password}','{$user_role}');";

    mysqli_query($conn,$query1);

    header("location:http://localhost/eproject/admin/admins.php");

}
}

// if(isset($_FILES["fileToUpload'"]))
// {
//     $error = array();
//     $file_name = $_FILES["fileToUpload'"]["name"];
//     $file_size = $_FILES["fileToUpload'"]["size"];
//     $file_type = $_FILES["fileToUpload'"]["type"];
//     $file_tmp = $_FILES["fileToUpload'"]["tmp_name"];
//     $file_ext = explode(".",$file_name);
//     $file_ext = end($file_ext);
//     $file_ext = strtolower($file_ext);
//     $extention = array("jpg","jpeg","png");

//     if(in_array($file_ext,$extention) === false){
//         $error[] = "File extension must be in jpg, jpeg and png";
//     }
//     if($file_size > 2097152)
//     {
//         $error[] = "File size must be less than 2MB";
//     }
//     if(empty($error) == true)
//     {
//         move_uploaded_file($file_tmp,"upload/".$file_name);
//     }
//     else
//     {
//         print_r($error);
//         die();
//     }
// }
// $fname = $_POST["fname"];
// $email = $_POST["email"];
// $username = $_POST["uname"];
// $pass = $_POST["pwd"];
// $role = $_POST["role"];
// $file_name = $_POST["img"];
// include "config.php";
// $query = "INSERT INTO `user`(`fullname`, `username`, `email`, `password`, `img`, `role`) VALUES ('{$fname}','{$username}','{$email}','{$pass}','{$file_name}','{$role}');";
// // $query = "INSERT INTO `user`(`fullname`, `email`, `username`, `password`, `image`, `role`) VALUES ('{$fname}','{$email}','{$username}','{$pass}','{$file_name}','{$dd}');";
// mysqli_query($conn,$query);
// header("location:http://localhost/eproject/admin/admins.php");

?>