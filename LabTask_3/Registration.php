<?php

    // Variables Declaration
    $name = "";
    $nameError = "";

    $email = "";
    $emailError = "";

    $username = "";
    $usernameError = "";

    $password = "";
    $passwordError = "";

    $confirmPassword = "";
    $confirmPasswordError = "";

    $gender = "";
    $genderError = "";

    $dateOfBirth = "";
    $dateOfBirthError = "";

    $JSON_Message = "";
    $JSON_Error = "";
    
    $everythingOK = FALSE;
    $everythingOKCounter = 0;
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        

        
        // Validation for Name
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $wordCount = str_word_count($name);
            // echo $wordCount;
            if (empty($name)) {
                $nameError = "Name is required";
                $_POST['name'] = "";
                $name = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            } elseif($wordCount < 2){
                $nameError = "Write at least 2 words";
                $_POST['name'] = "";
                $name = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)){
                $nameError = "Only letters and white space and dash allowed";
                $_POST['name'] = "";
                $name = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            }else{
                $everythingOK = TRUE;
            }
        }

        // Validation for Email
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            if (empty($email)) {
                $emailError = "Email is required";
                $_POST['email'] = "";
                $email = ""; 
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "Invalid email format";
                $email = ""; 
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            }else{
                $everythingOK = TRUE;
            }
        }

        // Validation for Username
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            if (empty($username) || strlen($username) < 2) {
                $usernameError = "Write at least 2 Characters";
                $_POST['username'] = "";
                $username = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            } else if(!preg_match("/^[a-zA-Z- _'0-9 ]*$/", $username)){
                $usernameError = "Only letters and white space and dash allowed";
                $_POST['username'] = "";
                $username = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            }else{
                $everythingOK = TRUE;
            }
        }

        // Validation for Password
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

        // Validation for Confirm Password
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $confirmPassword = $_POST['confirmPassword'];
            if (empty($confirmPassword) || strlen($confirmPassword) < 8) {
                // check if password size in 8 or more and  check if it is empty
                $confirmPasswordError = "Write at least 8 Character";
                $_POST['reTypeNewPass'] = "";
                $confirmPassword = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            }else if (!($_POST['newPass'] === $_POST['reTypeNewPass'])) {
                // check if password contains at least one special character
                $confirmPasswordError = "New Password and Retype New Password must be same";
                $_POST['reTypeNewPass'] = "";
                $confirmPassword = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            }else{
                $everythingOK = TRUE;
            }
        }

        // Validation for Gender
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($gender)) {
                $genderError = "Gender is required";
                $_POST['gender'] = "";
                $gender = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            } else{
                $gender = $_POST['gender'];
                $everythingOK = TRUE;
            }
        }

        // Validation for Date of Birth
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dob = $_POST['dateOfBirth'];
            if (empty($dob)) {
                $dateOfBirthError = "Date of Birth is required";
                $_POST['dateOfBirth'] = "";
                $dob = "";
                $everythingOK = FALSE;
            } elseif ($dob > date('y-m-d')) {
                $dateOfBirthError = "Date of birth can not be in future";
                $_POST['dateOfBirth'] = "";
                $dob = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            }else{
                $everythingOK = TRUE;
            }
        }

        // If everything is OK then store the data and go to the Login Page
        if($everythingOK && $everythingOKCounter == 0){
            
            if(file_exists('data.json'))  
            {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                    'name'               =>     $_POST['name'],  
                    'e-mail'          =>     $_POST["email"],  
                    'username'     =>     $_POST["username"], 
                    'password'     =>     $_POST["password"],
                    'confirmPassword'    =>     $_POST["confirmPassword"],
                    'gender'     =>     $_POST["gender"],  
                    'dateOfBirth'     =>     $_POST["dateOfBirth"]  
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
    <title>Registration</title>

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

        <legend>Registration</legend>
        <fieldset>
            <label for="username">Name</label>
            <input type="text" name="name" id="name" style="margin: 5px">
            <span class="required">&nbsp; i &nbsp;<?php echo $nameError; ?></span>
            <br>
            <hr>

            <label for="email">Email</label>
            <input type="text" name="email" id="email" style="margin: 5px">
            <span class="required">&nbsp; i &nbsp;<?php echo $emailError; ?></span>
            <br>
            <hr>

            <label for="username">Username</label>
            <input type="text" name="username" id="username" style="margin: 5px">
            <span class="required">&nbsp; i &nbsp;<?php echo $usernameError; ?></span>
            <br>
            <hr>

            <label for="password">Password</label>
            <input type="text" name="password" id="password" style="margin: 5px">
            <span class="required">&nbsp; i &nbsp;<?php echo $passwordError; ?></span>
            <br>
            <hr>

            <label for="confirmPassword">Confirm Password</label>
            <input type="text" name="confirmPassword" id="confirmPassword" style="margin: 5px">
            <span class="required">&nbsp; i &nbsp;<?php echo $confirmPasswordError; ?></span>
            <br>
            <hr>

            <div>
                <legend>Gender</legend>
                <fieldset>
                    <input type="radio" name="gender" value="Male" /> Male
                    <input type="radio" name="gender" value="Female" /> Female
                    <input type="radio" name="gender" value="Other" /> Other
                    <span class="required"> &nbsp; i &nbsp;<?php echo $genderError; ?></span>
                </fieldset>
                <br>
                <hr>
            </div>
            <div>
                <legend>Date of Birth</legend>
                <fieldset>
                    <input type="date" name="dateOfBirth" placeholder="Enter your Date of Birth" /> <span
                        class="required"> &nbsp; i &nbsp;<?php echo $dateOfBirthError; ?></span>
                </fieldset>
                <br>
                <hr>
            </div>


            <input type="submit" name="submit" value="Submit" style="margin: 5px" />
            <input type="submit" name="reset" value="reset" style="margin: 5px" /> <br>
        </fieldset>


    </form>
    </p>

</body>

</html>