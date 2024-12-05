<?php
include 'header.php';

$mail = $_SESSION['email'];
$sql = "SELECT * FROM bookings WHERE login_email = '$mail'";
$result = mysqli_query($conn, $sql);

?>

<section>
    <div class="mybookings_container">
        <div class="mybooking">
            <h3 class="mybookings_heading">MY BOOKINGS</h3>
            <?php
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $booking_id = $row['booking_id'];
                    $car_name = $row['car_name'];
                    $car_brand = $row['brand_name'];
                    $charge = $row['charge'];
                    $from_date = $row['from_date'];
                    $to_date = $row['to_date'];
                    $status = $row['status'];

                    $date1 = strtotime($to_date);
                    $date2 = strtotime($from_date);
                    $diff = $date1 - $date2;
                    $days = $diff / (60 * 60 * 24);
                    $amount = $charge * $days;
                    $gst = (12 / 100) * $amount;
                    $totalamount = $gst + $amount;

                    $sql2 = "SELECT * FROM cars WHERE model = '$car_name'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $image = $row2['image'];
                    $car_image = './images/cars/' . $image;
                    $pending = "<span class='b_status_pending'>$status</span>";
                    $approved = "<span class='b_status_approved'>$status</span>";
                    $payment_btn = "<a href='payment.php?bookingid=$booking_id'><button class='payment_btn'>Payment</button></a>";

                    echo "<div class='car_details'>
                <div class='booking'>
                <div class='booking_bill'>
                    <h2 class='bookingid'>Booking Status :" . ($status == 'pending' ? $pending : $approved) . "</h2>
                    <h2 class='bookingid'>Booking ID : <span>#$booking_id</span></h2>
                </div>
                <div>
                " . ($status == 'approved' ? $payment_btn : "") . "
                <button class='cancel_btn'><a href='cancelbooking.php?bookingid=$booking_id'>CANCEL BOOKING</a></button>
                </div>
                </div>

                <div class='car_content'>
                   <div class='carr'>
                   <img src='$car_image' alt='Image Not Found'>
                   <div class='car_info'>
                       <h4>$car_name</h4>
                       <h5>Brand : $car_brand</h5>
                       <h5>Charge : $charge / Day</h5>
                   </div>
                   </div>
                    <div class='table'>
                        <table class='content-table'>
                            <thead>
                                <tr>
                                    <th>From Date</th>
                                    <th>To date</th>
                                    <th>Total DAYS</th>
                                </tr>
                            </thead>
                            <tr>
                                    <td>$from_date</td>
                                    <td>$to_date</td>
                                    <td>$days</td>
                                </tr>
                                <tr>
                                    <td colspan='2'>Subtotal</td>
                                    <td>$amount Rs</td>
                                </tr>
                                <tr>
                                <td colspan='2'>GST (12%)</td>
                                    <td>$gst Rs</td>
                                    </tr>

                                    <td colspan='2'>Total Amount</td>
                                    <td>$totalamount Rs</td>
                                    </tr>

                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>";
                }
            } else {
                echo "<h1>No Bookings Found</h1>";
            }
            ?>
        </div>
    </div>



</section>

<?php include 'footer.php'; ?>