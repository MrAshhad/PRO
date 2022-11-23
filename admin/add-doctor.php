<?php
ob_start();
include "sidebar.php";
include "navbar.php";



?>
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
            move_uploaded_file($file_tmp, "doctor/" . $file_name);
        } else {
            print_r($error);
            die();
        }
    }


    $user_ffname = $_POST["fname"];
    $user_eemail = $_POST["email"];
    $user_nname = $_POST["uname"];
    $user_ppassword = $_POST["pwd"];
    $user_spe = $_POST["specilization"];
    $user_hhos = $_POST["hhos"];
    $user_city = $_POST["hcity"];
    include "config.php";
    $query = "SELECT * FROM `doctors` WHERE `email` = '{$user_eemail}';";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Doctor already exist";
    } else {
        include "config.php";
        $query1 = "INSERT INTO `doctors`(`fullname`, `email`, `username`, `password`, `img`, `specialization`, `hospital`, `city`) VALUES ('{$user_ffname}','{$user_eemail}','{$user_nname}','{$user_ppassword}','{$file_name}','{$user_spe}','{$user_hhos}','{$user_city}')";

        mysqli_query($conn, $query1);
        header("location:{$host}admin/doctors.php");
    }
}
?>


<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Add Doctor</h6>
                <form  action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Full Name</label>
                        <input type="txt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fname" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Name</label>
                        <input type="txt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uname" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" autocomplete="off">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="pwd" autocomplete="off">
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Specilization</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Child Specialist" name="specilization">
                                <label class="form-check-label" for="gridRadios1">
                                    Child Specialist
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value=" Heart specialist" name="specilization">
                                <label class="form-check-label" for="gridRadios2">
                                    Heart specialist
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Eye specialist" name="specilization">
                                <label class="form-check-label" for="gridRadios2">
                                    Eye specialist
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <label for="exampleInputEmail1" class="form-label">Select Hospital</label>
                    <?php
                     include "config.php";
                     $query1 = "SELECT * FROM `hospital`;";
                        $result1 = mysqli_query($conn, $query1);
                             if (mysqli_num_rows($result1) > 0) {
                             while($row1 = mysqli_fetch_assoc($result1)){
                    ?>
                            <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="hhos">
                                <option selected>Open this to select hospital</option>
                                <option  value="<?php echo $row1['id']; ?>"><?php echo $row1['hapitalname']; ?></option>
                            </select>
                             <?php }} ?>


                    <label for="exampleInputEmail1" class="form-label">Select City</label>
                    <?php
                     include "config.php";
                     $query1 = "SELECT *  FROM `city`";
                        $result1 = mysqli_query($conn, $query1);
                             if (mysqli_num_rows($result1) > 0) {
                             while($row1 = mysqli_fetch_assoc($result1)){
                    ?>
                            <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="hcity">
                                <option selected>Open this to select city</option>
                                <option  value="<?php echo $row1['id']; ?>"><?php echo $row1['cityname']; ?></option>
                            </select>
                             <?php }} ?>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Upload Image</label>
                        <input class="form-control bg-dark" type="file" id="formFileMultiple" name="fileToUpload" multiple>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add">Add</button>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- Form End -->










<?php include "footer.php";


?>