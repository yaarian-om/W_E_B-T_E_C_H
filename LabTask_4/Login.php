<!-- Working Successfully -->

<?php
session_start();
// error_reporting(0);  // This line will hide all the given errors in php

    $everythingOK = FALSE;
    $everythingOKCounter = 0;
    $usernameError = "";
    $passwordError = "";

    $username = "";
    $password = "";

    if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        $username = $_COOKIE['username'];
        $password = $_COOKIE['password'];
    }
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){


        // Username Validation
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            if (empty($username) || strlen($username) < 2) {
                $usernameError = "Write at least 2 Characters";
                $_POST['username'] = "";
                $username = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            } else if(!preg_match("/^[a-zA-Z- _' ]*$/", $username)){
                $usernameError = "Only letters and white space and dash allowed";
                $_POST['username'] = "";
                $username = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            }else{
                $everythingOK = TRUE;
            }
        }
    
    
        // Password Validation
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['password'];
            if (empty($password) || strlen($password) < 8) {
                // check if password size in 8 or more and  check if it is empty
                $passwordError = "Write at least 8 Character";
                $_POST['password'] = "";
                $password = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            }else if (!preg_match('/[@#$%]/', $password)) {
                // check if password contains at least one special character
                $passwordError = "Password must contain at least one special character (@, #, $, %).";
                $_POST['password'] = "";
                $password = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            }else{
                $everythingOK = TRUE;
            }
        }
    
    
        // Check if the action parameter is set to "forgotPassword"
        if (isset($_GET['action']) && $_GET['action'] == 'forgotPassword') {
            header('Location:ChangePassword.php'); 
        }
    
    
        if(isset($_POST['rememberMe'])) {
            // Set the cookie for 1 day
            setcookie('username', $username, time() + (86400 * 1)); // 86400 seconds = 1 day
            setcookie('password', $password, time() + (86400 * 1));
        }
    
    
        if($everythingOK && $everythingOKCounter == 0){
            // Check that id and password are correct
            // if correct, redirect to the home page
    
            $data = file_get_contents("data.json");  
            $data = json_decode($data, true);
            if (isset($data)) {
                foreach($data as $row)  
                {  
                    if($row["username"] === $username && $row["password"] === $password){
                        $_SESSION["loginUser_Name"] = $row["username"];
                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $password;
                        header('Location:Homepage.php');
                    }
                } 
            }
            //header('Location:Login.php');
        }



    }
    



?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
    body {
        text-align: center;
    }

    .output {
        width: 100%;
        height: 100%;
        background-color: #f1f1f1;
        padding: 20px;
        /* border: 1px solid black; */
    }

    .required {
        color: red;
    }

    .border {
        border: 1px solid black;
        border-collapse: collapse;
    }

    legend {
        font-weight: bold;
        font-size: 20px;
    }

    fieldset {
        margin: 10px;
    }

    form {
        display: inline-block;
    }
    </style>
</head>

<body>

    <p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <legend>Login</legend>
        <fieldset>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?php if(!empty($username)){echo $username;} ?>"
                style="margin: 5px">
            <span class="required">&nbsp; i &nbsp;<?php echo $usernameError; ?></span>
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="<?php if(!empty($username)){echo $password;} ?>"
                style="margin: 5px">
            <span class="required">&nbsp; i &nbsp;<?php echo $passwordError; ?></span>
            <br>
            <hr>
            <input type="checkbox" name="rememberMe" id="rememberMe"> Remember Me <br>
            <input type="submit" name="submit" value="Submit" style="margin: 15px" /> <br>
            <!-- <a href="<?php echo $_SERVER['PHP_SELF'].""; ?>?action=forgotPassword">Forgot Password?</a> -->
            <a href="ForgetPass.php">Forgot Password?</a>
        </fieldset>


    </form>
    </p>

</body>

</html>