<?php 
include("conn.php");
if(!empty($_SESSION["id"]))
{
    header("Location:index.php");
}

if (isset($_POST["submit"]))
{
    $name= $_POST["name"];
    $username =$_POST["username"];
    $email =$_POST["mail"];
    $password =$_POST["pass"];
    $confirmpass = $_POST["cpass"];
    $db = mysqli_query($conn,"SELECT * FROM user_admin  WHERE username ='$username' OR email = '$email'");
    if (mysqli_num_rows($db) > 0) {
        echo "<script>alert('Username or email is already taken');</script>";
    } else {
        if ($password == $confirmpass) {
            $query = "INSERT INTO user_admin (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Registration successful');</script>";
                header("location:admin.php");
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Password does not match');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <?php include("allcss.php"); ?>
    <style>
        .containers {
            margin-top: 50px;
        }
        .form-label {
            font-weight: bold;
        }
        .bg-dark {
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Registration Form -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center bg-primary">
                        <h4>Registration Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" name="name" placeholder="Enter your name..." class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="username" class="form-label">Username:</label>
                                    <input type="text" name="username" placeholder="Enter username..." class="form-control" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="pass" class="form-label">Password:</label>
                                    <input type="password" name="pass" placeholder="Enter your password..." class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cpass" class="form-label">Confirm Password:</label>
                                    <input type="password" name="cpass" placeholder="Enter confirm password..." class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" name="mail" placeholder="Enter your email..." class="form-control" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
