<?php include 'header.php'; 

if(isset($_GET['verifyid'])){
    $id = $_GET['verifyid'];
    $query = mysqli_query($conn,"SELECT * FROM verification WHERE id=$id");
    $data = mysqli_fetch_assoc($query);
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];
    $address = $data['address'];
    $license = $data['license'];
    $lfront = $data['lfront'];
    $lfrontphoto = '../images/license/'.$lfront;
    $lback = $data['lback'];
    $lbackphoto = '../images/license/'.$lback;
    $idproof = $data['idproof'];
    $id_no = $data['id_no'];
    $status = $data['status'];
  
   
}

if(isset($_POST['verifyUser'])){
    $query = mysqli_query($conn,"UPDATE verification SET status='verified' , remark ='' WHERE id=$id");
    if($query){
        echo '<script>alert("Verified Successfully")</script>';
        ?>
                <script>
                    window.location.href = 'verification.php';
                </script>
        <?php
            } else {
                die(mysqli_error($conn));
            }
        }

        if(isset($_POST['removeVerify'])){
            $query = mysqli_query($conn,"UPDATE verification SET status='pending' WHERE id=$id");
            if($query){
                echo '<script>alert("Verification Removed")</script>';
                ?>
                        <script>
                            window.location.href = 'verification.php';
                        </script>
                <?php
                    } else {
                        die(mysqli_error($conn));
                    }
                }
            
    


if(isset($_POST['sendremark'])){
    $remark = $_POST['remark'];
    $query = mysqli_query($conn,"UPDATE verification SET remark='$remark' WHERE id=$id");
    if($query){
        echo '<script>alert("Remark Sent")</script>';
            }
        }

?>

<div class="container">
    <div class="path">Manage Users > <a href="verification.php">Verification</a> > User Details </div>
    <div class="v_user_details_container">
        <div class="v_left">
            <div class="status">Status : <?php if($status == 'verified'){
                echo '<span class="verified">Verified</span>';
                }else{
                    echo '<span class="pending">Pending</span>';
                }
                ?></div>
            <div class="v_details">
                <p><i class="fa-solid fa-angles-right"></i><span>Name : </span><?php echo $name ?></p>
                <p><i class="fa-solid fa-angles-right"></i><span>Email : </span><?php echo $email ?></p>
                <p><i class="fa-solid fa-angles-right"></i><span>Phone : </span><?php echo $phone ?></p>
                <p><i class="fa-solid fa-angles-right"></i><span>License No : </span><?php echo $license ?></p>
                <p><i class="fa-solid fa-angles-right"></i><span>ID Proof : </span><?php echo $idproof ?></p>
                <p><i class="fa-solid fa-angles-right"></i><span>ID Number : </span><?php echo $id_no ?></p>
                <p><i class="fa-solid fa-angles-right"></i><span>Address : </span><?php echo $address ?></p>
            </div>
            <form action="" method="post">
                <?php if($status == 'pending'){
                    echo '<button type="submit" class="verifyUser" name="verifyUser">Verify User</button>';
                }else{
                    echo '<button type="submit" class="removeVerify" name="removeVerify">Remove Verification</button>';
                }
                ?>
            </form>
        </div>

       <?php if($status == 'pending'){
        echo ' <form class="remark_box" method="post">
                <textarea name="remark" rows="5" placeholder="type here"></textarea>
                <button class="send_remark" type="submit" name="sendremark">SEND REMARK</button>
            </form>';
       } ?>
    </div>

    <div class="v_bottom">
            <div class="v_image_box">
           <label for="">License Front Image :</label>
            <img src="<?php echo $lfrontphoto ?>">
            </div>

            <div class="v_image_box">
            <label for="">License Back Image :</label>
            <img src="<?php echo $lbackphoto ?>">
            </div>
        </div>
</div>

<?php include 'footer.php'; ?>