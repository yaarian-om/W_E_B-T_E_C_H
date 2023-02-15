<?php

    $nameError = "";
    $emailError = "";
    $genderError = "";
    $bloodGroupError = "";
    $dateOfBirthError = "";
    $degreeError = "";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        if (empty($name) || $name === " ") {
            $nameError = "Name is required";
            // echo $nameError;
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameError = "Only letters and white space and dash allowed";
            // echo $nameError;
        }else{
            //echo $name;
        }
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        if (empty($email)) {
            $emailError = "Email is required";
            // echo $nameError;
        } elseif (!preg_match("/^[a-zA-Z-']*$/", $email)) {
            $emailError = "Only letters and white space and dash allowed";
            // echo $;
        }else{
            //echo $;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dob = $_POST['dateOfBirth'];
        if (empty($dob)) {
            $dateOfBirthError = "Date of Birth is required";
            // echo $nameError;
        } elseif ($dob > date('d-m-y')) {
            $dateOfBirthError = "Date of birth can not be in future";
            // echo $dateOfBirthError;
        }else{
            //echo $dob;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $gender = $_POST['gender'];
        if (empty($gender)) {
            $genderError = "Gender is required";
            // echo $nameError;
        } elseif (empty($gender)) {
            $genderError = "Gender error";
            // echo $;
        }else{
            echo $gender;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $degree = $_POST['degree'];
        if (empty($degree)) {
            $degreeError = "Degree is required";
            // echo $nameError;
        } elseif (empty($degree)) {
            $degreeError = "Degree error";
            // echo $;
        }else{
            echo $degree;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $bloodGroup = $_POST['bloodGroup'];
        if (empty($degree)) {
            $bloodGroupError = "Blood Group is required";
            // echo $nameError;
        } elseif (empty($degree)) {
            $degreeError = "Blood Group error";
            // echo $;
        }else{
            echo $degree;
        }
    }



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
    .required{
        color:red;
    }
    </style>
</head>

<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <!-- Name -->
        <legend>NAME</legend>
        <fieldset>
            <input type="text" name="name" placeholder="Enter your name" /> <span class="required">i &nbsp;<?php echo $nameError; ?></span>
        </fieldset>
        <!-- Email -->
        <legend>EMAIL</legend>
        <fieldset>
            <input type="text" name="email" placeholder="Enter your email" /> <span class="required">i &nbsp;<?php echo $emailError; ?></span>
        </fieldset>
        <!-- Date of Birth -->
        <legend>DATE OF BIRTH</legend>
        <fieldset>
            <input type="date" name="dateOfBirth" placeholder="Enter your Date of Birth" /> <span class="required">i &nbsp;<?php echo $dateOfBirthError; ?></span>
        </fieldset>
        <!-- Gender -->
        <legend>GENDER</legend>
        <fieldset>
            <input type="text" name="gender" placeholder="Enter your Gender" /> <span class="required">i &nbsp;<?php echo $genderError; ?></span>
        </fieldset>
        <!-- Degree -->
        <legend>DEGREE</legend>
        <fieldset>
            <input type="text" name="degree" placeholder="Enter your Degree" /> <span class="required">i &nbsp;<?php echo $degreeError; ?></span>
        </fieldset>
        <!-- Blood Group -->
        <legend>BLOOD GROUP</legend>
        <fieldset>
            <input type="text" name="bloodGroup" placeholder="Enter your Blood-group" />
            <span class="required">i &nbsp;<?php echo $bloodGroupError; ?></span>
        </fieldset>
        <br>
        <input type="submit" name="submit" value="Submit" />
    </form>


</body>

</html>

















