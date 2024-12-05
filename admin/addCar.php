<?php include 'header.php'; ?>

<?php
if (isset($_POST['addcar'])) {
    $brand = $_POST['brand'];
    $modelname = $_POST['modelname'];
    $charge = $_POST['charge'];
    $engine = $_POST['engine'];
    $speed = $_POST['speed'];
    $acceleration = $_POST['time'];
    $seats = $_POST['seats'];
    $suitcase = $_POST['suitcase'];
    $transmission = $_POST['transmission'];
    $image = $_FILES['image'];
    $image1 = $_FILES['image1'];
    $image2 = $_FILES['image2'];
    $image3 = $_FILES['image3'];


    $upload_img =  $image['name'];
    move_uploaded_file($image['tmp_name'], '../images/cars/' . $upload_img);

    $upload_img1 = $image1['name'];
    move_uploaded_file($image1['tmp_name'], '../images/cars/' . $upload_img1);

    $upload_img2 = $image2['name'];
    move_uploaded_file($image2['tmp_name'], '../images/cars/' . $upload_img2);

    $upload_img3 = $image3['name'];
    move_uploaded_file($image3['tmp_name'], '../images/cars/' . $upload_img3);

    $insert = "INSERT INTO cars(bname,model,charge,acceleration,engine,speed,transmission,seats,suitcase,image,image1,image2,image3) VALUES('$brand','$modelname','$charge','$acceleration','$engine','$speed','$transmission','$seats','$suitcase','$upload_img','$upload_img1','$upload_img2','$upload_img3')";
    $result = mysqli_query($conn, $insert);
    if ($result) {
        echo '<script>alert("Car Added Successfullly")</script>';
?>
        <script>
            window.location.href = 'addCar.php';
        </script>
<?php
    } else {
        die(mysqli_error($conn));
    }
}

?>


<div class="container">
    <div class="path">Manage Cars > <a href="addCar.php"><span>Add Car</span></a></div>
<div class="addcontainer">
    <form method="POST" enctype="multipart/form-data">
        <div class="form_container">
            <div class="set1">
                <div class="input">
                    <label>Brand Name</label>
                    <select name="brand" required>
                        <option hidden></option>
                        <?php
                        $brands = mysqli_query($conn, "SELECT * FROM `brands`");

                        while ($data = mysqli_fetch_assoc($brands)) {
                            $brandname = $data['brandname'];
                            echo "<option value='$brandname'>$brandname</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="input">
                    <label>Model Name</label>
                    <input type="text" name="modelname" required>
                </div>

                <div class="input">
                    <label>Charge per day (in rupees)</label>
                    <input type="text" name="charge">
                </div>
            </div>


            <div class="set2">
                <div class="input">
                    <label>Acceleration Time</label>
                    <input type="text" name="time">
                </div>

                <div class="input">
                    <label>Engine Size</label>
                    <input type="text" name="engine">
                </div>

                <div class="input">
                    <label>Max Speed</label>
                    <input type="text" name="speed">
                </div>
            </div>


            <div class="set3">
                <div class="input">
                    <label>Transmission</label>
                    <input type="text" name="transmission">
                </div>

                <div class="input">
                    <label>Seats</label>
                    <input type="text" name="seats">
                </div>

                <div class="input">
                    <label>Suitcases</label>
                    <input type="text" name="suitcase">
                </div>
            </div>

            <div class="set4">
                <div class="input">
                    <label>Main Image</label>
                    <input type="file" name="image">
                </div>

                <div class="input">
                    <label>Image 1</label>
                    <input type="file" name="image1">
                </div>

                <div class="input">
                    <label>Image 2</label>
                    <input type="file" name="image2">
                </div>

                <div class="input">
                    <label>Image 3</label>
                    <input type="file" name="image3">
                </div>
            </div>
        </div>

        <button type="submit" name="addcar">ADD CAR</button>
    </form>

</div>
</div>


<?php include 'footer.php'; ?>