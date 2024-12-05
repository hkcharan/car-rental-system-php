<?php
session_start();
$nouser = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'config.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $getdata = mysqli_fetch_assoc($result);
            session_start();
            if ($getdata['user_type'] == 'user') {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['name'] = $getdata['name'];
                $_SESSION['phone'] = $getdata['phone'];
                header('location:index.php');
            } elseif ($getdata['user_type'] == 'admin') {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['phone'] = $getdata['phone'];
                $_SESSION['name'] = $getdata['name'];
                header('location:admin/dashboard.php');
            }
        } else {
            $nouser = 1;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rentals</title>
    <link rel="stylesheet" href="./stylesheets/signup.css">
</head>

<body>
    <div class="container">
        <div class="box1">
            <div class="web_name">
                <h1>CAR</h1>
                <h1>RENTALS</h1>
            </div>

            <div class="car-img">
                <img src="./images/car_img.png" alt="">
            </div>
        </div>

        <div class="box2">
            <?php if ($nouser) {
                echo  "<h4>User Not Found!</h4>";
            } ?>
            <div class="form_container">
                <h3>Welcome Back</h3>
                <form action="login.php" method="POST">
                    <div class="input_box">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <div class="input_box">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>

                    <button type="submit" class="btn">Login</button>
                    <h5>Don't have an account? <a href="signup.php">Create Now</a></h5>
                </form>

                <div class="or">OR</div>
                <div class="google_login">
                    <div class="google"><img src="./images/google.png" alt="">Login with Google</div>
                    <div class="google"><img src="./images/facebook.png" alt="">Login with Facebook</div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>