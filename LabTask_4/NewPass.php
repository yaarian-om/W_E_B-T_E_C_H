<?php 

    session_start();

    $newPassword = "";
    $passError = "";
    $newPasswordError = "";
    

    $name = "";
    $email = "";
    $username = "";
    $password = "";
    $confirmPassword = "";
    $gender = "";
    $dateOfBirth = "";

    



    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $newPassword = $_POST['newPassword'];
        if (empty($newPassword) || strlen($newPassword) < 8) {
            // check if password size in 8 or more and  check if it is empty
            $newPasswordError = "Write at least 8 Character";
            $_POST['newPassword'] = "";
            $newPassword = "";
        }else if (!preg_match('/[@#$%]/', $newPassword)) {
            // check if password contains at least one special character
            $newPasswordError = "Password must contain at least one special character (@, #, $, %)";
            $_POST['newPassword'] = "";
            $newPassword = "";
        }else{
            
            // $_SESSION["name"] = $row["name"];
            // $_SESSION["email"] = $row["e-mail"];
            // $_SESSION["username"] = $row["username"];
            
            // $_SESSION["confirmPassword"] = $row["confirmPassword"];
            // $_SESSION["gender"] = $row["gender"];
            // $_SESSION["dateOfBirth"] = $row["dateOfBirth"];

            if(file_exists('data.json'))  
            {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                    'name'               =>     $_SESSION["name"],  
                    'e-mail'          =>      $_SESSION["email"],  
                    'username'     =>     $_SESSION["username"], 
                    'password'     =>     $_POST["newPassword"],
                    'confirmPassword'    =>     $_POST["newPassword"],
                    'gender'     =>     $_SESSION["gender"],  
                    'dateOfBirth'     =>     $_SESSION["dateOfBirth"]  
                );  
                $array_data[] = $new_data;  

                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                    $message = "<label>File Appended Success fully</p>";  
                    header('Location:Login.php');
                }  
            }  
            else  
            {  
                $JSON_Error = 'JSON File not exits';  
                header('Location:Registration.php');
            }




        }
    }


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Home</title>
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
    <?php include 'Header.php';?>


    <p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <legend>New Password</legend>
        <fieldset>
            <label for="newPassword">Enter New Password</label>
            <input type="text" name="newPassword" id="newPassword" style="margin: 5px">
            <span class="required">&nbsp; i &nbsp;<?php echo $passError; ?></span>
            <br>
            <hr>
            <input type="submit" name="submit" value="Submit" style="margin: 15px" /> <br>
            <!-- <a href="<?php echo $_SERVER['PHP_SELF'].""; ?>?action=forgotPassword">Forgot Password?</a> -->

        </fieldset>


    </form>
    </p>


    <?php include 'Footer.php';?>
</body>

</html>