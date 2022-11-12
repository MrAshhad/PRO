<?php

include "sidebar.php";
include "navbar.php";
include "config.php";
$query = "SELECT * FROM `user`;";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {

?>



    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Recent Salse</h6>
                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">S.no</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['role']; ?></td>
                                <td><img src="<?php echo $row['img']; ?>" width="70px" height="70px"></td>
                                <td><a class="btn btn-sm btn-primary" href="">Uptade</a></td>
                                <td><a class="btn btn-sm btn-primary" href="deleteuser.php?id=<?php echo $row["id"];?>'">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->

    <?php include "footer.php";


    ?>