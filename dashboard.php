<?php

include './connection.php'; 
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../index.php");

}

$username= $_SESSION['username'];
$sql= "SELECT * FROM `users` WHERE username= '$username'";
$result= mysqli_query($con,$sql);
$nums= mysqli_num_rows($result);
$row= mysqli_fetch_assoc($result);
$fname= $row['fname'];
$lname= $row['lname'];
$fullname = $fname." ".$lname;
$role=$row['role'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <div class="left">
            <div class="profile">
                <p class="name"><?php echo $fullname;?></p>
                <p class="role"><?php echo $role;?></p>
                <button>logout</button>
            </div>
            <div class="others">
                <p class="side-title">lectures available</p>
            </div>
        </div>
        <div class="right"></div>
    </div>
</body>
</html>