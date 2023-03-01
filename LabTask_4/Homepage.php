<?php 
    error_reporting(0);
    session_start();
    if(!isset($_SESSION["loginUser_Name"]) || $_SESSION["status"] === FALSE){
        header('Location:Login.php');
    }




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
    .container {
        display: flex;
        height: 400px;
        border: 1px solid black;
    }

    .left {
        width: 30%;
        border-right: 1px solid black;
    }

    .right {
        width: 70%;
    }

    ul {
        align-items: center;
        display: flex;
        flex-direction: column;
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    li {
        display: inline-block;
        margin-right: 10px;
        /* add some spacing between items */
    }
    </style>

</head>

<body>
    <?php include 'Header2.php';?>


    <div class="container">
        <div class="left">
            <p>
            <h3>Account</h3>
            <hr>
            <ul>
                <li><a href="Dashboard.php">Dashboard</a></li>
                <li><a href="ViewProfile.php">View Profile</a></li>
                <li><a href="EditProfile.php">Edit Profile</a></li>
                <li><a href="UploadProfilePhoto.php">Change Profile Picture</a></li>
                <li><a href="ChangePassword.php">Change Password</a></li>
                <li><a href="Logout.php">Logout</a></li>
            </ul>

            </p>


        </div>
        <div class="right">
            <p>This is the right division.</p>
        </div>
    </div>



    <?php include 'Footer.php';?>
</body>

</html>