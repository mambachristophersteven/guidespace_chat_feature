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
                            $id=$rowdisplay['id'];
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
                <div class="chat">
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
                </div>
            </div>
            <div class="message-box">
                <form action="./chat.php">
                    <input type="text" name="message" id="message" placeholder="type message">
                    <input type="submit" value="send">
                </form>
            </div>
        </div>
    </div>
</body>
</html>