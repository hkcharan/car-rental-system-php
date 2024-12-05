<?php
include 'config.php';

if(isset($_GET['approveid'])){
    $id = $_GET['approveid'];

    $sql = "UPDATE bookings SET status = 'approved' WHERE booking_id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Approved Successfully")</script>';
?>
        <script>
            window.location.href = 'viewbookings.php';
        </script>
<?php
    } else {
        die(mysqli_error($conn));
    }
}


if(isset($_GET['rejectid'])){
    $id = $_GET['rejectid'];

    $sql = "UPDATE bookings SET status = 'rejected' WHERE booking_id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Rejected")</script>';
?>
        <script>
            window.location.href = 'viewbookings.php';
        </script>
<?php
    } else {
        die(mysqli_error($conn));
    }
}