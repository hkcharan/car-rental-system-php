<?php
include 'header.php';?>

<?php 
if(isset($_SESSION['email'])){     

    $login_email = $_SESSION['email'];

        $sql = mysqli_query($conn,"SELECT * FROM users WHERE email = '$login_email'");
        $sql2 = mysqli_fetch_assoc($sql);
        $login_id = $sql2['id'];

                if(isset($_POST['verify'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $license = $_POST['license'];
                    $lfrontimage = $_FILES['lfront'];
                    $lbackimage = $_FILES['lback'];
                    $idproof = $_POST['idproof'];
                    $id_no = $_POST['id_no'];
                
                    $lfront =  $lfrontimage['name'];
                    move_uploaded_file($lfrontimage['tmp_name'], './images/license/' . $lfront);
                    $lback =  $lbackimage['name'];
                    move_uploaded_file($lbackimage['tmp_name'], './images/license/' . $lback);
                
                    $insert = mysqli_query($conn,"INSERT INTO verification(login_id,name,email,phone,address,license,lfront,lback,idproof,id_no) VALUES($login_id,'$name','$email',$phone,'$address',$license,'$lfront','$lback','$idproof',$id_no)");
                    
                    if($insert){
                        header('location:index.php');
                    }
                    
                }

            
        
}

?>


<div class="verify_container">
    <div class="verify_details_container">
        <p class="verification_status">Verification Status : <span class="v_not_verified">Not Verifiend</span></p>
        <form action="" method="post" class="verify_form" enctype="multipart/form-data">
            <div class="verify_box">
                <h3>1. Basic Information</h3>
                <div class="v_info">
                    <div class="v_input">
                        <label for="">Name :</label>
                        <input type="text" name="name" required>
                    </div>

                    <div class="v_input">
                        <label for="">Email ID :</label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="v_input">
                        <label for="">Phone Number :</label>
                        <input type="number" name="phone" required>
                    </div>

                    <div class="v_input">
                        <label for="">Address :</label>
                        <textarea name="address" rows="4" required></textarea>
                    </div>
                </div>
            </div>

            <div class="verify_box">
                <h3>2. Driving License</h3>
                <div class="v_info">
                    <div class="v_input">
                        <label for="">Driving License Number :</label>
                        <input type="number" name="license" required>
                    </div>

                    <div class="v_input">
                        <label for="">Driving License Front Image :</label>
                        <input type="file" name="lfront" required>
                    </div>

                    <div class="v_input">
                        <label for="">Driving License Back Image :</label>
                        <input type="file" name="lback" required>
                    </div>

                </div>
            </div>

            <div class="verify_box">
                <h3>3. ID Proof</h3>
                <div class="v_info">
                    <div class="v_input">
                        <label for="">Select ID Proof :</label>
                        <select name="idproof">
                            <option value="adhar">Adhar</option>
                        </select>
                    </div>

                    <div class="v_input">
                        <label for="">Selected ID Proof Number :</label>
                        <input type="number" name="id_no" required>
                    </div>
                </div>
            </div>
            <button type="submit" name="verify" class="verify_btn">SUBMIT</button>
        </form>
    </div>
</div>




<?php include 'footer.php'; ?>