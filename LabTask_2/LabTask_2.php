<?php

    $nameError = $emailError = $genderError = $bloodGroupError = $dateOfBirthError = $degreeError = "";



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>LabTask 2</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="" />
    <link rel="icon" href="favicon.png">

    <style>
    .output {
        width: 100%;
        height: 100%;
        background-color: #f1f1f1;
        padding: 20px;
    }
    </style>
</head>

<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <!-- Name -->
        <legend>NAME</legend>
        <fieldset>
            <input type="text" name="name" placeholder="Enter your name" /> <span>i<?php echo $nameError; ?></span>
        </fieldset>
        <!-- Email -->
        <legend>EMAIL</legend>
        <fieldset>
            <input type="text" name="email" placeholder="Enter your email" /> <span>i<?php echo $emailError; ?></span>
        </fieldset>
        <!-- Date of Birth -->
        <legend>DATE OF BIRTH</legend>
        <fieldset>
            <input type="date" name="dateOfBirth" placeholder="Enter your Da" />
            i<span>i<?php echo $emailError; ?></span>
        </fieldset>
        <!-- Gender -->
        <legend>GENDER</legend>
        <fieldset>
            <input type="text" name="gender" placeholder="Enter your name" /> <span>i<?php echo $emailError; ?></span>
        </fieldset>
        <!-- Degree -->
        <legend>DEGREE</legend>
        <fieldset>
            <input type="text" name="degree" placeholder="Enter your name" /> <span>i<?php echo $emailError; ?></span>
        </fieldset>
        <!-- Blood Group -->
        <legend>BLOOD GROUP</legend>
        <fieldset>
            <input type="text" name="bloodGroup" placeholder="Enter your name" />
            <span>i<?php echo $emailError; ?></span>
        </fieldset>
        <br>
        <input type="submit" name="submit" value="Submit" />
    </form>


</body>

</html>

















<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        if (empty($_POST['name'])) {
            $nameError = "Name is required";
            // echo $nameError;
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameError = "Only letters and white space and dash allowed";
            // echo $nameError;
        }else{
            echo $name;
        }
    }




?>