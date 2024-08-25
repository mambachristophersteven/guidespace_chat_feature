<?php

include 'connection.php';
$username="";
$password="";
$error="";

if(isset($_POST['submit'])){
    $username= $_POST['username'];
    $password= $_POST['password'];
    if(empty($username)){
        $error = "Invalid Login Credentials";
    }
    else{
        if(empty($password)){
            $error = "Invalid login Credentials";
        }
        else{
            $sql= "SELECT * FROM `admins` WHERE username='$username'";
            $result= mysqli_query($con,$sql);
            $nums= mysqli_num_rows($result);
            if($nums>0){
                $row= mysqli_fetch_assoc($result);
                $hashedpasswordinDb =$row['password'];
                $position=$row['position'];
                $checkpassword=password_verify($password,$hashedpasswordinDb);
                if($checkpassword){
                    if($position==="Headmaster"){
                        session_start();
                        $_SESSION['username']= $username;
                        header('location: ./headmaster/dashboardheadmaster.php');
                    }
                    if($position==="Technical Director"){
                        session_start();
                        $_SESSION['username']= $username;
                        header('location: ./developer/dashboarddeveloper.php');
                    }
                    if($position==="System Developer"){
                        session_start();
                        $_SESSION['username']= $username;
                        header('location: ./developer/dashboarddeveloper.php');
                    }
                    if($position==="Secretary S"){
                        session_start();
                        $_SESSION['username']= $username;
                        header('location: ./secretaryS/dashboardsecretaryS.php');
                    }
                    if($position==="Secretary A"){
                        session_start();
                        $_SESSION['username']= $username;
                        header('location: ./secretaryS/dashboardsecretaryS.php');
                    }
                    if($position==="Secretary B"){
                        session_start();
                        $_SESSION['username']= $username;
                        header('location: ./secretaryS/dashboardsecretaryS.php');
                    }
                    if($position==="Financial Director"){
                        session_start();
                        $_SESSION['username']= $username;
                        header('location: ./secretaryS/dashboardfinance.php');
                    }
                }
                else{
                    $error= "Invalid Login Credentials";
                }
            }          
            else{
                $sql1= "SELECT * FROM `teachers` WHERE username='$username'";
                $result1= mysqli_query($con,$sql1);
                $nums1= mysqli_num_rows($result1);
                if($nums1>0){
                    $row1= mysqli_fetch_assoc($result1);
                    $hashedpasswordinDb1 =$row1['password'];
                    $checkpassword1=password_verify($password,$hashedpasswordinDb1);
                    if($checkpassword1){                  
                        session_start();
                        $_SESSION['username']= $username;
                        header('location: ./teacher/dashboardteacher.php');
                    }
                    else{
                        $error= "Invalid Login Credentials";
                    }
                }          
                else{
                    $error= "Invalid Login Credentials";
                }
            }
        }
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="h2">Login</div>
        <form action="">
            <input type="text" name="username" id="username" placeholder="username">
            <input type="password" name="password" id="password" placeholder="password">
            <input type="submit" value="login" name="password">
        </form>
    </div>
</body>
</html>