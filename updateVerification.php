<?php
include 'header.php';?>

<?php 
$login_email = $_SESSION['email'];

        $sql = mysqli_query($conn,"SELECT * FROM users WHERE email = '$login_email'");
        $sql2 = mysqli_fetch_assoc($sql);
        $login_id = $sql2['id'];


        $query = mysqli_query($conn,"SELECT * FROM verification WHERE login_id=$login_id");
        $verifycount = mysqli_num_rows($query);

        if($verifycount > 0){
            $data = mysqli_fetch_assoc($query);
            $name = $data['name'];
            $email = $data['email'];
            $phone = $data['phone'];
            $address = $data['address'];
            $license = $data['license'];
            $lfront = $data['lfront'];
            $lfrontphoto = './images/license/'.$lfront;
            $lback = $data['lback'];
            $lbackphoto = './images/license/'.$lback;
            $idproof = $data['idproof'];
            $id_no = $data['id_no'];
            $status = $data['status'];
            $remark = $data['remark'];
        }else{
            header('location:index.php');
        }
        
        
       


                if(isset($_POST['update'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $license = $_POST['license'];
                    $lfrontimage = $_FILES['lfront'];
                    $lbackimage = $_FILES['lback'];
                    $idproof = $_POST['idproof'];
                    $id_no = $_POST['id_no'];
                    $remark ='';
                
                    $lfront =  $lfrontimage['name'];
                    move_uploaded_file($lfrontimage['tmp_name'], './images/license/' . $lfront);
                    $lback =  $lbackimage['name'];
                    move_uploaded_file($lbackimage['tmp_name'], './images/license/' . $lback);
                
                    $insert = mysqli_query($conn,"UPDATE verification SET name = '$name',email='$email',phone=$phone,address='$address',license=$license,lfront='$lfront',lback='$lback',idproof='$idproof',id_no=$id_no,remark='$remark' WHERE login_id=$login_id");
                    
                    if($insert){
                        header('location:index.php');
                    }
                    
                }

                
?>



<div class="verify_container">
    <div class="verify_details_container">
        <p class="verification_status">Verification Status : <?php if($status=='pending'){
            echo '<span class="v_pending">Under Review</span>';
        }else{
            echo '<span class="v_verified">Verified</span>';
        } ?></p>
        <?php if(!empty($remark)){
            echo '<div class="remark_box">REMARK : '.$remark.'</div>';
        }else{
            if($status == 'pending'){
                echo '<div class="note_box">Your Account Will Be Verified in Few Hours...</div>';
            }  
        }
        ?>
        <form action="" method="post" class="verify_form" enctype="multipart/form-data">
            <div class="verify_box">
                <h3>1. Basic Information</h3>
                <div class="v_info">
                    <div class="v_input">
                        <label for="">Name :</label>
                        <input type="text" name="name" value="<?php echo $name ?>" <?php echo ($status == 'verified') ? 'disabled' : '' ?>>
                    </div>

                    <div class="v_input">
                        <label for="">Email ID :</label>
                        <input type="email" name="email" value="<?php echo $email ?>" <?php echo ($status == 'verified') ? 'disabled' : '' ?>>
                    </div>

                    <div class="v_input">
                        <label for="">Phone Number :</label>
                        <input type="number" name="phone" value="<?php echo $phone ?>" <?php echo ($status == 'verified') ? 'disabled' : '' ?>>
                    </div>

                    <div class="v_input">
                        <label for="">Address :</label>
                        <textarea name="address" rows="4" <?php echo ($status == 'verified') ? 'disabled' : '' ?>><?php echo $address ?></textarea>
                    </div>
                </div>
            </div>

            <div class="verify_box">
                <h3>2. Driving License</h3>
                <div class="v_info">
                    <div class="v_input">
                        <label for="">Driving License Number :</label>
                        <input type="number" name="license" value="<?php echo $license; ?>" <?php echo ($status == 'verified') ? 'disabled' : '' ?>>
                    </div>
                    <?php 
                    if($status == 'pending'){
                    echo '<div class="v_input">
                        <label for="">Driving License Front Image :</label>
                        <input type="file" name="lfront" >
                    </div>

                    <div class="v_input">
                        <label for="">Driving License Back Image :</label>
                        <input type="file" name="lback">
                    </div>';
                    }
                    ?>

                </div>
            </div>

            <div class="verify_box">
                <h3>3. ID Proof</h3>
                <div class="v_info">
                    <div class="v_input">
                        <label for="">Select ID Proof :</label>
                        <select name="idproof" <?php echo ($status == 'verified') ? 'disabled' : '' ?>>
                            <option value="adhar">Adhar</option>
                        </select>
                    </div>

                    <div class="v_input">
                        <label for="">Selected ID Proof Number :</label>
                        <input type="number" name="id_no" value="<?php echo $id_no?>" <?php echo ($status == 'verified') ? 'disabled' : '' ?>>
                    </div>
                </div>
            </div>

            <div class="verify_box">
                <h3>Last Uploaded License Images</h3>
                <div class="v_info">
                    <div class="v_input">
                    <label for="">License Front Image :</label>
                    <img src="<?php echo $lfrontphoto ?>" alt="">
                    </div>

                    <div class="v_input">
                    <label for="">License Back Image :</label>
                    <img src="<?php echo $lbackphoto ?>" alt="">
                    </div>
                </div>
            </div>

            <?php 
            if($status == 'pending'){
                echo '<button type="submit" name="update" class="verify_btn">UPDATE</button>';
            }
            ?>
        </form>
    </div>
</div>



<?php include 'footer.php'; ?>