<?php include 'header.php'; 

$carname = $_GET['carname'];

$sql2 = "SELECT * FROM cars WHERE model = '$carname'";
$result2 = mysqli_query($conn, $sql2);

$row2 = mysqli_fetch_assoc($result2);
$model = $row2['model'];
$bname = $row2['bname'];
$charge = $row2['charge'];
$acceleration = $row2['acceleration'];
$engine = $row2['engine'];
$speed = $row2['speed'];
$transmission = $row2['transmission'];
$seat = $row2['seats'];
$suitcase = $row2['suitcase'];
$image = './images/cars/' . $row2['image'];
$image1 = './images/cars/' . $row2['image1'];
$image2 = './images/cars/' . $row2['image2'];
$image3 = './images/cars/' . $row2['image3'];

$sql = "SELECT * FROM brands WHERE brandname = '$bname'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$brand = $row['brandlogo'];
$brandlogo = './images/brands/'.$brand;
?>

?>

<section>
    <div class="car_details_container">
        <div class="image_container">
            <div class="big_img_container">
                <img id="image" src="<?php echo $image; ?>" alt="Image Not Found">
            </div>

            <div class="small_img_container">
                <div class="info_container">
                    <div class="car_information">
                        <div class="car_name">
                            <h3>Model</h3>
                            <h1><?php echo $model; ?></h1>
                        </div>

                        <div class="car_name">
                            <h3>CHARGE</h3>
                            <h1>Rs <?php echo $charge;?> / Day</h1>
                        </div>
                    </div>

                    <div class="brand_logo">
                        <img src="<?php echo $brandlogo; ?>" alt="">
                    </div>
                </div>

                <div class="car_images_container">
                    <img id="image0" src="<?php echo $image; ?>" alt="Image Not Found" onclick="change()">
                    <img id="image1" src="<?php echo $image1; ?>" alt="Image Not Found" onclick="change1()">
                    <img id="image2" src="<?php echo $image2; ?>" alt="Image Not Found" onclick="change2()">
                    <img id="image3" src="<?php echo $image3; ?>" alt="Image Not Found" onclick="change3()">
                </div>

                <a href="carBooking.php?carname=<?php echo $carname; ?>" class="car_details_btn">RENT CAR</a>
            </div>
        </div>
        <div class="key_info">
            <div class="key_info_boxes">
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
</section>

<?php include 'footer.php'; ?>