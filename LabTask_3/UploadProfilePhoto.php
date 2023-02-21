<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

</head>

<body>
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

            <legend>Profile Picture</legend>
            <fieldset>
                <label for="profilePic">Current Password</label>
                <input type="file" name="profilePic" id="profilePic" style="margin: 5px">
                <hr>
                <input type="submit" name="submit" value="Submit" style="margin: 15px" /> <br>
            </fieldset>


        </form>
        </p>

    </body>
</body>

</html>