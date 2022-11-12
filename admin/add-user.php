<?php
ob_start();
include "sidebar.php";
include "navbar.php";
?>
<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Add Users</h6>
                <?php
                if (isset($_POST["add"])) {
                    if (isset($_FILES["fileToUpload"])) {
                        $error = array();
                        $file_name = $_FILES["fileToUpload"]["name"];
                        $file_size = $_FILES["fileToUpload"]["size"];
                        $file_type = $_FILES["fileToUpload"]["type"];
                        $file_tmp = $_FILES["fileToUpload"]["tmp_name"];
                        $file_ext = explode(".", $file_name);
                        $file_ext = end($file_ext);
                        $file_ext = strtolower($file_ext);
                        $extention = array("jpg", "jpeg", "png");

                        if (in_array($file_ext, $extention) === false) {
                            $error[] = "File extension must be in jpg, jpeg and png";
                        }
                        if ($file_size > 2097152) {
                            $error[] = "File size must be less than 2MB";
                        }
                        if (empty($error) == true) {
                            move_uploaded_file($file_tmp, "upload/".$file_name);
                        } else {
                            print_r($error);
                            die();
                        }
                    }


                    $user_fname = $_POST["fname"];
                    $user_email = $_POST["email"];
                    $user_name = $_POST["uname"];
                    $user_password = $_POST["pwd"];
                    $user_role = $_POST["role"];
                    include "config.php";
                    $query = "SELECT * from `user` WHERE `email` = '{$user_email}'";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        echo "user already exist";
                    } else {
                        include "config.php";

                     $query1 = "INSERT INTO `user`(`fullname`, `username`, `email`, `password`, `role`, `img`) VALUES ('{$user_fname}','{$user_name}','{$user_email}','{$user_password}','{$user_role}','{$file_name}');";

                        mysqli_query($conn, $query1);
                        header("location:http://localhost/eproject/admin/admins.php");
                    }
                }
                ?>
                <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Full Name</label>
                        <input type="txt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fname">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Name</label>
                        <input type="txt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uname">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="pwd">
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Role</legend>
                        <div class="col-sm-10" name="">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="gridRadios1" value="1">
                                <label class="form-check-label" for="gridRadios1">
                                    Admin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="gridRadios2" value="0" checked>
                                <label class="form-check-label" for="gridRadios2">
                                    User
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Upload Image</label>
                                <input class="form-control bg-dark" name="fileToUpload" type="file" id="formFileMultiple">
                            </div>
                    <button type="submit" name="add" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- Form End -->










<?php include "footer.php";


?>