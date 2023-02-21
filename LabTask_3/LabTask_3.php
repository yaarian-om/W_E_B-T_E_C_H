<?php

error_reporting(0);  // This line will hide all the given errors in php

    $nameError = "";
    $emailError = "";
    $genderError = "";
    $bloodGroupError = "";
    $dateOfBirthError = "";
    $degreeError = "";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $wordCount = str_word_count($username);
        // echo $wordCount;
        if (empty($username)) {
            $nameError = "Username is required";
            $_POST['username'] = "";
            $username = "";
            // echo $nameError;
        } elseif($wordCount < 2){
            $nameError = "Write at least 2 words";
            $_POST['username'] = "";
            $username = "";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $username)){
            $nameError = "Only letters and white space and dash allowed";
            $_POST['username'] = "";
            $username = "";
            // echo $nameError;
        }else{
            //echo $name;
        }
    }


?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">       

    <legend>Login</legend>
    <fieldset>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo $username; ?>">
        <span class="required">&nbsp; i &nbsp;<?php echo $usernameError; ?></span>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="<?php echo $password; ?>">
        <span class="required">&nbsp; i &nbsp;<?php echo $passwordError; ?></span>
        <br>
        <hr>
        <input type="checkbox" name="rememberMe" id="rememberMe"> Remember Me
        <input type="submit" value="Submit">
    </fieldset>


    </form>

</body>
</html>