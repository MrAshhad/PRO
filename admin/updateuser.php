<?php
ob_start();
include "sidebar.php";
include "navbar.php";

$user_id_ = $_GET["id"];
include "config.php";
$Query1 = "SELECT * FROM `user` WHERE `id` = '{$user_id_}'";
$result = mysqli_query($conn, $Query1);
if(mysqli_num_rows($result))
{
    $row = mysqli_fetch_assoc($result);
    

    

?>
<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Add Users</h6>
                <form action="edituser.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Full Name</label>
                        <input type="txt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fname"  value="<?php echo $row['fullname']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Name</label>
                        <input type="txt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uname"  value="<?php echo $row['username']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"  value="<?php echo $row['email']; ?>">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="pwd"  value="<?php echo $row['password']; ?>">
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Role</legend>
                        <div class="col-sm-10" name="">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="gridRadios1" value="1"  value="<?php echo $row['role']; ?>">
                                <label class="form-check-label" for="gridRadios1">
                                    Admin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="gridRadios2" value="0" checked   value="<?php echo $row['role']; ?>">
                                <label class="form-check-label" for="gridRadios2">
                                    User
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Upload Image</label>
                                <input class="form-control bg-dark" name="fileToUpload" type="file" id="formFileMultiple">
                                <div id="emailHelp" class="form-text">Select the image again.
                        </div>
                            </div>
                    <button type="submit" name="add" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- Form End -->





<?php } ?>




<?php include "footer.php";


?>