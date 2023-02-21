<?php

error_reporting(0);  // This line will hide all the given errors in php

    $nameError = "";
    $emailError = "";
    $genderError = "";
    $bloodGroupError = "";
    $dateOfBirthError = "";
    $degreeError = "";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $wordCount = str_word_count($name);
        // echo $wordCount;
        if (empty($name)) {
            $nameError = "Name is required";
            $_POST['name'] = "";
            $name = "";
            // echo $nameError;
        } elseif($wordCount < 2){
            $nameError = "Write at least 2 words";
            $_POST['name'] = "";
            $name = "";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)){
            $nameError = "Only letters and white space and dash allowed";
            $_POST['name'] = "";
            $name = "";
            // echo $nameError;
        }else{
            //echo $name;
        }
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        if (empty($email)) {
            $emailError = "Email is required";
            $_POST['email'] = "";
            $email = ""; 
            // echo $nameError;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format";
            $email = ""; 
          }else{
            //echo $;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dob = $_POST['dateOfBirth'];
        // echo $dob;
        if (empty($dob)) {
            $dateOfBirthError = "Date of Birth is required";
            $_POST['dateOfBirth'] = "";
            $dob = "";
            // echo $nameError;
        } elseif ($dob > date('y-m-d')) {
            $dateOfBirthError = "Date of birth can not be in future";
            // $_POST['dateOfBirth'] = "";
            $dob = "";
            // echo $dateOfBirthError;
        }else{
            //echo $dob;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $gender = $_POST['gender'];
        if (empty($gender)) {
            $genderError = "Gender is required";
            $_POST['gender'] = "";
            $gender = "";
            // echo $nameError;
        } elseif (empty($gender)) {
            $genderError = "Gender error";
            $_POST['gender'] = "";
            $gender = "";
            // echo $;
        }else{
            // echo $gender;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $degree = $_POST['degree'];
        if(is_countable($degree)){
            $count = count($degree);
            // echo $count;
            if ($count<2) {
                $degreeError = "Select at least 2 Degrees";
                $_POST['degree'] = "";
                $degree = "";
                // echo $;
            }else{
                //echo $degree;
            }
        }else{
            $degreeError = "Degree is required";
            $_POST['degree'] = "";
            $degree = "";
        }
        
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $bloodGroup = $_POST['bloodGroup'];
        if (empty($degree)) {
            $bloodGroupError = "Blood Group is required";
            $bloodGroup = "";
            // echo $nameError;
        } elseif (empty($degree)) {
            $bloodGroupError = "Blood Group error";
            $bloodGroup = "";
            // echo $;
        }else{
            // echo $bloodGroupError;
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
        /* border: 1px solid black; */
    }

    .required {
        color: red;
    }

    .border {
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
</head>

<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <!-- Name -->
        <legend>NAME</legend>
        <fieldset>
            <input type="text" name="name" placeholder="Enter your name" /> <span class="required">i
                &nbsp;<?php echo $nameError; ?></span>
        </fieldset>
        <!-- Email -->
        <legend>EMAIL</legend>
        <fieldset>
            <input type="text" name="email" placeholder="Enter your email" /> <span class="required">i
                &nbsp;<?php echo $emailError; ?></span>
        </fieldset>
        <!-- Date of Birth -->
        <legend>DATE OF BIRTH</legend>
        <fieldset>
            <input type="date" name="dateOfBirth" placeholder="Enter your Date of Birth" /> <span class="required">i
                &nbsp;<?php echo $dateOfBirthError; ?></span>
        </fieldset>
        <!-- Gender -->
        <legend>GENDER</legend>
        <fieldset>
            <input type="radio" name="gender" value="Male" /> Male
            <input type="radio" name="gender" value="Female" /> Female
            <input type="radio" name="gender" value="Other" /> Other
            <span class="required">i &nbsp;<?php echo $genderError; ?></span>
        </fieldset>
        <!-- Degree -->
        <legend>DEGREE</legend>
        <fieldset>
            <input type="checkbox" name="degree[]" value="SSC" /> SSC
            <input type="checkbox" name="degree[]" value="HSC" /> HSC
            <input type="checkbox" name="degree[]" value="BSc" /> BSc
            <input type="checkbox" name="degree[]" value="MSc" /> MSc
            <span class="required">i &nbsp;<?php echo $degreeError; ?></span>
        </fieldset>
        <!-- Blood Group -->
        <legend>BLOOD GROUP</legend>
        <fieldset>
            <select name="bloodGroup" id="">
                <option value="None">None</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
            <span class="required">i &nbsp;<?php echo $bloodGroupError; ?></span>
        </fieldset>
        <br>
        <input type="submit" name="submit" value="Submit" />
    </form>
    <br><br>
    <div>
        <table class="output border">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Degree</th>
                <th>Blood Group</th>
            </tr>
            <tr>
                <?php echo "<td class= \"border\">".$name."</td>" ;?>
                <?php echo "<td class= \"border\">".$email."</td>"; ?>
                <?php echo "<td class= \"border\">".$dob."</td>"; ?>
                <?php echo "<td class= \"border\">".$gender."</td>"; ?>
                <?php echo "<td class= \"border\">".implode(" ",$_POST['degree'])."</td>"; ?>
                <?php echo "<td class= \"border\">".$bloodGroup."</td>"; ?>
            </tr>
        </table>
    </div>


</body>

</html>