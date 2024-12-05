<?php
include 'header.php';

    $sql = "SELECT * FROM bookings WHERE status='approved'";
$result = mysqli_query($conn,$sql);
    ?>
   
   <div class="container">
    <div class="path">Manage Bookings > <a href="approved.php"><span>Approved Bookings</span></a></div>
    <div class="brand_container">
      <table class="content-table">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>User Email</th>
                <th>Model Name</th>
                <th>Brand Name</th>
                <th>From Date</th>
                <th>To Date</th>
                <th >Status</th>
            </tr>
        </thead>
        <tbody>

            <?php
            while ($cars = mysqli_fetch_assoc($result)) {
                $booking_id = $cars['booking_id'];
                $car_name =  $cars['car_name'];
                $brand_name = $cars['brand_name'];
                $login_email = $cars['login_email'];
                $fromdate = $cars['from_date'];
                $todate = $cars['to_date'];
                $status = $cars['status'];

        echo "<tr>
          <td>$booking_id</td>
          <td>$login_email</td>
          <td>$car_name</td>
        <td>$brand_name</td>  
          <td>$fromdate</td>
          <td>$todate</td>
          <td><p class='approved'>$status</p></td>
        </tr>";
            }
            ?>

            
        </tbody>
    </table>

      </div>  
   </div>
    

      <?php include 'footer.php'; ?>