<?php include 'header.php';?>
<?php

if (isset($_POST['addbrand'])) {
    $brandname = $_POST['brandname'];
    $brandimage = $_FILES['brandlogo'];

    $brandlogo =  $brandimage['name'];
    move_uploaded_file($brandimage['tmp_name'], '../images/brands/' . $brandlogo);

    $insert = mysqli_query($conn, "INSERT INTO brands(brandname,brandlogo) VALUES('$brandname','$brandlogo')");
    if ($insert) {
        echo '<script>alert("Brand Added Successfullly")</script>';
?>
        <script>
            window.location.href = 'addBrand.php';
        </script>
<?php
    } else {
        die(mysqli_error($conn));
    }
}

?>
<div class="container">
    <div class="path">Manage Cars > <a href="addBrand.php"><span>Add Brand</span></a></div>
    <div class="brand_container">
        <form class="form" method="post" enctype="multipart/form-data">
            <p class="form-title">Add a Brand</p>
            <div class="form-flex">
            <div class="input-container">
                <label for="">Brand Name :</label>
                <input type="text" placeholder="Enter Brand Name" name="brandname" required>
                
            </div>
            <div class="input-container">
                <label for="">Brand Logo :</label>
                <input type="file" name="brandlogo" required>
            </div>
            <button type="submit" class="submit" name="addbrand">
                Add Brand
            </button>
            </div>

        </form>

        <div class="table">
            <?php
            $brands = mysqli_query($conn, "SELECT * FROM `brands`");
            ?>

            <table class="content-table">
                <thead>
                    <tr>
                        <th>Brand Name</th>
                        <th>Brand Logo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($data = mysqli_fetch_assoc($brands)) {
                        $bid = $data['id'];
                        $bname = $data['brandname'];
                        $blogo =  $data['brandlogo'];
                        $brandlogo = '../images/brands/'.$blogo;
                        echo "<tr>
          <td>$bname</td>
          <td><img src='$brandlogo' class='brandlogo'></td>
          <td><button><a href='delete.php? brandid=$bid'>Delete</a></button></td>
        </tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>