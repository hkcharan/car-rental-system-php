<section>
<div class="footer_container">
    <div class="social">
        <div class="social_box social1">
            <i class="fa-brands fa-instagram"></i>
            <h4>INSTAGRAM</h4>
            <p>Follow us on Instagram</p>
            <button>FOLLOW</button>
        </div>
        <div class="social_box social2">
            <i class="fa-brands fa-facebook-f"></i>
            <h4>FACEBOOK</h4>
            <p>Follow us on Facebook</p>
            <button>FOLLOW</button>
        </div>
        <div class="social_box social3">
            <i class="fa-brands fa-x-twitter"></i>
            <h4>TWITTER</h4>
            <p>Follow us on Twitter</p>
            <button>FOLLOW</button>
        </div>
        <div class="social_box social4">
            <i class="fa-brands fa-youtube"></i>
            <h4>YOUTUBE</h4>
            <p>Subscribe our channel</p>
            <button>FOLLOW</button>
        </div>
    </div>

    <footer>
        <div class="fcontainer">
            <div class="fmain">
                <div class="fitems">
                    <h4>NAVIGATION</h4>
                    <ul>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">Contact</a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">Blog</a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">Areas we cover</a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">Client saftey notice</a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">About</a></li>
                    </ul>
                </div>

                <div class="fitems">
                    <h4>SERVICES</h4>
                    <ul>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">Super car hire</a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">prestige car hire</a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">wedding car hire</a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">long term hire</a></li>
                    </ul>
                </div>

                <div class="fitems">
                    <h4>QUICK LINKS</h4>
                    <ul>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">Brands</a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">FAQs</a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">Terms and Conditions</a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">Privacy and Policy</a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">Reviews</a></li>
                    </ul>
                </div>

                <div class="fitems">
                    <h4>SOCIAL MEDIA</h4>
                    <ul>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">Instagram</a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">Facebook</a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">Twitter</a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="">Youtube</a></li>
                    </ul>
                </div>
            </div>
            <div class="flast">
                <h4>Subscribe to our Newsletter!</h4>

                <?php 
                if(isset($_POST['subscribe'])){
                    $email = $_POST['subscribe_email'];
                    $sql = mysqli_query($conn,"SELECT * FROM subscribers WHERE email = '$email'");
                    $num = mysqli_num_rows($sql);
                    if($num > 0){
                        echo '<script>alert("Already Subscribed.")</script>';
                    }else{ 
                    $query = mysqli_query($conn,"INSERT INTO subscribers(email) VALUES ('$email')");
                    if($query){
                        echo '<script>alert("Subscribed")</script>';
                    }
                    }
                };
                ?>

                <form class="fbox" method="post">
                    <input type="text" name="subscribe_email" placeholder="Your Email Address" required>
                    <button type="submit" name="subscribe">SUBSCRIBE</button>
                </form>
                <p>Get notified about our Crazy offers and New Purchases.</p>
            </div>
        </div>
    </footer>
</div>
</section>

<?php include 'script.php'; ?>
</body>
</html>