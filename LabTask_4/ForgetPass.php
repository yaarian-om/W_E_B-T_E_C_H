<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Home</title>

</head>

<body>
    <?php include 'Header.php';?>


    <p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <legend>Forgot Password</legend>
        <fieldset>
            <label for="email">Enter Email</label>
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


    <?php include 'Footer.php';?>
</body>

</html>