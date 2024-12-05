<?php include 'header.php'; ?>

<?php
$result = mysqli_query($conn,"SELECT * FROM verification WHERE status = 'pending'");

$result2 = mysqli_query($conn,"SELECT * FROM verification WHERE status = 'verified'");
?>

<div class="container">
    <div class="path">Manage Users > <a href="verification.php"><span>verification</span></a></div>
    <div class="verification_container">

    <div class="verify_users">
        <p class="verify_heading">Verify Users</p>
    <table class="content-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Details</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
        $num = mysqli_num_rows($result);
        if($num > 0){
          while($data = mysqli_fetch_assoc($result)){
            $id = $data['id'];
            $name = $data['name'];
            $email = $data['email'];
            echo "<tr>
            <td>$name</td>
            <td>$email</td>
            <td><button class='update'><a href='verifyUser.php? verifyid=$id'>Details</a></button></td>
            <td><button class='delete'><a href='delete.php? verifyid=$id'>Delete</a></button></td>
          </tr>";
          }
        }else{
          echo '<td>No Data Found</td>';
        }
        ?>

        </tbody>
      </table>
    </div>

    <div class="verified_users">
    <p class="verify_heading">Verified Users</p>
    <table class="content-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Details</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
        while($data = mysqli_fetch_assoc($result2)){
          $id = $data['id'];
          $name = $data['name'];
          $email = $data['email'];
          echo "<tr>
          <td>$name</td>
          <td>$email</td>
          <td><button class='update'><a href='verifyUser.php? verifyid=$id'>Details</a></button></td>
          <td><button class='delete'><a href='delete.php? verifyid=$id'>Delete</a></button></td>
        </tr>";
        }
        ?>

        </tbody>
      </table>
       
    </div>

    </div>
</div>



<?php include 'footer.php'; ?>