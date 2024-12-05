<?php
session_start();

$fail = 0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'config.php';
    
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
   $password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email'";

$result = mysqli_query($conn,$sql);

if($result){
    $num = mysqli_num_rows($result);
    if($num>0){
        $fail = 1;
    }else{
        $sql = "INSERT INTO users(name,phone,email,password) VALUES ('$name',$phone,'$email','$password')";

        $result = mysqli_query($conn,$sql);
    
       if($result){
        $_SESSION['name'] =$name;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] =$email;
        $_SESSION['password'] = $password;
        header('location:index.php');
       }else{
        die(mysqli_error($conn));
       }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
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
            <?php if($fail){
              echo  "<h4>Email Already Exists!</h4>";
            } ?>
           <div class="form_container">
           <h3>Create Account</h3>
           <form action="signup.php" method="POST">
           <div class="name_box">
                <div class="input_box">
                <label  for="name">Name</label>
                <input type="text" name="name" id="name" required autocomplete="off">
                </div>

                <div class="input_box">
                <label for="phone">Phone</label>
                <input type="number" name="phone" id="phone" required autocomplete="off">
                </div>
            </div>
                <div class="input_box">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required autocomplete="off">
                </div>

                <div class="input_box">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                </div>

                <button type="submit" class="btn">Create Account</button>
                <h5>Already have an account? <a href="login.php">Login</a></h5>
           </form>

           <div class="or">OR</div>
           <div class="google_login">
            <div class="google"><img src="./images/google.png" alt="">Sign up with Google</div>
            <div class="google"><img src="./images/facebook.png" alt="">Sign Up with Facebook</div>
           </div>
           </div>
        </div>

    </div>
</body>
</html>