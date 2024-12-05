<?php include 'header.php'; ?>

<?php

if (isset($_GET['bookingid'])) {
    $booking_id = $_GET['bookingid'];

    $query = mysqli_query($conn, "SELECT * FROM bookings WHERE booking_id = $booking_id");

    $row = mysqli_fetch_assoc($query);
    $car_name = $row['car_name'];
    $car_brand = $row['brand_name'];
    $charge = $row['charge'];
    $from_date = $row['from_date'];
    $to_date = $row['to_date'];

    $date1 = strtotime($to_date);
    $date2 = strtotime($from_date);
    $diff = $date1 - $date2;
    $days = $diff / (60 * 60 * 24);
    $amount = $charge * $days;
    $gst = (12 / 100) * $amount;
    $totalamount = $gst + $amount;

    $query3 = mysqli_query($conn,"SELECT * FROM brands WHERE brandname = '$car_brand'");
    $fetchbrand = mysqli_fetch_assoc($query3);
    $brandimg = $fetchbrand['brandlogo'];
    $brand_img = './images/brands/' . $brandimg;

    $sql2 = "SELECT * FROM cars WHERE model = '$car_name'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $image = $row2['image'];
    $car_image = './images/cars/' . $image;

    if (isset($_POST['pay'])) {
        $payment_mode = $_POST['paymode'];
        $payment = mysqli_query($conn, "INSERT INTO payments(booking_id,car_name,amount,mode) VALUES($booking_id,'$car_name',$totalamount,'$payment_mode')");

        if ($payment) {
            $query2 = mysqli_query($conn, "UPDATE bookings SET status='booked' WHERE booking_id = $booking_id");
?>
            <script>
                swal({
                    title: "Payment Done!",
                    text: "Car Booked Successfully!",
                    icon: "success",
                }).then(() => {
                    window.location.href = 'mybookings.php';
                });
            </script>
<?php
        }
    }
}




?>

<section>
    <div class="payment_form">
        <div class="payment_car_img">
            <img class="payment_car" src="<?php echo $car_image ?>">
            <div class="payment_car_details">
                <img class="payment_brand" src="<?php echo $brand_img ?>">
                <h3><?php echo $car_name ;?></h3>
            </div>
        </div>
        <form action="" method="post">
            <h3 class="payment_heading">PAYMENT</h3>
            <hr>
            <div class="payment_flex">
                <div class="payment_modes_box">
                    <p>Select Payment Method</p>
                    <div class="payment_mode">
                        <label for="gpay"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
                                <path fill="#e64a19" d="M42.858,11.975c-4.546-2.624-10.359-1.065-12.985,3.481L23.25,26.927	c-1.916,3.312,0.551,4.47,3.301,6.119l6.372,3.678c2.158,1.245,4.914,0.506,6.158-1.649l6.807-11.789	C48.176,19.325,46.819,14.262,42.858,11.975z"></path>
                                <path fill="#fbc02d" d="M35.365,16.723l-6.372-3.678c-3.517-1.953-5.509-2.082-6.954,0.214l-9.398,16.275	c-2.624,4.543-1.062,10.353,3.481,12.971c3.961,2.287,9.024,0.93,11.311-3.031l9.578-16.59	C38.261,20.727,37.523,17.968,35.365,16.723z"></path>
                                <path fill="#43a047" d="M36.591,8.356l-4.476-2.585c-4.95-2.857-11.28-1.163-14.137,3.787L9.457,24.317	c-1.259,2.177-0.511,4.964,1.666,6.22l5.012,2.894c2.475,1.43,5.639,0.582,7.069-1.894l9.735-16.86	c2.017-3.492,6.481-4.689,9.974-2.672L36.591,8.356z"></path>
                                <path fill="#1e88e5" d="M19.189,13.781l-4.838-2.787c-2.158-1.242-4.914-0.506-6.158,1.646l-5.804,10.03	c-2.857,4.936-1.163,11.252,3.787,14.101l3.683,2.121l4.467,2.573l1.939,1.115c-3.442-2.304-4.535-6.92-2.43-10.555l1.503-2.596	l5.504-9.51C22.083,17.774,21.344,15.023,19.189,13.781z"></path>
                            </svg>Google Pay</label>
                        <input type="radio" name="paymode" id="gpay" value="GooglePay" required>
                    </div>

                    <div class="payment_mode">
                        <label for="phonepay"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
                                <path fill="#4527a0" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5	V37z"></path>
                                <path fill="#fff" d="M32.267,20.171c0-0.681-0.584-1.264-1.264-1.264h-2.334l-5.35-6.25	c-0.486-0.584-1.264-0.778-2.043-0.584l-1.848,0.584c-0.292,0.097-0.389,0.486-0.195,0.681l5.836,5.666h-8.851	c-0.292,0-0.486,0.195-0.486,0.486v0.973c0,0.681,0.584,1.506,1.264,1.506h1.972v4.305c0,3.502,1.611,5.544,4.723,5.544	c0.973,0,1.378-0.097,2.35-0.486v3.112c0,0.875,0.681,1.556,1.556,1.556h0.786c0.292,0,0.584-0.292,0.584-0.584V21.969h2.812	c0.292,0,0.486-0.195,0.486-0.486V20.171z M26.043,28.413c-0.584,0.292-1.362,0.389-1.945,0.389c-1.556,0-2.097-0.778-2.097-2.529	v-4.305h4.043V28.413z"></path>
                            </svg>Phone Pay</label>
                        <input type="radio" name="paymode" id="phonepay" value="PhonePe" required>
                    </div>

                    <div class="payment_mode">
                        <label for="paytm"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
                                <path fill="#0d47a1" d="M5.446 18.01H.548c-.277 0-.502.167-.503.502L0 30.519c-.001.3.196.45.465.45.735 0 1.335 0 2.07 0C2.79 30.969 3 30.844 3 30.594 3 29.483 3 28.111 3 27l2.126.009c1.399-.092 2.335-.742 2.725-2.052.117-.393.14-.733.14-1.137l.11-2.862C7.999 18.946 6.949 18.181 5.446 18.01zM4.995 23.465C4.995 23.759 4.754 24 4.461 24H3v-3h1.461c.293 0 .534.24.534.535V23.465zM13.938 18h-3.423c-.26 0-.483.08-.483.351 0 .706 0 1.495 0 2.201C10.06 20.846 10.263 21 10.552 21h2.855c.594 0 .532.972 0 1H11.84C10.101 22 9 23.562 9 25.137c0 .42.005 1.406 0 1.863-.008.651-.014 1.311.112 1.899C9.336 29.939 10.235 31 11.597 31h4.228c.541 0 1.173-.474 1.173-1.101v-8.274C17.026 19.443 15.942 18.117 13.938 18zM14 27.55c0 .248-.202.45-.448.45h-1.105C12.201 28 12 27.798 12 27.55v-2.101C12 25.202 12.201 25 12.447 25h1.105C13.798 25 14 25.202 14 25.449V27.55zM18 18.594v5.608c.124 1.6 1.608 2.798 3.171 2.798h1.414c.597 0 .561.969 0 .969H19.49c-.339 0-.462.177-.462.476v2.152c0 .226.183.396.422.396h2.959c2.416 0 3.592-1.159 3.591-3.757v-8.84c0-.276-.175-.383-.342-.383h-2.302c-.224 0-.355.243-.355.422v5.218c0 .199-.111.316-.29.316H21.41c-.264 0-.409-.143-.409-.396v-5.058C21 18.218 20.88 18 20.552 18c-.778 0-1.442 0-2.22 0C18.067 18 18 18.263 18 18.594L18 18.594z"></path>
                                <path fill="#00adee" d="M27.038 20.569v-2.138c0-.237.194-.431.43-.431H28c1.368-.285 1.851-.62 2.688-1.522.514-.557.966-.704 1.298-.113L32 18h1.569C33.807 18 34 18.194 34 18.431v2.138C34 20.805 33.806 21 33.569 21H32v9.569C32 30.807 31.806 31 31.57 31h-2.14C29.193 31 29 30.807 29 30.569V21h-1.531C27.234 21 27.038 20.806 27.038 20.569L27.038 20.569zM42.991 30.465c0 .294-.244.535-.539.535h-1.91c-.297 0-.54-.241-.54-.535v-6.623-1.871c0-1.284-2.002-1.284-2.002 0v8.494C38 30.759 37.758 31 37.461 31H35.54C35.243 31 35 30.759 35 30.465V18.537C35 18.241 35.243 18 35.54 18h1.976c.297 0 .539.241.539.537v.292c1.32-1.266 3.302-.973 4.416.228 2.097-2.405 5.69-.262 5.523 2.375 0 2.916-.026 6.093-.026 9.033 0 .294-.244.535-.538.535h-1.891C45.242 31 45 30.759 45 30.465c0-2.786 0-5.701 0-8.44 0-1.307-2-1.37-2 0v8.44H42.991z"></path>
                            </svg>Paytm</label>
                        <input type="radio" name="paymode" id="paytm" value="Paytm" required>
                    </div>
                </div>
                <div class="invoice">
                    <p>Billing Details</p>
                    <div class="invoice_details">
                        <li>
                            <span>Charge Per Day</span>
                            <span><?php echo 'Rs. ' . $charge; ?></span>
                        </li>

                        <li>
                            <span>Number of days</span>
                            <span><?php echo $days; ?></span>
                        </li>

                        <li>
                            <span>Subtotal</span>
                            <span><?php echo 'Rs. ' . $amount; ?></span>
                        </li>

                        <li>
                            <span>GST (12%)</span>
                            <span><?php echo 'Rs. ' . $gst; ?></span>
                        </li>
                        <hr>
                        <li class="last_total">
                            <span>Total</span>
                            <span><?php echo 'Rs. ' . $totalamount; ?></span>
                        </li>
                    </div>
                </div>

            </div>
            <hr>

            <button class="btn-pay" type="submit" name="pay">Pay Now</button>

        </form>
    </div>
</section>


<?php include 'footer.php'; ?>