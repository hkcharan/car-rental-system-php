<?php
include 'config.php';

if(isset($_GET['bookingid'])){
    $id = $_GET['bookingid'];

    $sql = "DELETE FROM bookings WHERE booking_id = '$id'";
    $result = mysqli_query($conn, $sql);

    $sql2 = "DELETE FROM payments WHERE booking_id = '$id'";
    $result2 = mysqli_query($conn, $sql2);

    if($result){
        header('location:mybookings.php');
    }else{
        echo mysqli_error($conn);
        echo "Something Went Wrong";
    }
}


?>