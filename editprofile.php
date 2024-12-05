<?php
include 'config.php';
session_start();
$fail = 0;

$email = $_SESSION['email'];
$name = $_SESSION['name'];
$phone =  $_SESSION['phone'];
$password =  $_SESSION['password'];



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['name'];
    $userphone = $_POST['phone'];
    $useremail = $_POST['email'];
    $userpassword = $_POST['password'];

    if($useremail == $email){
        $sql = "UPDATE users SET name = '$username', email = '$useremail', phone=$userphone , password = '$userpassword' WHERE email = '$email'";

        if ($sql) {
            $_SESSION['name'] = $username;
            $_SESSION['phone'] = $userphone;
            $_SESSION['email'] = $useremail;
            $_SESSION['password'] = $userpassword;
            header('location:index.php');
        } else {
            die(mysqli_error($conn));
        }
    }else{
        $sql = "SELECT * FROM users WHERE email = '$useremail'";

        $result = mysqli_query($conn,$sql);
    
        if($result){
        $num = mysqli_num_rows($result);
        if($num>0){
            $fail = 1;
        }else{
    
        $sql = "UPDATE users SET name = '$username', email = '$useremail', phone=$userphone , password = '$userpassword' WHERE email = '$email'";
    
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
                    $_SESSION['name'] = $username;
                    $_SESSION['phone'] = $userphone;
                    $_SESSION['email'] = $useremail;
                    $_SESSION['password'] = $userpassword;
                    header('location:index.php');
                } else {
                    die(mysqli_error($conn));
                }
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
                <h3>Edit Profile</h3>
                <form action="" method="POST">
                    <div class="name_box">
                        <div class="input_box">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="<?php echo $name ?>" autocomplete="off">
                        </div>

                        <div class="input_box">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" id="phone" value="<?php echo $phone ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="input_box">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $email ?>" autocomplete="off">
                    </div>

                    <div class="input_box">
                        <label for="password">Password</label>
                        <input type="text" name="password" value="<?php echo $password ?>" id="password" required>
                    </div>

                    <button type="submit" class="btn">Update Profile</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>