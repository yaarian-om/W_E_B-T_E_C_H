<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LABTASK_2</title>
</head>
<body>
    <p>
        <h1>
            Lab Task 2
        </h1>
    </p>
    <form action=" " type="POST">
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" placeholder="First Name"> <br>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" placeholder="Last Name"> <br>
        <label for="gender">Gender</label>
        <input type="radio" name="gender" id="genderMale"> Male
        <input type="radio" name="gender" id="genderFemale"> Female <br>
        <label for="dateOfBirth">Date of Birth</label>
        <input type="date" name="dateOfBirth" id="dateOfBirth"> <br>
        <input type="checkbox" name="degree" id="degreeSSC"> SSC
        <input type="checkbox" name="degree" id="degreeSSC"> HSC
        <input type="checkbox" name="degree" id="degreeSSC"> BSC <br>
        <label for="university">University</label>
        <select name="university" id="university">
            <option value="universityAIUB">AIUB</option>
            <option value="universityBRAC">BRAC</option>
            <option value="universityEWU">EWU</option>
        </select> <br>
        <label for="creditCompleted">Credit Completed</label>
        <input type="number" name="creditCompleted" id="creditCompleted"> <br>
        <input type="submit" value="SUBMIT">
    </form>

    <?php
        echo "Hello ".$_POST['firstName'] . " ". $_POST['firstName'];
    
    ?>
        
</body>
</html>