<?php include 'header.php';?>

<?php
$sql = "SELECT * FROM subscribers ";
$result = mysqli_query($conn,$sql);
?>

<div class="container">
    <div class="path">Manage Users > <a href="subscribers.php"><span>Subscribers</span></a></div>
    <div class="brand_container">

    <table class="content-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
        while($data = mysqli_fetch_assoc($result)){
            $id = $data['id'];
          $email = $data['email'];
          echo "<tr>
          <td>$email</td>
          <td><button><a href='delete.php?subscriberid=$id'>Delete</a></button></td>
        </tr>";
        }
        ?>

        </tbody>
      </table>

    </div>
</div>

<?php include 'footer.php'; ?>