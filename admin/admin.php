<?php
include("conn.php");

if (!empty($_SESSION["id"])) {
    header("Location:index.php");
    exit();
}

if (isset($_POST["submit"])) {
    $usernamemail = $_POST["usernamemail"];
    $password = $_POST["adminpass"];
    $result = mysqli_query($conn, "SELECT * FROM user_admin WHERE username = '$usernamemail' OR email = '$usernamemail'");

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        if ($password == $data["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $data["id"];
            header("Location: gallerytable.php");
            exit();
        } else {
            echo "<script>alert('Wrong Password');</script>";
        }
    } else {
        echo "<script>alert('Username not registered');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>
<style>
        .login-form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .input-field {
            margin-bottom: 15px;
        }

        .error {
            color: red;
            font-size: 0.9rem;
            margin-top: 2px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="login-form">
        <h2 class="text-center">ADMIN LOGIN</h2>
        <form method="POST" action="" onsubmit="return validateForm()">
            <div class="input-field">
                <input type="text" placeholder="Enter username or email..." name="usernamemail" id="usernamemail" class="form-control">
                <div id="username-error" class="error"></div>
            </div>
            <div class="input-field">
                <input type="password" placeholder="Enter Your Password..." name="adminpass" id="adminpass" class="form-control">
                <div id="password-error" class="error"></div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
            <div class="extra text-center mt-3">
                <a href="#">Forget Password?</a>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            let isValid = true;

            const username = document.getElementById("usernamemail").value.trim();
            const password = document.getElementById("adminpass").value.trim();

            // Clear previous error messages
            document.getElementById("username-error").innerText = "";
            document.getElementById("password-error").innerText = "";

            // Validate username/email field
            if (username === "") {
                document.getElementById("username-error").innerText = "Please enter your username or email.";
                isValid = false;
            }

            // Validate password field
            if (password === "") {
                document.getElementById("password-error").innerText = "Please enter your password.";
                isValid = false;
            }

            return isValid; // Prevent form submission if validation fails
        }
    </script>
</body>
</body>
</html>
<style>
    body {
        background-image: url('./assets/images/bg4.webp'); 
        padding:8px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f8f9fa;
        margin: 0;
    }
    .extra{
        float:left;
    }
    .login-form {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
        text-align: center;
    }
    .login-form h2 {
        margin-bottom: 20px;
        font-weight: bold;
        color: #333;
    }
    .input-field {
        margin-bottom: 15px;
        position: relative;
    }
    .input-field i {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
    }
    .input-field input {
        width: 100%;
        padding: 10px 15px 10px 35px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .login-form button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        width: 100%;
        font-size: 16px;
        cursor: pointer;
    }
    .login-form button:hover {
        background-color: #0056b3;
    }
    .extra {
        margin-top: 10px;
    }
    .extra a {
        color: #007bff;
        text-decoration: none;
    }
    .extra a:hover {
        text-decoration: underline;
    }
</style>