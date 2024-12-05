<?php include 'header.php'; ?>

<?php 
if(isset($_POST['search'])){

$pickupdate = $_POST['pickupdate'];
$dropoffdate = $_POST['dropoffdate'];


$_SESSION['pickupdate'] = $pickupdate;
$_SESSION['dropoffdate'] = $dropoffdate;

header('location:exploreCars.php?');
} 

?>

<section class="home">
    <h1>CAR RENTALS</h1>

    <div class="about_btn"><a href="about.php">ABOUT US</a></div>

    <div class="social_btn">
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-whatsapp"></i>
        <i class="fa-brands fa-facebook-f"></i>
    </div>
</section>

<section class="search">
    <div class="heading">
        <h3>FIND A CAR</h3>
    </div>
    <p class="search_desc">Are you looking for cheap car hire deals in Karnataka? Search right here!</p>

    <form action="" method="post">
        <div class="search_container">
            <div class="inputbox">
                <label for="">City</label>
                <select name="" id="" class="select">
                    <option value="bangalore">Bangalore</option>
                </select>
            </div>
            <div class="inputbox">
                <label for="">Pick-up date</label>
                <input type="date" name="pickupdate" id="pickupdate" required>
            </div>
            <div class="inputbox">
                <label for="">Drop-off date</label>
                <input type="date" name="dropoffdate" id="dropoffdate" required>
            </div>
            <button type="submit" name="search" class="search_btn">
                Explore Cars
            </button>
        </div>

    </form>
</section>

<section class="brands" id="brands">
    <div class="heading">
        <h3>SELECT A BRAND</h3>
    </div>
    <div class="brands_container">
        <?php
        $sql = "SELECT * FROM brands ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {

            $id = $row['id'];
            $brandname = $row['brandname'];
            $brandimage = $row['brandlogo'];
            $brandlogo = 'images/brands/'.$brandimage;
            echo "<div class='brand_item'>
                <img class='brand_logo' src='$brandlogo'>
                <div class='brand_name'>
                    <h2>$brandname</h2>
                    <a href='brand.php?brandid=$id'> See All Models<span><i class='fa-solid fa-angles-right'></i></span></a>
                </div>
            </div>";
        }

        ?>
    </div>
    </div>
</section>

<section class="services" id="services">
    <div class="heading">
        <h3>OUR SERVICES</h3>
    </div>

    <div class="service_container">
        <div class="service s1">
            <h3>Super Car Hire</h3>
            <button class="sbtn">BROWSE CARS</button>
        </div>

        <div class="service s2">
            <h3>Prestige Car Hire</h3>
            <button class="sbtn">BROWSE CARS</button>
        </div>

        <div class="service s3">
            <h3>Wedding Car Hire</h3>
            <button class="sbtn">BROWSE CARS</button>
        </div>

        <div class="service s4">
            <h3>Long Term Hire</h3>
            <button class="sbtn">BROWSE CARS</button>
        </div>

    </div>
</section>

<section class="services" id="services">
    <div class="heading">
        <h3>Why Choose Us</h3>
    </div>
    <h3>Experience The Exotic & Luxury Car Collection By Royal Rentals</h3>
    <div class="why_container">
        <div class="why">
            <i class="fa-solid fa-car"></i>
            <h4>Variety of Car Brands</h4>
            <p>Audi , Bentley , BMW , Lamborghini , Bugatti , Ferrari , Mclaren , Rolls Royce , Porsche and more.</p>
        </div>

        <div class="why">
            <i class="fa-solid fa-hand-holding-dollar"></i>
            <h4>Best Rate Guarantee</h4>
            <p>We guarantee you always get the lowest price when you reserve an exotic & luxury car through an official Exotic & Luxury Car Rental company booking channel, or we'll match the lower price.</p>
        </div>

        <div class="why">
            <i class="fa-solid fa-headset"></i>
            <h4>24*7 Customer Support</h4>
            <p>Customer service always plays the biggest role in our company's vision of being a sustainable business. Our goal is to provide you with bar none superior service at any cost.</p>
        </div>
    </div>

</section>


<?php include 'footer.php'; ?>