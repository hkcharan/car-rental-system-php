<?php
include 'header.php';

if(!isset($_SESSION['email'])){
    header('location:login.php');
}

$login_email = $_SESSION['email'];

$query = mysqli_query($conn,"SELECT * FROM users WHERE email = '$login_email'");
$sql = mysqli_fetch_assoc($query);
$id = $sql['id'];
$query2 = mysqli_query($conn,"SELECT * FROM verification WHERE login_id = $id");
$num = mysqli_num_rows($query2);
$sql2 = mysqli_fetch_assoc($query2);
$status = $sql2['status'];

if($num > 0){
   if($status == 'pending'){
    echo '<script>alert("Please Verify Your Profile Before Booking")</script>';
    ?>
    <script>
        window.location.href='updateverification.php';
    </script>
    <?php  
   }
}else{
    echo '<script>alert("Please Verify Your Profile Before Booking")</script>';
    ?>
    <script>
        window.location.href='verify.php';
    </script>
    <?php
}

$carname = $_GET['carname'];
$sql = "SELECT * FROM cars WHERE model ='$carname'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$name = $row['model'];
$brand = $row['bname'];
$charge = $row['charge'];
$acceleration = $row['acceleration'];
$engine = $row['engine'];
$speed = $row['speed'];
$transmission = $row['transmission'];
$seat = $row['seats'];
$suitcase = $row['suitcase'];
$image = './images/cars/' . $row['image'];
$image1 = './images/cars/' . $row['image1'];
$image2 = './images/cars/' . $row['image2'];
$image3 = './images/cars/' . $row['image3'];




if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $bookingid = rand(111111, 999999);


    $sql2 = "INSERT INTO bookings(first_name, last_name, email, phone, state_name, city_name, user_address, from_date, to_date, booking_id, car_name, brand_name, charge , login_email) VALUES ('$fname','$lname','$email','$phone','$state','$city','$address','$fromdate','$todate','$bookingid','$name','$brand','$charge', '$login_email')";
    $result2 = mysqli_query($conn, $sql2);

    if ($result2) {
        header('location:mybookings.php');
    } else {
        header('location:index.php');
        echo mysqli_error($conn);
    }
}
?>


<section>

    <div class="booking_container">
        <div class="booking_details_container">
            <form method="POST" class="booking_form">
                <div class="input_set">
                    <div class="input">
                        <label>first name</label>
                        <input type="text" name="fname" required>
                    </div>

                    <div class="input">
                        <label>last name</label>
                        <input type="text" name="lname" required>
                    </div>
                </div>

                <div class="input_set">
                    <div class="input">
                        <label>email</label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="input iset">
                        <label>mobile number</label>
                        <input type="number" name="phone" required>
                    </div>
                </div>

                <div class="input_set">
                    <div class="input">
                        <label>state</label>
                        <input type="text" name="state" required>
                    </div>

                    <div class="input">
                        <label>city</label>
                        <input type="text" name="city" required>
                    </div>
                </div>

                <div class="address_input">
                    <label>address</label>
                    <textarea name="city" rows="4" required></textarea>
                </div>

                <div class="input_set">
                <div class="input">
                <label>from date</label>
                <input type="date" name="fromdate" id="pickupdate" required >
                </div>

                <div class="input">
                <label>to date</label>
                <input type="date" name="todate" id="dropoffdate" required >
                </div>
                </div>
                <button type="submit" name="submit">BOOK NOW</button>
            </form>

            <div class="b_details_container">
            <div class="b_first_container">
                <h2>Your Booking Details</h2>
                <div class="booking_desc">
                    <p>Pickup City : <span>Bangalore</span></p>
                    <p>Car Name : <span><?php echo "$name" ;?></span></p>
                    <p>Brand Name : <span><?php echo "$brand" ;?></span></p>
                    <p>Charge : <span><?php echo "$charge" ;?> / Day</span> </p>
                </div>
            </div>
            <div class="big_image">
        <img src="<?php echo $image; ?>" alt="Image Not Found" id="image">
        </div>
        </div>
        </div>

        
    <div class="b_image_container">
        <div class="small_image">
            <h3>CAR IMAGES</h3>
                <div class="small_box">
                <img src="<?php echo $image; ?>" alt="Image Not Found" onclick="change()"> 
                <img src="<?php echo $image1; ?>" alt="Image Not Found" onclick="change1()">
                <img src="<?php echo $image2; ?>" alt="Image Not Found" onclick="change2()">
                <img src="<?php echo $image3; ?>" alt="Image Not Found" onclick="change3()">
                </div>
        </div>

        <div class="b_key_info">
            <h3 class="b_heading">CAR DETAILS</h3>
            <div class="b_key_info_boxes">
                <div class="info_box">
                    <img src="./images/time.png" alt="">
                    <h3><?php echo $acceleration; ?> sec</h3>
                    <h5>0-60 miles/h</h5>
                </div>

                <div class="info_box">
                    <img src="./images/engine.png" alt="">
                    <h3><?php echo $engine; ?> L</h3>
                    <h5>Engine Size</h5>
                </div>

                <div class="info_box">
                    <img src="./images/speed.png" alt="">
                    <h3><?php echo $speed; ?> mph/h</h3>
                    <h5>Max. Speed</h5>
                </div>

                <div class="info_box">
                    <img src="./images/transmission.png" alt="">
                    <h3><?php echo $transmission; ?></h3>
                    <h5>Transmission</h5>
                </div>

                <div class="info_box">
                    <img src="./images/seat.png" alt="">
                    <h3><?php echo $seat; ?> People</h3>
                    <h5>Seats</h5>
                </div>

                <div class="info_box">
                    <img src="./images/suitcase.png" alt="">
                    <h3><?php echo $suitcase; ?></h3>
                    <h5>Suitcases</h5>
                </div>
            </div>
        </div>
    </div>

    </div>

</section>

<?php include 'footer.php'; ?>