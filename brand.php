<?php
include 'header.php';

$bid = $_GET['brandid'];
$sql = "SELECT * FROM brands WHERE id = $bid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$bname = $row['brandname'];
$blogo = $row['brandlogo'];

$card = "SELECT * FROM cars WHERE bname = '$bname'";
$carresult = mysqli_query($conn, $card);

?>

<section>
<div class="explore_container">
        <div class="mainbox">
            <div class="content">
                <h1><?php echo $bname ;?></h1>
                <div class="carlogo">
                    <?php
                    $brandlogo = './images/brands/'.$blogo;
                     echo "<img src='$brandlogo'>"; ?>
                </div>
            </div>

            <p>Elevate your journey with <span><?php echo $bname ;?></span> Car Hire. Rent an <span><?php echo $bname ;?></span> and experience the perfect blend of elegance and performance for a memorable driving experience.</p>
        </div>

        <div class="carbox">
            <?php  
    while($rowdata = mysqli_fetch_assoc($carresult)){
        $car_name = $rowdata['model'];
        $car_image = $rowdata['image'];
        $ab = './images/cars/'.$car_image;
        
                echo "
                <div class='card'>
                <div class='card_img'>
                     <img src='$ab'>
                </div>
                <h3>$car_name</h3>
                <a href='carDetails.php?carname=$car_name'>SELECT VEHICLE</a>
            </div>";
    }
            ?>
            

        </div>
    </div>
</section>


<?php include 'footer.php'; ?>
</body>

</html>
