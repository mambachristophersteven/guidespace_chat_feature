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
    <link rel="stylesheet" href="dashboard12.css">
</head>
<body>
    <div class="container">
        <div class="left">
            <div class="profile">
                <p class="name"><?php echo $fullname;?></p>
                <p class="role"><?php echo $role;?></p>
            </div>
            <button>logout</button>
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
                                <button onclick=\"location.href = 'chat.php?viewid=".$unique_id."'\">chat</button>
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
            <p class="select">choose someone to talk to </p>
        </div>
    </div>
</body>
</html>