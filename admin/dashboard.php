<?php include 'header.php';


$result1 = mysqli_query($conn, "SELECT * FROM users");
$num1 = mysqli_num_rows($result1);

$result2 = mysqli_query($conn, "SELECT * FROM cars");
$num2 = mysqli_num_rows($result2);

$result3 = mysqli_query($conn, "SELECT * FROM bookings");
$num3 = mysqli_num_rows($result3);

$result4 = mysqli_query($conn, "SELECT * FROM brands");
$num4 = mysqli_num_rows($result4);

$result5 = mysqli_query($conn, "SELECT * FROM contact");
$num5 = mysqli_num_rows($result5);

?>


<?php 

$brands = array();

$query = mysqli_query($conn, "SELECT * FROM brands");
while ($row = mysqli_fetch_assoc($query)) {
    $brands[] = $row['brandname'];
}

if (!empty($brands)) {
    $sql = "SELECT brand_name, COUNT(*) AS count_of_bookings 
            FROM bookings 
            WHERE brand_name IN ('" . implode("','", $brands) . "') 
            GROUP BY brand_name";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $dataPoints = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $brand_label = strtoupper($row['brand_name']);
            $dataPoints[] = array(
                "y" => (int)$row['count_of_bookings'],
                "label" => $brand_label
            );
        }

       
    } else {
        echo "Error executing query" ;
    }
} else {
    echo "No brands found in database.";
}




?>



<div class="container">
<div class="path">Dashboard > <a href="dashboard.php"><span>Home</span></a></div>
    <div class="admin_content">
        <div class="details">
            <div class="box box1">
                <div class="box_desc">

                    <div class="box_icon">
                    <i class="fa-solid fa-users"></i>
                    </div>
                    
                    <div class="box_info">
                        <p>Total Users</p>
                        <h1><?php echo $num1; ?></h1>
                    </div>
                </div>
                <a class="more_info" href="users.php">
                    <p>More info</p>
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>


            <div class="box box2">
                <div class="box_desc">

                    <div class="box_icon">
                    <i class="fa-solid fa-car"></i>
                    </div>
                    
                    <div class="box_info">
                        <p>Total Cars</p>
                        <h1><?php echo $num2; ?></h1>
                    </div>
                </div>
                <a class="more_info" href="allCars.php">
                    <p>More info</p>
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>


            <div class="box box3">
                <div class="box_desc">

                    <div class="box_icon">
                    <i class="fa-solid fa-list"></i>
                    </div>
                    
                    <div class="box_info">
                        <p>Total Bookings</p>
                        <h1><?php echo $num3; ?></h1>
                    </div>
                </div>
                <a class="more_info" href="viewbookings.php">
                    <p>More info</p>
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>

            <div class="box box4">
                <div class="box_desc">

                    <div class="box_icon">
                    <i class="fa-solid fa-truck-pickup"></i>
                    </div>
                    
                    <div class="box_info">
                        <p>Total Brands</p>
                        <h1><?php echo $num4; ?></h1>
                    </div>
                </div>
                <a class="more_info" href="addBrand.php">
                    <p>More info</p>
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>

            <div class="box box5">
                <div class="box_desc">

                    <div class="box_icon">
                    <i class="fa-solid fa-comment-dots"></i>
                    </div>
                    
                    <div class="box_info">
                        <p>Total Messages</p>
                        <h1><?php echo $num5; ?></h1>
                    </div>
                </div>
                <a class="more_info" href="messages.php">
                    <p>More info</p>
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>
        </div>

        <div class="charts">
            <div class="bookings_chart">
                <h1>BOOKINGS</h1>
            <div id="chartContainer"></div>
            </div>
        </div>
    </div>
    </div>
</div>

<?php include 'footer.php'; ?>