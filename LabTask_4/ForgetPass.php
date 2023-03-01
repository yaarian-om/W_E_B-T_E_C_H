<?php 

    session_start();
    $email = "";
    $emailError = "";
    $everythingOK = FALSE;


    $name = "";
    $username = "";
    $password = "";
    $confirmPassword = "";
    $gender = "";
    $dateOfBirth = "";


    $everythingOK = FALSE;


    $JSON_array_index = 0;

    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = $_POST['email'];
        if(empty($email)){
            $emailError = "Email is required";
            $_POST['email'] = "";
            $email = "";
            // echo $nameError;
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailError = "Invalid email format";
            $email = "";
        }else{
            $data = file_get_contents("data.json");  
            $data = json_decode($data, true);
            if (isset($data)) {
                foreach($data as $row)  
                {
                    $JSON_array_index += 1;  
                    if($row["e-mail"] === $email){
                       
                        // // generate 6 digit random number
                        // $rand_num = rand(100000, 999999);

                        // // set email details
                        // $subject = "Your 6 digit verification code";
                        // $message = "Your verification code is: ".$rand_num;

                        // // send email
                        // $headers = "From: doroyot689@wiroute.com" . "\r\n" .
                        //         "Reply-To: doroyot689@wiroute.com" . "\r\n" .
                        //         "X-Mailer: PHP/" . phpversion();
                        // mail($email, $subject, $message, $headers);

                        // // set validity for 5 minutes
                        // $validity = time() + (5 * 60);

                        // // store the verification code and its validity in session variables
                        // $_SESSION["verification_code"] = $rand_num;
                        // $_SESSION["verification_code_validity"] = $validity;

                        // redirect to New Password page

                        $_SESSION["name"] = $row["name"];
                        $_SESSION["email"] = $row["e-mail"];
                        $_SESSION["username"] = $row["username"];
                        $_SESSION["password"] = $row["password"];
                        $_SESSION["confirmPassword"] = $row["confirmPassword"];
                        $_SESSION["gender"] = $row["gender"];
                        $_SESSION["dateOfBirth"] = $row["dateOfBirth"];
                        $_SESSION["index"] = $JSON_array_index;
                        
                        unset($data_array[$index]); // Delete the record or array from data.json
                        $json_data = json_encode($data_array);
                        // Write the updated JSON data back into the data.json file
                        file_put_contents('data.json', $json_data);


                        header("Location: NewPass.php");
                       
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

        <legend>Forgot Password</legend>
        <fieldset>
            <label for="email">Enter Email</label>
            <input type="text" name="email" id="email" style="margin: 5px">
            <span class="required">&nbsp; i &nbsp;<?php echo $emailError; ?></span>
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