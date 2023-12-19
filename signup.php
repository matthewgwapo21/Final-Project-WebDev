<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $firstname= $_POST['fname'];
        $lastname= $_POST['lname'];
        $Gender= $_POST['gender'];
        $num = $_POST['cnum'];
        $address = $_POST['address'];
        $email= $_POST['email'];
        $password = $_POST['pass'];

        if(!empty($email) && !empty($password) && !is_numeric($email))
        {
            $query = "insert into form (fname, lname, gender, cnum, address, email, pass) values ('$firstname', '$lastname', '$Gender', '$num', '$address', '$email', '$password')";

            mysqli_query($con, $query);

            echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Please enter valid information')</script>";
        }
    }
?>
<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup1.css">
    <script src="java1.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
    <div class="signup">
        <h1>Sign Up
        </h1>
        <form method="POST">
            <div class="input-box">
            <input type="text" name="fname" required>
            <label>First Name</label>
            </div>
            <div class="input-box">
            <input type="text" name="lname" required>
            <label>Last Name</label>
            </div>
            <div class="input-box">
            <input type="text" name="gender" required>
            <label>Gender</label>
            </div>
            <div class="input-box">
            <input type="tel" name="cnum" required>
            <label>Contact Address</label>
            </div>
            <div class="input-box">
            <input type="text" name="address" required>
            <label>Address</label>
            </div>
            <div class="input-box">
            <input type="email" name="email" required>
            <label>Email</label>
            </div>
            <div class="input-box">
            <input type="password" name="pass" required>
            <label>Password</label>
            </div>
            <input type="submit" name="" class="btn" value="Submit">
        </form>
        <p>By clicking the Sign Up button, you are now officialy a member.</p>
        <p>Already have an account?<a href="login.php">Login Here</a></p>
        <span style="--i:0;"></span>
        <span style="--i:1;"></span>
        <span style="--i:2;"></span>
        <span style="--i:3;"></span>
        <span style="--i:4;"></span>
        <span style="--i:5;"></span>
        <span style="--i:6;"></span>
        <span style="--i:7;"></span>
        <span style="--i:8;"></span>
        <span style="--i:9;"></span>
        <span style="--i:10;"></span>
        <span style="--i:11;"></span>
        <span style="--i:12;"></span>
        <span style="--i:13;"></span>
        <span style="--i:14;"></span>
        <span style="--i:15;"></span>
        <span style="--i:16;"></span>
        <span style="--i:17;"></span>
        <span style="--i:18;"></span>
        <span style="--i:19;"></span>
        <span style="--i:20;"></span>
        <span style="--i:21;"></span>
        <span style="--i:22;"></span>
        <span style="--i:23;"></span>
        <span style="--i:24;"></span>
        <span style="--i:25;"></span>
        <span style="--i:26;"></span>
        <span style="--i:27;"></span>
        <span style="--i:28;"></span>
        <span style="--i:29;"></span>
        <span style="--i:30;"></span>
        <span style="--i:31;"></span>
        <span style="--i:32;"></span>
        <span style="--i:33;"></span>
        <span style="--i:34;"></span>
        <span style="--i:35;"></span>
        <span style="--i:36;"></span>
        <span style="--i:37;"></span>
        <span style="--i:38;"></span>
        <span style="--i:39;"></span>
        <span style="--i:40;"></span>
        <span style="--i:41;"></span>
        <span style="--i:42;"></span>
        <span style="--i:43;"></span>
        <span style="--i:44;"></span>
        <span style="--i:45;"></span>
        <span style="--i:46;"></span>
        <span style="--i:47;"></span>
        <span style="--i:48;"></span>
        <span style="--i:49;"></span>
        <!-- <span style="--i:50;"></span>
        <span style="--i:51;"></span>
        <span style="--i:52;"></span>
        <span style="--i:53;"></span>
        <span style="--i:54;"></span>
        <span style="--i:55;"></span>
        <span style="--i:56;"></span>
        <span style="--i:57;"></span>
        <span style="--i:58;"></span>
        <span style="--i:59;"></span>
        <span style="--i:60;"></span>
        <span style="--i:61;"></span>
        <span style="--i:62;"></span>
        <span style="--i:63;"></span>
        <span style="--i:64;"></span>
        <span style="--i:65;"></span>
        <span style="--i:66;"></span>
        <span style="--i:67;"></span>
        <span style="--i:68;"></span>
        <span style="--i:69;"></span>
        <span style="--i:70;"></span>
        <span style="--i:71;"></span>
        <span style="--i:72;"></span>
        <span style="--i:73;"></span> -->

      

    </div>
</div>
    
</body>

</html>