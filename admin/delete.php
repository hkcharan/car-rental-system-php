<?php
include 'config.php';

if(isset($_GET['brandid'])){
    $id = $_GET['brandid'];

    $sql = "DELETE FROM brands WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Brand Deleted Successfullly")</script>';
?>
        <script>
            window.location.href = 'addBrand.php';
        </script>
<?php
    } else {
        die(mysqli_error($conn));
    }
}

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM cars WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Car Deleted Successfullly")</script>';
?>
        <script>
            window.location.href = 'allCars.php';
        </script>
<?php
    } else {
        die(mysqli_error($conn));
    }
}

if(isset($_GET['userid'])){
    $id = $_GET['userid'];

    $sql = "DELETE FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("User Deleted Successfullly")</script>';
?>
        <script>
            window.location.href = 'users.php';
        </script>
<?php
    } else {
        die(mysqli_error($conn));
    }
}

if(isset($_GET['bookingid'])){
    $id = $_GET['bookingid'];

    $sql = "DELETE FROM bookings WHERE booking_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Booking Deleted Successfullly")</script>';
?>
        <script>
            window.location.href = 'viewbookings.php';
        </script>
<?php
    } else {
        die(mysqli_error($conn));
    }
}


if(isset($_GET['verifyid'])){
    $id = $_GET['verifyid'];

    $sql = "DELETE FROM verification WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("User Verification Deleted")</script>';
?>
        <script>
            window.location.href = 'verification.php';
        </script>
<?php
    } else {
        die(mysqli_error($conn));
    }
}


if(isset($_GET['messageid'])){
    $id = $_GET['messageid'];

    $sql = "DELETE FROM contact WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Message Deleted Successfullly")</script>';
?>
        <script>
            window.location.href = 'messages.php';
        </script>
<?php
    } else {
        die(mysqli_error($conn));
    }
}

if(isset($_GET['subscriberid'])){
    $id = $_GET['subscriberid'];

    $sql = "DELETE FROM subscribers WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Subscriber Deleted Successfullly")</script>';
?>
        <script>
            window.location.href = 'subscribers.php';
        </script>
<?php
    } else {
        die(mysqli_error($conn));
    }
}


?>