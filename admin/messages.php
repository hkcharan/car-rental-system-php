<?php include 'header.php';

$sql = "SELECT * FROM contact";
$result = mysqli_query($conn,$sql);
?>

<div class="container">
    <div class="path">Manage Users > <a href="messages.php"><span>Messages</span></a></div>
    <div class="brand_container">

    <table class="content-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
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
          $message = $data['message'];
          echo "<tr>
          <td>$name</td>
          <td>$email</td>
          <td>$phone</td>
          <td>$message</td>
          <td><button><a href='delete.php? messageid=$id'>Delete</a></button></td>
        </tr>";
        }
        ?>

        </tbody>
      </table>

    </div>
</div>

<?php include 'footer.php'; ?>