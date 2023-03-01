<!DOCTYPE html>
<html>

<head>
    <title>Forget Password</title>
    <style>
    .popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1;
    }

    .popup__content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <a href="#" onclick="openPopup()">Forget Password</a>

    <div class="popup" id="popup">
        <div class="popup__content">
            <h2>Enter your email to reset password</h2>
            <form action="forgetPassword.php" method="POST">
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit" name="submit">Submit</button>
            </form>
            <a href="#" onclick="closePopup()">Close</a>
        </div>
    </div>

    <script>
    function openPopup() {
        document.getElementById("popup").style.display = "flex";
    }

    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
    </script>
</body>

</html>