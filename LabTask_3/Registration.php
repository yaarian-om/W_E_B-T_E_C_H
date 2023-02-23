<?php






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

        <legend>XX</legend>
        <fieldset>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?php if(!empty($username)){echo $username;} ?>"
                style="margin: 5px">
            <span class="required">&nbsp; i &nbsp;<?php echo $usernameError; ?></span>
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="<?php if(!empty($password)){echo $password;} ?>"
                style="margin: 5px">
            <span class="required">&nbsp; i &nbsp;<?php echo $passwordError; ?></span>
            <br>
            <hr>
            <input type="checkbox" name="rememberMe" id="rememberMe"> Remember Me <br>
            <input type="submit" name="submit" value="Submit" style="margin: 15px" /> <br>
            <a href="<?php echo $_SERVER['PHP_SELF'].""; ?>?action=forgotPassword">Forgot Password?</a>
        </fieldset>


    </form>
    </p>

</body>

</html>