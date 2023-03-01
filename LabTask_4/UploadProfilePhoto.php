<!-- Working Successfully -->

<?php
    error_reporting(0);  // This line will hide all the given errors in php
    $fileError = "";
    $fileName = "";
    

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    }
    
    // Check if image file is a actual image or fake image
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $check = getimagesize($_FILES["profilePic"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        }else if ($_FILES["profilePic"]["size"] > 4000000) { // 4MB in Bytes
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // If everything is ok, try to upload file
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
                $fileName = htmlspecialchars(basename($_FILES["profilePic"]["name"]));
                $target_file = "" . basename($_FILES["profilePic"]["name"]);
                $fileError =  "The file ". htmlspecialchars( basename( $_FILES["profilePic"]["name"])). " has been uploaded.";
            } else {
                $fileError = "Sorry, there was an error uploading your file.";
            }
        }




    }

    


?>














<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Picture</title>

</head>

<body>
    <style>
    body {
        text-align: center;
    }

    legend {
        font-weight: bold;
        font-size: 20px;
    }

    form {
        display: inline-block;
    }
    </style>
    </head>

    <body>

        <p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

            <legend>Profile Picture</legend>
            <fieldset>
                <img src="<?php if($_SERVER['REQUEST_METHOD'] === 'POST'){echo "uploads/$fileName";}else{echo "uploads/temp.png";} ?>"
                    alt="Profile Picture" width="200px" height="200px"> <br>
                <input type="file" name="profilePic" id="profilePic" style="margin: 5px">
                <hr>
                <input type="submit" name="submit" value="Submit" style="margin: 15px" /> <br>
                <?php echo $fileError;?>
            </fieldset>


        </form>
        </p>

    </body>
</body>

</html>