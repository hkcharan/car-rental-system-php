<?php include 'header.php'; ?>

<section>
    <div class="explore_container">
        <div class="explore_filter_container">
            <form action="" method="post" class="explore_form">
                <div class="filter_input_box">
                    <label for="">Pickup Date</label>
                    <input type="date"  value="<?php echo $_SESSION['pickupdate']; ?>" disabled>
                </div>
                <div class="filter_input_box">
                    <label for="">Dropoff Date</label>
                    <input type="date"  value="<?php echo $_SESSION['dropoffdate']; ?>" disabled>
                </div>
                <div class="filter_input_box">
                    <label for="">Filter</label>
                    <select name="brand">
                        <option value="all">All Brands</option>
                        <?php
                        $brandsquery = mysqli_query($conn, "SELECT * FROM brands");
                        while ($fetchbrands = mysqli_fetch_assoc($brandsquery)) {
                            $brandname = $fetchbrands['brandname'];
                            echo "<option value='$brandname'>$brandname</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="filter_btn" name="filter">SEARCH</button>
            </form>
        </div>
        <div class="filter_brand_name">
            <h1><?php
            if(isset($_POST['filter'])){
                $filtered = $_POST['brand'];
            
            if($filtered == "all"){
                echo "All Brands";
            }else{
                    echo "$filtered";
                };
            }else{
                echo "ALL BRANDS";
            }
            
             ?></h1>
        </div>
        <div class="carbox">
            <?php

            if (isset($_POST['filter'])) {
                $brand = $_POST['brand'];
                if ($brand == "all") {
                    $filter_query = mysqli_query($conn, "SELECT * FROM cars");
                } else {
                    $filter_query = mysqli_query($conn, "SELECT * FROM cars WHERE bname = '$brand'");
                }

                $num = mysqli_num_rows($filter_query);
                if ($num > 0) {
                    while ($rowdata = mysqli_fetch_assoc($filter_query)) {
                        $car_name = $rowdata['model'];
                        $car_image = $rowdata['image'];
                        $ab = './images/cars/' . $car_image;

                        echo "
                        <div class='card'>
                        <div class='card_img'>
                             <img src='$ab'>
                        </div>
                        <h3>$car_name</h3>
                        <a href='carDetails.php?carname=$car_name'>SELECT VEHICLE</a>
                    </div>";
                    }
                } else {
                    echo "<script> alert ('No Cars Found')</script>";
            ?>
                    <script>
                        window.location.href = 'exploreCars.php';
                    </script>
            <?php
                }
            } else {
                $carresult = mysqli_query($conn, " SELECT * FROM cars");
                while ($rowdata = mysqli_fetch_assoc($carresult)) {
                    $car_name = $rowdata['model'];
                    $car_image = $rowdata['image'];
                    $ab = './images/cars/' . $car_image;

                    echo "
                    <div class='card'>
                    <div class='card_img'>
                         <img src='$ab'>
                    </div>
                    <h3>$car_name</h3>
                    <a href='carDetails.php?carname=$car_name'>SELECT VEHICLE</a>
                </div>";
                }
            }
            ?>


        </div>
    </div>
</section>

<?php include 'footer.php'; ?>