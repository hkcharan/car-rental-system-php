<?php include 'header.php'; ?>

<?php 

    if(isset($_POST['contact'])){
        if(isset($_SESSION['email'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $query = mysqli_query($conn, "INSERT INTO contact(name,email,phone,message) VALUES ('$name','$email',$phone,'$message')");
            if($query){
                echo '<script>alert("Message Sent Successfully")</script>';
            };

    }else{
        echo '<script>alert("You have to login before sending message")</script>';
    };
};
?>

<section>
    <div class="contact_container">
        <div class="left_contact">
                <div class="contact_content">
                    <div class="contact_icon">
                    <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="contact_info">
                        <span>Address</span>
                        <p>Bannerghatta Rd, Bengaluru, Karnataka 560083</p>
                    </div>
                </div>

                <div class="contact_content">
                    <div class="contact_icon">
                    <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="contact_info">
                    <span>Phone</span>
                    <p>+91 8456325862</p>
                    </div>
                </div>

                <div class="contact_content">
                    <div class="contact_icon">
                    <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="contact_info">
                    <span>Email</span>
                    <p>carrental@gmail.com</p>
                    </div>
                </div>

                
        </div>
        <div class="right_contact">
            <form action="" method="post" class="contactform">
                <h1>Send Message</h1>
                <div class="contact_input">
                    <label for="">Name</label>
                    <input type="text" name="name"  required>
                </div>

                <div class="contact_input">
                    <label for="">Email</label>
                    <input type="email" name="email"  required>
                </div>

                <div class="contact_input">
                    <label for="">Phone</label>
                    <input type="phone" name="phone"  required>
                </div>

                <div class="contact_input">
                    <label for="">Message</label>
                    <textarea name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="contact_btn" name="contact">SEND</button>
            </form>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>