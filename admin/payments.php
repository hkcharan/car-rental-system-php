<?php
include 'header.php';

$sql = "SELECT * FROM payments";
$result = mysqli_query($conn, $sql);
?>

<div class="container">
    <div class="path">Manage Bookings > <a href="payments.php"><span>Payments</span></a></div>
    <div class="brand_container">
        <table class="content-table">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Car Name</th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if ($result) {
                    $num = mysqli_num_rows($result);
                    if ($num > 0) {
                        while ($data = mysqli_fetch_assoc($result)) {
                            $booking_id = $data['booking_id'];
                            $car_name =  $data['car_name'];
                            $amount = $data['amount'];
                            $mode = $data['mode'];

                            echo "<tr>
                                    <td>$booking_id</td>
                                    <td>$car_name</td> 
                                    <td>$amount</td>
                                    <td>$mode</td>
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