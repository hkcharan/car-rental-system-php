<?php include 'header.php'; ?>
<div class="container">
    <div class="path">Manage Cars > <a href="allCars.php"><span>All Cars</span></a></div>
    <div class="brand_container">
<div class="table">
            <?php
            $cars = mysqli_query($conn, "SELECT * FROM `cars`");
            ?>

            <table class="content-table">
                <thead>
                    <tr>
                        <th>Car ID</th>
                        <th>Brand Name</th>
                        <th>Model Name</th>
                        <th>Charge</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($data = mysqli_fetch_assoc($cars)) {
                        $cid = $data['id'];
                        $bname = $data['bname'];
                        $model =  $data['model'];
                        $charge = $data['charge'];
                        echo "<tr>
          <td>$cid</td>
          <td>$bname</td>
          <td>$model</td>
          <td>$charge</td>
          <td><button class='update'><a href='updateCar.php? updateid=$cid'>Update</a></button></td>
          <td><button class='delete'><a href='delete.php? deleteid=$cid'>Delete</a></button></td>
        </tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>