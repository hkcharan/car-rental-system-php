<?php include 'header.php'; ?>

<?php
$sql = "SELECT * FROM users WHERE user_type = 'user'";
$result = mysqli_query($conn,$sql);
?>

<div class="container">
    <div class="path">Manage Users > <a href="users.php"><span>All Users</span></a></div>
    <div class="brand_container">

    <table class="content-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
        while($data = mysqli_fetch_assoc($result)){
          $id = $data['id'];
          $name = $data['name'];
          $phone =  $data['phone']; 
          $email = $data['email'];
          $password = $data['password'];
          echo "<tr>
          <td>$name</td>
          <td>$phone</td>
          <td>$email</td>
          <td>$password</td>
          <td><button><a href='delete.php? userid=$id'>Delete</a></button></td>
        </tr>";
        }
        ?>

        </tbody>
      </table>

    </div>
</div>

<?php include 'footer.php'; ?>