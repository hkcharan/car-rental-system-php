
<?php 
           if(isset($_SESSION['email'])){
            $useremail = $_SESSION['email'];
            $sql = mysqli_query($conn,"SELECT * FROM users WHERE email = '$useremail'");
            $sql2 = mysqli_fetch_assoc($sql);
            $login_id = $sql2['id'];
            $query = mysqli_query($conn,"SELECT * FROM verification WHERE login_id = $login_id");
           }
            
?>


<nav>
    <div class="logo">
        CAR RENTALS
    </div>

    <div class="menu">
        <li><a href="index.php">HOME</a></li>
        <li><a href="about.php">ABOUT</a></li>
        <li><a href="index.php?#services">SERVICES</a></li>
        <li><a href="contact.php">CONTACT</a></li>
    </div>


<?php
if (isset($_SESSION['email'])) {
    echo "<div class='user'>
        <img src='images/user.png' onclick='openUser()'>
    </div>";
}
?>

<?php
if (!isset($_SESSION['email'])) {
    echo "<div class='login_signup'>
    <a href='login.php'><button>Sign in / Sign up
</button></a>
    
</div>";
}
?>

    <div class="user_container">
        <div class="profile">
            <img src="images/user.png" alt="">
        </div>

        <div class="profile_items">

       
            
        
            <?php 
           if(isset($_SESSION['email'])){
            $count = mysqli_num_rows($query);
            if($count > 0){
               $fetchstatus = mysqli_fetch_assoc($query);
               if($fetchstatus['status']=='pending'){
                echo '
                <a class="item pendingstatus" href="updateVerification.php">
                <i class="fa-solid fa-user-clock"></i>
                <p>Verification Pending</p>
                <i class="fa-solid fa-caret-right"></i>
                </a>';
               }else{
                echo '
                <a class="item verifiedstatus" href="updateVerification.php">
                <i class="fa-solid fa-user-check"></i>
                <p>Verified</p>
                <i class="fa-solid fa-caret-right"></i>
                </a>';
               };
            }else{
                echo '
                <a class="item notverifiedstatus" href="verify.php">
                <i class="fa-solid fa-user-shield"></i>
                <p>Verify Your Profile</p>
                <i class="fa-solid fa-caret-right"></i>
                </a>';
            }
           }
            ?>
       
            

            <a class="item" href="">
                <i class="fa-solid fa-circle-user"></i>
                <p><?php
                    echo $_SESSION['name'];
                    ?>
                </p>
            </a>

            <a class="item" href="">
                <i class="fa-solid fa-envelope"></i>
                <p>
                    <?php
                    echo $_SESSION['email'];
                    ?>
                </p>
            </a>

            <a class="item" href="editprofile.php">
            <i class="fa-solid fa-address-card"></i>
                <p>Edit Profile</p>
                <span><i class="fa-solid fa-angles-right"></i></span>
            </a>

            <a class="item" href="mybookings.php">
            <i class="fa-solid fa-car"></i>
                <p>My Bookings</p>
                <span><i class="fa-solid fa-angles-right"></i></span>
            </a>

            <a class="item" href="logout.php">
                <i class="fa-solid fa-right-from-bracket"></i>
                <p>Logout</p>
                <span><i class="fa-solid fa-angles-right"></i></span>
            </a>
        </div>
    </div>
</nav>
