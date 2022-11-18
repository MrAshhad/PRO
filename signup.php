<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #06A3DA;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 680px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <?php
            ini_set('display_errors', 0);
            if(isset($_POST["ssave"]))
            {
                $user_ffname = $_POST["ffname"];
                $user_nname = $_POST["uuname"];
                $user_eemail = $_POST["eemail"];
                $user_ppwd = $_POST["ppwd"];

            include "config.php";
            $query = "SELECT * FROM `patients` WHERE `email` = '{$user_eemail}';";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0)
            {
                echo "user already exist";

            }
            else
            {
                include "config.php";

                echo $query1 = "INSERT INTO `patients`(`fullname`, `username`, `email`, `password`) VALUES ('{$user_ffname}','{$user_nname}','{$user_eemail}','{$user_ppwd}');";

                mysqli_query($conn,$query1);

                header("location:http://localhost/eproject/");
            }
            }
            ?>
            
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <h3>SignUp Here</h3>
        <label for="username">Full Name</label>
        <input type="text" placeholder="Full Name" id="username" required name="ffname">

        <label for="username">Username</label>
        <input type="text" placeholder="Username" id="username" required name="uuname">


        <label for="username">Email Address</label>
        <input type="text" placeholder="Your Email" id="username" required name="eemail">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" required name="ppwd">

        <button name="ssave">sign-up</button>

    </form>
</body>
</html>
