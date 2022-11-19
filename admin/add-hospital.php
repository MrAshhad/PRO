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
                <h6 class="mb-4">Add Hospital</h6>
                <?php
               
                if(isset($_POST["addd"])){
                    $hname = $_POST["hname"];
                    $hcity = $_POST["hcity"];
                    $hemail = $_POST["hemail"];
                    $hphone = $_POST["hph"];
                    $haddress = $_POST["hadd"];
                    include "config.php";
                    $query = "SELECT * FROM WHERE `email` = '{$hemail}';";
                    $result = mysqli_query($conn, $query);
                         if (mysqli_num_rows($result) > 0) {
                            echo "Hospital already exist";
                        } else {
                             include "config.php";
                             $query1 = "INSERT INTO `hospital`(`hapitalname`, `city`, `email`, `phone`, `address`) VALUES ('{$hname}','{$hcity}','{$hemail}','{$hphone}','{$haddress}');";
                             mysqli_query($conn, $query1);
                            header("location:");
                        }
                }
                ?>
                <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Hospital Name</label>
                        <input type="txt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="hname">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Address</label>
                        <input type="txt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="hadd">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="hemail">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Phone</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="hph">
                    </div>
                    <label for="exampleInputEmail1" class="form-label">Select City</label>
                            <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="hcity">
                                <option selected>Open this to select city</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                   
                    <button type="submit" name="addd" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- Form End -->










<?php include "footer.php";


?>