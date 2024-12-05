<nav class="navbar">
      <div class="logo_item">
        Admin Panel</div>

      <div class="navbar_content">
        <img src="./images/user.png" alt="" class="profile" onclick="openUser()"/>
      </div>
    </nav>

    <div class="user_container">
                <div class="profile">
                    <img src="./images/user.png" alt="" >
                </div>
    
                <div class="profile_items">
                    <a class="pitem" href="">
                        <i class="fa-solid fa-circle-user"></i>
                        <p><?php
                            echo $_SESSION['name'];
                        ?>
                        </p> 
                    </a>
    
                    <a class="pitem" href="">
                        <i class="fa-solid fa-envelope"></i>
                        <p>
                        <?php 
                        echo $_SESSION['email'];
                        ?>
                        </p> 
                    </a>
    
                    <a class="pitem" href="../logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p>Logout</p>
                        <span><i class="fa-solid fa-angles-right"></i></span>
                    </a>
                </div>
            </div>


<script>
    let userContainer = document.querySelector('.user_container');
         openUser = () => {
            userContainer.classList.toggle('open_user');
         }

</script>


    <nav class="sidebar">
      <div class="menu_content">
        <ul class="menu_items">
          <div class="menu_title">Dashboard</div>
          <li class="item">
            <a href="dashboard.php" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-home-alt"></i>
              </span>
              <span class="navlink">Home</span>
            </a>
          </li>

        </ul>


        <ul class="menu_items">
          <div class="menu_title menu_editor">Manage Bookings</div>

          <li class="item">
            <a href="viewbookings.php" class="nav_link submenu_item">
              <span class="navlink_icon">
              <i class='bx bx-list-ul'></i>
              </span>
              <span class="navlink">Bookings</span>
            </a>
          </li>

          
          <li class="item">
            <a href="approved.php" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bx-like'></i>
              </span>
              <span class="navlink">Approved</span>
            </a>
          </li>
      

          <li class="item">
            <a href="rejected.php" class="nav_link" >
              <span class="navlink_icon">
              <i class='bx bx-dislike' ></i>
              </span>
              <span class="navlink">Rejected</span>
            </a>
          </li>

          <li class="item">
            <a href="payments.php" class="nav_link" >
              <span class="navlink_icon">
              <i class='bx bx-money-withdraw'></i>
              </span>
              <span class="navlink">Payments</span>
            </a>
          </li>

        </ul>



        <ul class="menu_items">
          <div class="menu_title menu_editor">Manage Cars</div>
          
          <li class="item">
            <a href="allCars.php" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bxs-car'></i>
              </span>
              <span class="navlink">All Cars</span>
            </a>
          </li>
      

          <li class="item">
            <a href="addBrand.php" class="nav_link" >
              <span class="navlink_icon">
              <i class='bx bx-message-alt-add'></i>
              </span>
              <span class="navlink">Add Brand</span>
            </a>
          </li>

          <li class="item">
            <a href="addCar.php" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bx-car'></i>
              </span>
              <span class="navlink">Add Car</span>
            </a>
          </li>
        </ul>


        <ul class="menu_items">
          <div class="menu_title menu_setting">Manage Users</div>
          <li class="item">
            <a href="users.php" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bxs-user'></i>
              </span>
              <span class="navlink">All Users</span>
            </a>
          </li>

          <li class="item">
            <a href="verification.php" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bxs-user-rectangle'></i>
              </span>
              <span class="navlink">Verification</span>
            </a>
          </li>

          <li class="item">
            <a href="subscribers.php" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bxs-user-badge'></i>
              </span>
              <span class="navlink">Subscribers</span>
            </a>
          </li>

          <li class="item">
            <a href="messages.php" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bxs-message-rounded-dots'></i>
              </span>
              <span class="navlink">Messages</span>
            </a>
          </li>
        </ul>

        <div class="bottom_content">
          <a href="../logout.php" class="bottom">
            <span>Log Out</span>
            <i class='bx bx-log-out'></i>
          </a>
        </div>
      </div>
    </nav>