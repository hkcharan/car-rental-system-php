<?php
include 'header.php';

    $sql = "SELECT * FROM bookings WHERE status='pending'";
    $result = mysqli_query($conn,$sql);
    ?>
   
   
   <div class="container">
    <div class="path">Dashboard > <a href="viewbookings.php"><span>All Bookings</span></a></div>
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
                <th>Approve</th>
                <th>Reject</th>
            </tr>
        </thead>
        <tbody>

            <?php

if($result){
    $num = mysqli_num_rows($result);
    if($num>0){
      while ($cars = mysqli_fetch_assoc($result)) {
        $booking_id = $cars['booking_id'];
        $car_name =  $cars['car_name'];
        $brand_name = $cars['brand_name'];
        $login_email = $cars['login_email'];
        $fromdate = $cars['from_date'];
        $todate = $cars['to_date'];

echo "<tr>
  <td>$booking_id</td>
  <td>$login_email</td>
  <td>$car_name</td>
<td>$brand_name</td>  
  <td>$fromdate</td>
  <td>$todate</td>
  <td><button class='update'><a href='manageBookings.php?approveid=$booking_id'>Approve</a></button></td>
  <td><button class='delete'><a href='manageBookings.php?rejectid=$booking_id'>Reject</a></button></td>
</tr>";
    }
    }else{
      echo '<tr><td>No Data Found</td></tr>';
    };
  }
           
            ?>

            
        </tbody>
    </table>

      </div>  
   </div>
    

      <?php include 'footer.php'; ?>