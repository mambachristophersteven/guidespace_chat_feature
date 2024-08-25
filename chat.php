<?php

include './connection.php'; 
session_start();
if(!isset($_SESSION['username'])){
    header("location: ./login.php");

}



$username= $_SESSION['username'];
$sql= "SELECT * FROM `users` WHERE username= '$username'";
$result= mysqli_query($con,$sql);
$nums= mysqli_num_rows($result);
$row= mysqli_fetch_assoc($result);
$fname= $row['fname'];
$lname= $row['lname'];
$user_id= $row['unique_id'];
$fullname = $fname." ".$lname;
$role=$row['role'];



$id = $_GET['oomfid'];
$sqlview= "SELECT * from `users` WHERE unique_id= '$id'";
$resultview=mysqli_query($con,$sqlview);
$rowview=mysqli_fetch_assoc($resultview);
$firstname=$rowview['fname'];
$lastname=" ".$rowview['lname'];
$lecturerName = $firstname.$lastname;
$lecRole=$rowview['role'];

// echo $id;


if(isset($_POST['submit'])){
    $message=$_POST['message'];
    $sender_id = $user_id;
    $receiver_id = $id;
    // echo $receiver_id;
    // echo $sender_id;

    $sqlinsert= "INSERT INTO `messages` (message,sender_id,receiver_id,sender_name,receiver_name) VALUES ('$message','$sender_id','$receiver_id','$fullname','$lecturerName')";
    $resultin= mysqli_query($con, $sqlinsert);
    if($resultin){
        header('location: ./chat.php?oomfid='.$receiver_id.'');
        exit;
    }
    else{
        die("error occurred: ".mysqli_error($con));
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Lecturer</title>
    <link rel="stylesheet" href="chat12.css">
</head>
<body>
    <div class="container">
        <div class="left">
            <div class="profile">
                <p class="name"><?php echo $fullname;?></p>
                <p class="role"><?php echo $role;?></p>
            </div>
            <button onclick="location.href='./logout.php'">logout</button>
            <div class="others">
                <p class="side-title">lecturers available</p>
                <div class="list">
                    <?php

                        include './connection.php';
                        $sqldisplay= "SELECT * FROM `users`WHERE role='lecturer'";
                        $resultdisplay= mysqli_query($con, $sqldisplay);
                        if($resultdisplay){
                        while($rowdisplay=mysqli_fetch_assoc($resultdisplay)){
                            $unique_id=$rowdisplay['unique_id'];
                            $firstname=$rowdisplay['fname'];
                            $lastname=" ".$rowdisplay['lname'];
                            $role=$rowdisplay['role'];
                            $fullname=$firstname.$lastname;

                            echo"
                            <div class=\"person\">
                                <div class=\"person-top\">
                                    <img src=\"\" alt=\"\">
                                    <p class=\"person-name\">$fullname</p>
                                </div>
                                <button onclick=\"location.href = 'chat.php?oomfid=".$unique_id."'\">chat</button>
                            </div>
                                                        
                            ";
                        }
                        }
                        else{
                        echo "
                        <tr>
                            <td><span class=\"material-symbols-outlined\">block</span></td>
                            <td><span class=\"material-symbols-outlined\">block</span></td>
                            <td><span class=\"material-symbols-outlined\">block</span></td>
                            <td><span class=\"material-symbols-outlined\">block</span></td>
                            <td><span class=\"material-symbols-outlined\">block</span></td>

                        </tr>

                        ";
                        }
                    
        ?>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="right-top">
                <p class="name"><?php echo $lecturerName;?></p>
                <p class="role"><?php echo $lecRole;?></p>
            </div>
            <div class="right-chat">
                <?php
                    include './connection.php';
                    $sqldisplay= "SELECT * FROM `messages` WHERE ( sender_id='$user_id' AND receiver_id='$id') OR  (sender_id='$user_id')";
                    $resultdisplay= mysqli_query($con, $sqldisplay);
                    if($resultdisplay){
                    while($rowdisplay=mysqli_fetch_assoc($resultdisplay)){
                        $received=$rowdisplay['message'];
                        $sender_nametext=$rowdisplay['sender_name'];

                        echo"
                            <div class=\"chat\">
                                <div class=\"message\">$received</div>
                                <div class=\"by\">$sender_nametext</div>
                            </div>                  
                        ";
                    }
                    }
                    else{
                    echo "
                    <tr>
                        <td><span class=\"material-symbols-outlined\">block</span></td>
                        <td><span class=\"material-symbols-outlined\">block</span></td>
                        <td><span class=\"material-symbols-outlined\">block</span></td>
                        <td><span class=\"material-symbols-outlined\">block</span></td>
                        <td><span class=\"material-symbols-outlined\">block</span></td>

                    </tr>

                    ";
                    }

                ?>
                <!-- <div class="chat">
                    <div class="message">hello, madam</div>
                    <div class="by">sender-name</div>
                </div>
                <div class="chat">
                    <div class="message">hello, madam</div>
                    <div class="by">sender-name</div>
                </div>
                <div class="chat">
                    <div class="message">hello, madam</div>
                    <div class="by">sender-name</div>
                </div> -->
            </div>
            <div class="message-box">
                <form action="./chat.php?oomfid=<?php echo $id;?>" method="post">
                    <input type="text" name="message" id="message" placeholder="type message">
                    <input type="submit" value="send" name="submit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>