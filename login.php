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
            $sql1= "SELECT * FROM `users` WHERE username='$username'";
            $result1= mysqli_query($con,$sql1);
            $nums1= mysqli_num_rows($result1);
            if($nums1>0){
                $row1= mysqli_fetch_assoc($result1);
                $passwordinDb1 =$row1['password'];
                if($passwordinDb1 === $password){                  
                    session_start();
                    $_SESSION['username']= $username;
                    header('location: ./dashboard.php');
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
        <h4><?php echo $error;?></h4>
        <form action="./login.php" method="post">
            <input type="text" name="username" id="username" placeholder="username">
            <input type="password" name="password" id="password" placeholder="password">
            <input type="submit" value="login" name="submit">
        </form>
    </div>
</body>
</html>